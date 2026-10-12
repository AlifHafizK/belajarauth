<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{

    public function index()
    {
        $siswa = Siswa::all();
        return response()->json([
            'data' => $siswa
        ]);
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required|string|max:100',
            'kelas' => 'required|string|max:50',
            'umur' => 'required|integer',
        ]);

        $siswa = Siswa::create($validate);

        return response()->json([
            'message' => 'Data siswa berhasil ditambahkan',
            'data' => $siswa
        ], 200);
    }
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama' => 'required|string|max:100',
            'kelas' => 'required|string|max:50',
            'umur' => 'required|integer',
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswa->update($validate);

        return response()->json([
            'message' => 'Data siswa berhasil diperbarui',
            'data' => $siswa
        ], 200);
    }
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return response()->json([
            'message' => 'Data siswa berhasil dihapus'
        ], 200);
    }
    public function show($id)
    {
        $siswa = Siswa::findOrFail($id);
        return response()->json([
            'data' => $siswa
        ]);
    }
}
