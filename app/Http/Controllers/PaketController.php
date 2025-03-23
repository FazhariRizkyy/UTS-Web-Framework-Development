<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        {
            $paket = Paket::paginate(5);
            return view('page.paket.index')->with([
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
        $data = [
            'nama_paket' => $request->input('nama_paket'),
            'deskripsi' => $request->input('deskripsi'),
            'harga' => $request->input('harga'),
            'durasi_hari' => $request->input('durasi_hari'),
            'status_aktif' => $request->input('status_aktif'),
        ];

        Paket::create($data);

        return back()->with('message', 'Data Paket Sudah ditambahkan');
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
        $data = [
            'nama_paket' => $request->input('nama_paket'),
            'deskripsi' => $request->input('deskripsi'),
            'harga' => $request->input('harga'),
            'durasi_hari' => $request->input('durasi_hari'),
            'status_aktif' => $request->input('status_aktif'),
        ];

        $datas = Paket::findOrFail($id);
        $datas->update($data);
        return back()->with('message_update', 'Data Paket Sudah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = Paket::findOrFail($id);
            $data = Paket::where('id', $id)->first();

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
