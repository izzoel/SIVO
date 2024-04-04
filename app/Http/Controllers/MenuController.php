<?php

namespace App\Http\Controllers;

use App\Models\menu;
use App\Models\Bahan;
use App\Models\Mahasiswa;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Session;
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




    public function show()
    {
        $nim = session('nim');
        $nama = session('nama');
        $prodi = session('prodi');
        $keperluan = session('keperluan');

        $cairs = Bahan::where('jenis', 'Cair')->get();
        $padats = Bahan::where('jenis', 'Padat')->get();
        $alats = Bahan::where('jenis', 'Alat')->get();
        $historys = Transaksi::where('id_mahasiswa', $nim)->get();

        // dd(session('nim'), session('keperluan'));
        return view('contents.menu', compact('nim', 'nama', 'prodi', 'keperluan', 'cairs', 'padats', 'alats', 'historys'));
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

    function landing()
    {
        return view('landing');
    }

    public function login(menu $menu, Request $request)
    {
        $nim = Mahasiswa::where('nim', $request->input('data_mahasiswa'))->pluck('nim')->first();

        $biodata = Mahasiswa::find($nim);

        session()->put('nim', $nim);
        session()->put('nama', $biodata->nama);
        session()->put('prodi', $biodata->prodi);
        session()->put('keperluan', $request->input('keperluan'));

        // dd($request->all(), session('nim'), session('nama'), session('keperluan'));
        return redirect()->route('show-menu');
    }

    public function logout(Request $request)
    {
        // Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect('/');
    }
}
