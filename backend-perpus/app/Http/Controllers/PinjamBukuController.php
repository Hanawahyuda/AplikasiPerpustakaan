<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PinjamBuku;

class PinjamBukuController extends Controller
{
    function __construct()
    {
        $this->model = new PinjamBuku();
    }

    public function buat_pinjam_buku(Request $request)
    {
        $this->model->create([
            "uuid_buku" => $request->buku,
            "uuid_peminjam" => $request->peminjam
        ]);

        return response([
            "pesan" => "Pinjam Buku Berhasil Di Input",
            "pesan_b" => true
        ], 201);
    }

    public function semua_data_peminjam_buku()
    {
        $dataPinjam = DB::table('pinjam_bukus')
        ->join('user_pinjams', 'user_pinjams.uuid_user', '=', 'pinjam_bukus.uuid_peminjam')
        ->join('bukus', 'bukus.uuid_buku', '=', 'pinjam_bukus.uuid_buku')
        ->select('pinjam_bukus.id', 'user_pinjams.nama_lengkap', 'bukus.nama_buku')
        ->get();

        return response([
            "peminjam_buku" => $dataPinjam
        ], http_response_code());
    }

    public function token_peminjam_buku(Request $request)
    {
        $dataPinjam = DB::table('pinjam_bukus')
        ->join('user_pinjams', 'user_pinjams.uuid_user', '=', 'pinjam_bukus.uuid_peminjam')
        ->join('bukus', 'bukus.uuid_buku', '=', 'pinjam_bukus.uuid_buku')
        ->where('pinjam_bukus.uuid_peminjam', '=', base64_decode($request->id))
        ->select('pinjam_bukus.id', 'user_pinjams.nama_lengkap', 'bukus.nama_buku')
        ->get();

        return response([
            "peminjam_buku" => $dataPinjam
        ], http_response_code());
    }

    public function hapus_pinjam_buku($id)
    {
        $pinjam_buku = $this->model->find($id);

        if (!$pinjam_buku) {
            return response([
                "pesan" => "Pinjam Buku tidak ditemukan",
                "pesan_b" => false
            ], 404);
        }

        $pinjam_buku->delete();

        return response([
            "pesan" => "Pinjam Buku Berhasil Dikembalikan",
            "pesan_b" => true
        ], 200);
    }

    public function ubah_pinjam_buku(Request $request)
    {
        $pinjam_buku = $this->model->find($request->id);

        if (!$pinjam_buku) {
            return response([
                "pesan" => "Pinjam Buku tidak ditemukan",
                "pesan_b" => false
            ], 404);
        }

        $pinjam_buku->uuid_buku = $request->buku;
        $pinjam_buku->uuid_peminjam = $request->peminjam;
        $pinjam_buku->save();

        return response([
            "pesan" => "Pinjam Buku Berhasil Diubah",
            "pesan_b" => true
        ], 200);
    }
}
