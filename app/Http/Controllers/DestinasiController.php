<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use Illuminate\Http\Request;

class DestinasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        {
            $destinasi = Destinasi::paginate(5);
            return view('page.destinasi.index')->with([
                'destinasi' => $destinasi,
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
            'nama_destinasi' => $request->input('nama_destinasi'),
            'deskripsi' => $request->input('deskripsi'),
            'gambar' => $request->input('gambar'),
            'lokasi' => $request->input('lokasi'),
            'status_aktif' => $request->input('status_aktif'),
        ];

        Destinasi::create($data);

        return back()->with('message', 'Data Destinasi Sudah ditambahkan');
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
            'nama_destinasi' => $request->input('nama_destinasi'),
            'deskripsi' => $request->input('deskripsi'),
            'gambar' => $request->input('gambar'),
            'lokasi' => $request->input('lokasi'),
            'status_aktif' => $request->input('status_aktif'),
        ];

        $datas = Destinasi::findOrFail($id);
        $datas->update($data);
        return back()->with('message_update', 'Data Destinasi Sudah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = Destinasi::findOrFail($id);
            $data = Destinasi::where('id', $id)->first();

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
