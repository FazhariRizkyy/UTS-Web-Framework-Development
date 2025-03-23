<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        {
            $fasilitas = Fasilitas::paginate(5);
            return view('page.fasilitas.index')->with([
                'fasilitas' => $fasilitas,
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
            'nama_fasilitas' => $request->input('nama_fasilitas'),
            'deskripsi' => $request->input('deskripsi'),
            'status_tersedia' => $request->input('status_tersedia'),
        ];

        Fasilitas::create($data);

        return back()->with('message', 'Data Fasilitas Sudah ditambahkan');
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
            'nama_fasilitas' => $request->input('nama_fasilitas'),
            'deskripsi' => $request->input('deskripsi'),
            'status_tersedia' => $request->input('status_tersedia'),
        ];

        $datas = Fasilitas::findOrFail($id);
        $datas->update($data);
        return back()->with('message_update', 'Data Fasilitas Sudah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = Fasilitas::findOrFail($id);
            $data = Fasilitas::where('id', $id)->first();

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
