<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class mahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Halaman Home mahasiswa
        return view('mahasiswa.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Halaman tambah mahasiswa
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Simpan tambah mahasiswa

        Session::flash('nim', $request->nim);
        Session::flash('nama_mahasiswa', $request->nama_mahasiswa);
        Session::flash('tgl_lahir', $request->tgl_lahir);
        Session::flash('alamat', $request->alamat);

        $request->validate(
            [
                'nim' => 'required|numeric|unique:mahasiswa,nim',
                'nama_mahasiswa' => 'required',
                'jk' => 'required',
                'tgl_lahir' => 'required',
                'alamat' => 'required'
            ],
            [
                'nim.required' => 'NIM tidak boleh kosong',
                'nim.numeric' => 'NIM harus diisi dengan angka',
                'nim.unique' => 'NIM sudah ada sebelumnya',
                'nama_mahasiswa.required' => 'Nama Mahasiswa tidak boleh kosong',
                'jk.required' => 'Jenis Kelamin tidak boleh kosong',
                'tgl_lahir.required' => 'Tanggal Lahir tidak boleh kosong',
                'alamat.required' => 'Alamat tidak boleh kosong'
            ]

        );


        $data = [
            'nim' => $request->nim,
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'jk' => $request->jk,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,

        ];
        mahasiswa::create($data);
        return redirect('/mahasiswa')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Halaman detail
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Halaman edit mahasiswa
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Simpan edit mahasiswa
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Hapus mahasiswa
    }
}
