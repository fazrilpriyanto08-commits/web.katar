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
        // Cari data lomba dari DB jika ada, jika tidak buat fallback data sederhana
        $lomba = Lomba::find($id);

        // Arahkan ke view form pendaftaran warga (pendaftaran_form)
        return view('pendaftaran_form', [
            'id' => $id,
            'lomba' => $lomba
        ]);
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

        // 2. Kirim ke Google Sheets
        try {
            $spreadsheetId = env('GOOGLE_SHEETS_SPREADSHEET_ID', '1WqeWdRZpGYnzJ0mIGsks-1x7Z5AamfG_84P2yAQt7ig');
            $rawBase64 = env('GOOGLE_SERVICE_ACCOUNT_JSON');

            $client = new Client();
            $client->setScopes([GoogleSheets::SPREADSHEETS]);

            if (!empty($rawBase64)) {
                $decoded = base64_decode($rawBase64, true);
                $jsonContent = ($decoded && json_decode($decoded)) ? $decoded : $rawBase64;
                
                $authConfig = json_decode($jsonContent, true);

                if (isset($authConfig['private_key'])) {
                    $authConfig['private_key'] = str_replace('\n', "\n", $authConfig['private_key']);
                }

                $client->setAuthConfig($authConfig);
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
            // JIKA GAGAL, TAMPILKAN DENGAN JELAS DI LAYAR BROWSER!
            dd('KENDALA GOOGLE SHEETS:', $e->getMessage());
        }

        return redirect('/daftar-lomba')->with('success', 'Pendaftaran berhasil dikirim!');
    }

    public function destroyPendaftar($id)
    {
        $pendaftar = Pendaftar::findOrFail($id);
        $pendaftar->delete();

        return redirect()->back()->with('success', 'Data pendaftar berhasil dihapus!');
    }
}