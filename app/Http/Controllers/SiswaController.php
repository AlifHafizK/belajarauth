<?php

namespace App\Http\Controllers;

use App\Handlers\SiswaHandler;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Throwable;

class SiswaController extends Controller
{
    protected $handler;

    public function __construct(SiswaHandler $handler)
    {
        $this->handler = $handler;
    }

    // READ: Semua siswa
    public function index()
    {
        try {
            return response()->json([
                'message' => 'Data siswa berhasil ditemukan',
                'data' => $this->handler->index()
            ], 200);

        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Gagal mengambil data siswa'
            ], 500);
        }
    }

    // READ: Satu siswa berdasarkan ID
    public function show($id)
    {
        $siswa = $this->handler->show($id);

        return response()->json([
            'message' => 'Data siswa berhasil ditemukan',
            'data' => $siswa
        ], 200);
    }

    // CREATE: Tambah siswa
    public function store(Request $request)
    {
        try {
            $validate = $request->validate([
                'nama' => 'required|string|max:100',
                'kelas' => 'required|string|max:50',
                'umur' => 'required|integer',
            ]);

            $siswa = $this->handler->store($validate);

            return response()->json([
                'message' => 'Data siswa berhasil ditambahkan',
                'data' => $siswa
            ], 201);

        } catch (ValidationException $e) {
            throw $e;

        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Gagal menambahkan data siswa'
            ], 500);
        }
    }

    // UPDATE: Ubah siswa berdasarkan ID
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama' => 'required|string|max:100',
            'kelas' => 'required|string|max:50',
            'umur' => 'required|integer',
        ]);

        $siswa = $this->handler->update($id, $validate);

        return response()->json([
            'message' => 'Data siswa berhasil diperbarui',
            'data' => $siswa
        ], 200);
    }

    // DELETE: Hapus siswa berdasarkan ID
    public function destroy($id)
    {
        $this->handler->destroy($id);

        return response()->json([
            'message' => 'Data siswa berhasil dihapus'
        ], 200);
    }
}
