<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use App\Models\Lomba;
use Illuminate\Http\Request;
use Revolution\Google\Sheets\Sheets;

class PendaftaranController extends Controller
{
    public function formDaftar($id)
    {
        $lomba = Lomba::findOrFail($id);
        return view('daftar1', compact('lomba'));
    }

    public function prosesDaftar(Request $request)
    {
        // 1. Simpan data pendaftaran ke database
        Pendaftar::create([
            'lomba_id'   => $request->lomba_id,
            'nama_warga' => $request->nama,
            'nomor_hp'   => $request->no_hp,
            'rt_rw'      => $request->rt_rw ?? 'RT 012 / RW 05',
        ]);

        // 2. OTOMATIS KIRIM KE GOOGLE SHEETS
        try {
            $spreadsheetId = env('GOOGLE_SHEETS_SPREADSHEET_ID', '1WqeWdRZpGYnzJ0mIGsks-1x7Z5AamfG_84P2yAQt7ig');
            
            // Baca file credentials.json lokal atau dari variable Railway
            $credentialsPath = storage_path('app/credentials.json');
            
            $sheets = new Sheets();
            
            if (env('GOOGLE_SERVICE_ACCOUNT_JSON')) {
                $jsonCredentials = json_decode(env('GOOGLE_SERVICE_ACCOUNT_JSON'), true);
                $sheets->setServiceAccountCredentials($jsonCredentials);
            } elseif (file_exists($credentialsPath)) {
                $sheets->setServiceAccountCredentials($credentialsPath);
            }

            $sheets->spreadsheet($spreadsheetId)
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
        } catch (\Exception $e) {
            \Log::error('Google Sheet Sync Error: ' . $e->getMessage());
        }

        return redirect('/')->with('success', 'Pendaftaran berhasil dikirim!');
    }

    public function destroyPendaftar($id)
    {
        $pendaftar = Pendaftar::findOrFail($id);
        $pendaftar->delete();

        return redirect()->back()->with('success', 'Data pendaftar berhasil dihapus!');
    }
}