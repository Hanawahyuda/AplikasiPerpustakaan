<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use App\Models\Buku;

class BukuController extends Controller
{
    function __construct()
    {
        $this->model = new Buku();
    }

    public function buat_buku(Request $request)
    {
        $this->model->create([
            "uuid_buku" => Uuid::uuid4()->toString(),
            "nama_buku" => $request->buku
        ]);

        return response([
            "pesan" => "Buku Berhasil Di Input",
            "pesan_b" => true
        ], 201);
    }

    public function semua_data_buku()
    {
        $buku = $this->model->all();

        return response([
            "buku" => $buku
        ], http_response_code());
    }

    public function hapus_buku($id)
    {
        $buku = $this->model->find($id);

        if (!$buku) {
            return response([
                "pesan" => "Buku tidak ditemukan",
                "pesan_b" => false
            ], 404);
        }

        $buku->delete();

        return response([
            "pesan" => "Buku Berhasil Dihapus",
            "pesan_b" => true
        ], 200);
    }

    public function ubah_buku(Request $request)
    {
        $buku = $this->model->find($request->id);

        if (!$buku) {
            return response([
                "pesan" => "Buku tidak ditemukan",
                "pesan_b" => false
            ], 404);
        }

        $buku->nama_buku = $request->buku;
        $buku->save();

        return response([
            "pesan" => "Buku Berhasil Diubah",
            "pesan_b" => true
        ], 200);

        // $encoded = base64_encode($data);
        // $decoded = base64_decode($encoded);
    }
}
