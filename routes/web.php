<?php

use Illuminate\Support\Facades\Route;

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
    return view('index');
});

Route::get('about', function () {
    return view('about');
});

Route::get('mahasiswa', function () {
    $nim = [123, 124, 125, 126];
    $nama = ['Nadia', 'Nadio', 'Nadiu', 'Nadie'];
    $jumlah = count($nim);
    return view('mahasiswa', compact('nim', 'jumlah', 'nama'));
});

Route::get('profile', function () {
    $nama = 'Nadia';
    return view('profile', compact('nama'));
    return view('profile')->with('nama, $nama');
});
