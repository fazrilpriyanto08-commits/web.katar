<?php

namespace App\Http\Controllers;

use App\Models\Donasi;
use Illuminate\Http\Request;
use Revolution\Google\Sheets\Facades\Sheets;
use Google\Client;
use Google\Service\Sheets as GoogleSheetsService;

class DonasiController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama_orang_tua' => 'required|string|max:255',
            'no_wa'          => 'required|string|max:20',
            'nominal_donasi' => 'required|numeric|min:10000',
            'bukti_transfer' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $buktiPath = null;
        if ($request->hasFile('bukti_transfer')) {
            $buktiPath = $request->file('bukti_transfer')->store('bukti_donasi', 'public');
        }

        Donasi::create([
            'nama_orang_tua' => $request->nama_orang_tua,
            'no_wa'          => $request->no_wa,
            'nama_anak'      => $request->nama_anak,
            'umur_anak'      => $request->umur_anak,
            'nominal_donasi' => $request->nominal_donasi,
            'bukti_transfer' => $buktiPath,
            'catatan'        => $request->catatan,
        ]);

        // AUTO-SYNC KE GOOGLE SHEETS
        try {
            $spreadsheetId = env('GOOGLE_SHEETS_SPREADSHEET_ID', '1WqeWdRZpGYnzJ0mIGsks-1x7Z5AamfG_84P2yAQt7ig');
            
            $client = new Client();
            $client->setScopes([GoogleSheetsService::SPREADSHEETS]);

            $credentialsJson = env('GOOGLE_SERVICE_ACCOUNT_JSON');
            $credentialsPath = storage_path('app/credentials.json');

            if (!empty($credentialsJson)) {
                $authConfig = json_decode($credentialsJson, true);
                $client->setAuthConfig($authConfig);
            } elseif (file_exists($credentialsPath)) {
                $client->setAuthConfig($credentialsPath);
            }

            // Gunakan setClient
            Sheets::setClient($client);

            Sheets::spreadsheet($spreadsheetId)
                ->sheet('Donasi')
                ->append([
                    [
                        $request->nama_orang_tua,
                        "'" . $request->no_wa,
                        $request->nama_anak ?? '-',
                        'Rp ' . number_format($request->nominal_donasi, 0, ',', '.'),
                        now()->setTimezone('Asia/Jakarta')->format('d/m/Y H:i')
                    ]
                ]);
        } catch (\Exception $e) {
            \Log::error('Google Sheet Donasi Sync Error: ' . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Terima kasih atas partisipasi dan donasinya!');
    }

    public function indexAdmin()
    {
        $donasis = Donasi::latest()->get();
        $totalDonasi = Donasi::where('status', 'Diterima')->sum('nominal_donasi');
        
        return view('admin_donasi', compact('donasis', 'totalDonasi'));
    }

    public function updateStatus(Request $request, $id)
    {
        $donasi = Donasi::findOrFail($id);
        $donasi->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status donasi berhasil diperbarui!');
    }
}