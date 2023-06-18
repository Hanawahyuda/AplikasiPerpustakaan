<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAdmin;

class UserAdminController extends Controller
{
    function __construct()
    {
        $this->model = new UserAdmin();
    }

    public function login(Request $request)
    {
        $username = $request->email;
        $password = $request->password;

        $user = $this->model->where('username', $username)->first();

        if ($user && ($password == $user->password)) {
            return response([
            "pesan" => "Anda Berhasil Login",
            "pesan_b" => true,
            "data" => $request
            ], 200);
        } else {
            return response([
            "pesan" => "Username atau password yang anda input salah.",
            "pesan_b" => false,
            "data" => $user
            ], 200);
        }
    }

    public function buat_user(Request $request)
    {
        $this->model->create([
            "nama_lengkap" => $request->nama,
            "username" => $request->email,
            "password" => $request->password
        ]);

        return response([
            "pesan" => "User Admin Berhasil Di Input",
            "pesan_b" => true
        ], 201);
    }

    public function semua_data_user()
    {
        $user = $this->model->all();

        return response([
            "user" => $user
        ], http_response_code());
    }

    public function hapus_user($id)
    {
        $user = $this->model->find($id);

        if (!$user) {
            return response([
                "pesan" => "User Admin tidak ditemukan",
                "pesan_b" => false
            ], 404);
        }

        $user->delete();

        return response([
            "pesan" => "User Admin Berhasil Dihapus",
            "pesan_b" => true
        ], 200);
    }

    public function ubah_user(Request $request)
    {
        $user = $this->model->find($request->id);

        if (!$user) {
            return response([
                "pesan" => "User Admin tidak ditemukan",
                "pesan_b" => false
            ], 404);
        }

        $user->nama_lengkap = $request->nama;
        $user->username = $request->email;
        $user->password = $request->password;
        $user->save();

        return response([
            "pesan" => "User Admin Berhasil Diubah",
            "pesan_b" => true
        ], 200);
    }
}
