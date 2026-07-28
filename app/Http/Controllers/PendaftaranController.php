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
        // Mengambil data lomba spesifik berdasarkan ID
        $lomba = Lomba::findOrFail($id);

        // Memanggil file view 'daftar1.blade.php'
        return view('daftar1', compact('lomba'));
    }

    public function prosesDaftar(Request $request)
    {
        // Simpan data pendaftaran ke database
        Pendaftar::create([
            'lomba_id'   => $request->lomba_id,
            'nama_warga' => $request->nama,
            'nomor_hp'   => $request->no_hp,
            'rt_rw'      => $request->rt_rw ?? 'RT 012 / RW 05',
        ]);

        // OTOMATIS KIRIM KE GOOGLE SHEETS
        try {
            $spreadsheetId = env('GOOGLE_SHEETS_SPREADSHEET_ID');
            
            // Cek kredensial dari Railway atau file lokal
            if (env('GOOGLE_SERVICE_ACCOUNT_JSON')) {
                $config = json_decode(env('GOOGLE_SERVICE_ACCOUNT_JSON'), true);
                $sheet = (new \Revolution\Google\Sheets\Sheets())->setServiceAccountCredentials($config);
            } else {
                $sheet = Sheets::spreadsheet($spreadsheetId);
            }

            $sheet->spreadsheet($spreadsheetId)
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

    // Menghapus data pendaftar
    public function destroyPendaftar($id)
    {
        $pendaftar = Pendaftar::findOrFail($id);
        $pendaftar->delete();

        return redirect()->back()->with('success', 'Data pendaftar berhasil dihapus!');
    }
}