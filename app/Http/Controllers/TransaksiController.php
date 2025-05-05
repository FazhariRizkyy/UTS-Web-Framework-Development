<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { {
            $transaksi = Transaksi::paginate(5);
            $paket = Paket::all();
            return view('page.aktivitas.transaksi')->with([
                'transaksi' => $transaksi,
                'paket' => $paket,
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kodeTransaksi = 'TRX-' . strtoupper(uniqid());

        $data = [
            'id_paket' => $request->input('id_paket'),
            'kode_transaksi' => $kodeTransaksi,
            'jumlah' => $request->input('jumlah'),
            'metode_pembayaran' => $request->input('metode_pembayaran'),
            'status_pembayaran' => $request->input('status_pembayaran'),
            'tanggal_pembayaran' => $request->input('tanggal_pembayaran'),
        ];

        Transaksi::create($data);

        return redirect()
            ->route('transaksi.index')
            ->with('message', 'Data Berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = Transaksi::findOrFail($id);
            $data = Transaksi::where('id', $id)->first();

            $data->delete();

            return response()->json([
                'message_delete' => "Data Deleted!"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to delete data.',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
