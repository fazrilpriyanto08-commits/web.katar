<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use App\Models\Lomba;
use Illuminate\Http\Request;
use Revolution\Google\Sheets\Facades\Sheets;

class PendaftaranController extends Controller
{
    public function formDaftar($id)
    {
        $lomba = Lomba::findOrFail($id);
        return view('daftar1', compact('lomba'));
    }

    public function prosesDaftar(Request $request)
    {
        // 1. Simpan ke Database Local/Railway
        Pendaftar::create([
            'lomba_id'   => $request->lomba_id,
            'nama_warga' => $request->nama,
            'nomor_hp'   => $request->no_hp,
            'rt_rw'      => $request->rt_rw ?? 'RT 012 / RW 05',
        ]);

        // 2. KIRIM KE GOOGLE SHEETS
        $spreadsheetId = env('GOOGLE_SHEETS_SPREADSHEET_ID', '1WqeWdRZpGYnzJ0mIGsks-1x7Z5AamfG_84P2yAQt7ig');
        
        $credentialsRaw = env('GOOGLE_SERVICE_ACCOUNT_JSON');
        $credentialsPath = storage_path('app/credentials.json');

        if (!empty($credentialsRaw)) {
            // Cek apakah string berupa Base64 atau JSON biasa
            $decoded = base64_decode($credentialsRaw, true);
            $jsonString = ($decoded && json_decode($decoded)) ? $decoded : $credentialsRaw;
            
            $authConfig = json_decode($jsonString, true);
            
            // Set kredensial dari Array Config (Resmi bawaan package)
            Sheets::setServiceAccountCredentials($authConfig);
        } elseif (file_exists($credentialsPath)) {
            // Fallback ke file fisik jika ada
            Sheets::setServiceAccountCredentials($credentialsPath);
        }

        Sheets::spreadsheet($spreadsheetId)
            ->sheet('Pendaftar')
            ->append([
                [
                    $request->nama,
                    "'" . $request->no_hp,
                    $request->rt_rw ?? 'RT 012 / RW 05',
                    $request->lomba_id,
                    now()->setTimezone('Asia/Jakarta')->format('d/m/Y H:i')
                ]
            ]);

        return redirect('/')->with('success', 'Pendaftaran berhasil dikirim!');
    }

    public function destroyPendaftar($id)
    {
        $pendaftar = Pendaftar::findOrFail($id);
        $pendaftar->delete();

        return redirect()->back()->with('success', 'Data pendaftar berhasil dihapus!');
    }
}