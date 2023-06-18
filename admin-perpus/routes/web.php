<?php

use Illuminate\Support\Facades\Route;
use GuzzleHttp\Client;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login', ['url' => env("URL_SERVER")]);
});

Route::get('dashboard', function () {
    return view('dashboard', ['url' => env("URL_SERVER")]);
});

Route::get('buku', function () {
    $url = env("URL_SERVER") . "/api/buku";
    $client = new Client();
    $request = $client->get($url);
    $response = $request->getBody();

    $data = [
        'url' => env("URL_SERVER"),
        'data' => json_decode($response)
    ];

    return view('buku', $data);
});

Route::get('user-admin', function () {
    $url = env("URL_SERVER") . "/api/user_admin";
    $client = new Client();
    $request = $client->get($url);
    $response = $request->getBody();

    $data = [
        'url' => env("URL_SERVER"),
        'data' => json_decode($response)
    ];

    return view('user_admin', $data);
});

Route::get('user-peminjam', function () {
    $url = env("URL_SERVER") . "/api/user_peminjam";
    $client = new Client();
    $request = $client->get($url);
    $response = $request->getBody();

    $data = [
        'url' => env("URL_SERVER"),
        'data' => json_decode($response)
    ];

    return view('user_peminjam', $data);
});

Route::get('card-buku', function () {
    $url = env("URL_SERVER") . "/api/buku";
    $client = new Client();
    $request = $client->get($url);
    $response = $request->getBody();

    $data = [
        'url' => env("URL_SERVER"),
        'data' => json_decode($response)
    ];

    return view('card_buku', $data);
});

Route::get('card-peminjam', function () {
    $url = env("URL_SERVER") . "/api/user_peminjam";
    $client = new Client();
    $request = $client->get($url);
    $response = $request->getBody();

    $data = [
        'url' => env("URL_SERVER"),
        'data' => json_decode($response)
    ];

    return view('card_peminjam', $data);
});

Route::get('peminjaman-buku', function () {
    $url = env("URL_SERVER") . "/api/peminjam_buku";
    $client = new Client();
    $request = $client->get($url);
    $response = $request->getBody();

    $data = [
        'url' => env("URL_SERVER"),
        'data' => json_decode($response)
    ];

    return view('peminjam_buku', $data);
});
