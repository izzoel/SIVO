<?php

namespace App\Http\Controllers;

use App\Models\menu;
use App\Models\Bahan;
use App\Models\Mahasiswa;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(bahan $bahan, Request $request)
    {
        $cair = Bahan::where('jenis', 'Cair')->get();
        $padat = Bahan::where('jenis', 'Padat')->get();
        $alat = Bahan::where('jenis', 'Alat')->get();
        $lokasi = Bahan::distinct()->pluck('lokasi');

        $biodata = Mahasiswa::find($request->input('data_mahasiswa'));
        $nim = Mahasiswa::where('nim', $request->input('data_mahasiswa'))->pluck('nim')->first();
        $transaksis = Transaksi::where('id_mahasiswa', $nim)->get();
        // dd($transaksis, $biodata);
        return view('contents.menu')->with([
            'dcair' => $cair,
            'dpadat' => $padat,
            'dalat' => $alat,
            'jenis' => Bahan::where('jenis', ucfirst(session()->get('tabValue') ?? 'Cair'))->get(),
            // 'nameValue' => session()->get('nameValue') ?? '',
            // 'tabValue' => session()->get('tabValue') ?? 'Bahan Cair',
            'lokasi' => $lokasi,
            'biodata' => $biodata,
            'keperluan' => $request->input('keperluan'),
            'transaksis' => $transaksis
        ]);
    }

    public function showCair()
    {
        $cairs = Bahan::where('jenis', 'Cair')->get();
        return response()->json($cairs);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(menu $menu)
    {
        //
    }

    public function logout()
    {
        return redirect('/');
    }
}
