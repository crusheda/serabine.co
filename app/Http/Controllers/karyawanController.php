<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\karyawan;

class karyawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $show = karyawan::all();
        $total = karyawan::count();

        $data = [
            'count' => $total,
            'show' => $show,
        ];
        return view('pages.karyawan')->with('list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.tambahkaryawan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'nama' => 'required',
            'posisi' => 'required',
            'telepon' => 'required',
            'kehadiran' => 'required',
            'tanggungjawab' => 'required',
            'kedisiplinan' => 'required',
            ]);

        $data = new karyawan;
        $data->nama = $request->nama;
        $data->posisi = $request->posisi;
        $data->telepon = $request->telepon;
        $data->kehadiran = $request->kehadiran;
        $data->tanggungjawab = $request->tanggungjawab;
        $data->kedisiplinan = $request->kedisiplinan;

        $data->save();
        return redirect('/karyawan')->with('message','Tambah Data Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = karyawan::find($id);
        return view('pages.editkaryawan')->with('list', $data);
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
        //
        $this->validate($request,[
            'nama' => 'required',
            'posisi' => 'required',
            'telepon' => 'required',
            'kehadiran' => 'required',
            'tanggungjawab' => 'required',
            'kedisiplinan' => 'required',
            ]);
        $data = karyawan::find($id);
        $data->nama = $request->nama;
        $data->posisi = $request->posisi;
        $data->telepon = $request->telepon;
        $data->kehadiran = $request->kehadiran;
        $data->tanggungjawab = $request->tanggungjawab;
        $data->kedisiplinan = $request->kedisiplinan;
        $data->save();

        return redirect('/karyawan')->with('message','Perubahan Data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = karyawan::find($id);
        $data->delete();

        // redirect
        return \Redirect::to('/karyawan')->with('message','Hapus Data Karyawan Berhasil');
    }
}
