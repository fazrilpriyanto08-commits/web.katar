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
        $lomba = Lomba::find($id);

        return view('pendaftaran_form', [
            'id' => $id,
            'lomba' => $lomba
        ]);
    }

    public function prosesDaftar(Request $request)
    {
        $namaWarga = $request->input('nama') ?? $request->input('nama_pendaftar') ?? $request->input('nama_warga');
        $noHp      = $request->input('no_hp') ?? $request->input('nomor_hp');
        $lombaId   = $request->input('lomba_id');
        $rtRw      = $request->input('rt_rw') ?? 'RT 012 / RW 05';

        // 1. SIMPAN KE DATABASE
        Pendaftar::create([
            'lomba_id'   => $lombaId,
            'nama_warga' => $namaWarga,
            'nomor_hp'   => $noHp,
            'rt_rw'      => $rtRw,
        ]);

        // 2. KIRIM KE GOOGLE SHEETS
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
                    $namaWarga,
                    "'" . $noHp,
                    $rtRw,
                    $lombaId,
                    now()->setTimezone('Asia/Jakarta')->format('d/m/Y H:i')
                ]
            ];

            $body = new GoogleSheets\ValueRange([
                'values' => $values
            ]);

            $params = ['valueInputOption' => 'USER_ENTERED'];

            $service->spreadsheets_values->append($spreadsheetId, 'Pendaftar', $body, $params);

        } catch (\Exception $e) {
            // Silently handle error if sheets fail
        }

        return redirect('/daftar-lomba')->with('success', 'Pendaftaran berhasil dikirim!');
    }

    public function adminIndex()
    {
        $pendaftar = Pendaftar::orderBy('created_at', 'desc')->get();
        return view('admin_pendaftar', compact('pendaftar'));
    }

    public function destroyPendaftar($id)
    {
        $pendaftar = Pendaftar::findOrFail($id);
        $pendaftar->delete();

        return redirect()->back()->with('success', 'Data pendaftar berhasil dihapus!');
    }
}