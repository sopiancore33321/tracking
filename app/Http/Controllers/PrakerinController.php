<?php

namespace App\Http\Controllers;

use App\Models\Prakerin;
use Illuminate\Http\Request;
use App\Models\Rw;
class PrakerinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rw = Rw::all();
        $prakerin = Prakerin::with('rw.kelurahan.kecamatan.kota.provinsi')->get();
        return view('admin.prakerin.index',compact('prakerin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $rw = Rw::all();
        $prakerin = Prakerin::all();
        $title = "Tambah Data";
        return view('admin.prakerin.create', compact("rw","prakerin"));
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
        $prakerin = new Prakerin();
        $prakerin->jumlah_positif = $request->jumlah_positif;
        $prakerin->id_rw = $request->id_rw;
        $prakerin->jumlah_meninggal = $request->jumlah_meninggal;
        $prakerin->jumlah_sembuh = $request->jumlah_sembuh;
        $prakerin->tanggal = $request->tanggal;

        $prakerin->save();
        return redirect()->route('prakerin.index')->with('sukses','Data Berhasil Di Tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prakerin  $prakerin
     * @return \Illuminate\Http\Response
     */
    public function show(Prakerin $prakerin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prakerin  $prakerin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $rw = Rw::all();
        $prakerin = Prakerin::all();
        $title = "Tambah Data";
        return view('admin.prakerin.edit', compact("rw","prakerin"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prakerin  $prakerin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $prakerin = Prakerin::findOrFail($id);
        $rw = Rw::all();
        $prakerin->jumlah_positif = $request->jumlah_positif;
        $prakerin->id_rw = $request->id_rw;
        $prakerin->jumlah_meninggal = $request->jumlah_meninggal;
        $prakerin->jumlah_sembuh = $request->jumlah_sembuh;
        $prakerin->tanggal = $request->tanggal;

        return redirect()->route('prakerin.index')->with('sukses','Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prakerin  $prakerin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prakerin $prakerin)
    {
        //

    }
}
