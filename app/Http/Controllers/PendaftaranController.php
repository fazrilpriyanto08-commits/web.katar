<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use App\Models\Lomba;
use Illuminate\Http\Request;
use Google\Client;
use Google\Service\Sheets as GoogleSheets;

class PendaftaranController extends Controller
{
    public function formDaftar($id)
    {
        $lomba = Lomba::findOrFail($id);
        return view('daftar1', compact('lomba'));
    }

    public function prosesDaftar(Request $request)
    {
        // 1. Simpan data ke Database
        Pendaftar::create([
            'lomba_id'   => $request->lomba_id,
            'nama_warga' => $request->nama,
            'nomor_hp'   => $request->no_hp,
            'rt_rw'      => $request->rt_rw ?? 'RT 012 / RW 05',
        ]);

        // 2. Kirim ke Google Sheets via Native Google Client (Anti-Gagal)
        try {
            $spreadsheetId = env('GOOGLE_SHEETS_SPREADSHEET_ID', '1WqeWdRZpGYnzJ0mIGsks-1x7Z5AamfG_84P2yAQt7ig');
            $rawBase64 = env('GOOGLE_SERVICE_ACCOUNT_JSON');

            $client = new Client();
            $client->setScopes([GoogleSheets::SPREADSHEETS]);

            if (!empty($rawBase64)) {
                $decoded = base64_decode($rawBase64, true);
                $jsonContent = ($decoded && json_decode($decoded)) ? $decoded : $rawBase64;
                $client->setAuthConfig(json_decode($jsonContent, true));
            } else {
                $credentialsPath = storage_path('app/credentials.json');
                if (file_exists($credentialsPath)) {
                    $client->setAuthConfig($credentialsPath);
                }
            }

            $service = new GoogleSheets($client);

            $values = [
                [
                    $request->nama,
                    "'" . $request->no_hp,
                    $request->rt_rw ?? 'RT 012 / RW 05',
                    $request->lomba_id,
                    now()->setTimezone('Asia/Jakarta')->format('d/m/Y H:i')
                ]
            ];

            $body = new GoogleSheets\ValueRange([
                'values' => $values
            ]);

            $params = ['valueInputOption' => 'USER_ENTERED'];

            $service->spreadsheets_values->append($spreadsheetId, 'Pendaftar', $body, $params);

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