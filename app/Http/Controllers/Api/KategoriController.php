<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return response()->json([
            'status' => 'success',
            'data' => $kategori,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'deskripsi'              => 'required',
            'kategori'              => 'required',
        ]);


        $kategori = new Kategori($validated);
        if ($kategori->save()) {
            return response()->json([
                'status' => 'berhasil menambahkan data',
                'data' => $kategori,
            ]);
        } else {
            return response()->json([
                'status' => 'gagal menambahkan data',
                'data' => null,
            ], 500);
        };
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        return response()->json([
            'status' => 'success',
            'data' => $kategori,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        $validated = $this->validate($request, [
            'deskripsi'              => 'required',
            'kategori'              => 'required'
        ]);

        $kategori->update($validated);
            return response()->json([
                'status' => 'berhasil mengedit',
                'data' => $kategori,
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        if ($kategori->delete()) {
            return response()->json([
                'status' => 'berhasil menghapus data',
                'data' => $kategori,
            ]);
        } else {
            return response()->json([
                'status' => 'gagal menghapus data',
                'data' => null,
            ], 500);
        }
    }
}
