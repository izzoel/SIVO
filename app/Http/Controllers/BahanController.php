<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BahanController extends Controller
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

        return view('index')->with([
            'dcair' => $cair,
            'dpadat' => $padat,
            'dalat' => $alat,
            // 'selectedTabId'  => 'nav-cair-tab',
            'nameValue' => session()->get('nameValue') ?? '',
            'TabValue' => session()->get('tabValue') ?? 'Bahan Cair',
            'lokasi' => $lokasi
        ]);
    }


    public function showCair(bahan $bahan, Request $request)
    {
        $cair = Bahan::where('jenis', 'Cair')->get();
        $padat = Bahan::where('jenis', 'Padat')->get();
        $alat = Bahan::where('jenis', 'Alat')->get();
        $lokasi = Bahan::distinct()->pluck('lokasi');

        $nameValue = '';



        return view('index')->with(['dcair' => $cair, 'dpadat' => $padat, 'dalat' => $alat, 'selectedTabId'  => 'nav-cair-tab', 'nameValue' => $nameValue, 'lokasi' => $lokasi]);
        // dd($users);
    }

    public function upCair(bahan $bahan, Request $request)
    {
        $model = [
            'stok' => max(0, $request->stok - $request->ambil),
            'lokasi' => ($request->stok - $request->ambil <= 0) ? '-' : Bahan::where('id', $request->id)->value('lokasi')
        ];

        Bahan::find($request->id)->update($model);

        $bahan = Bahan::find($request->id);
        Session::put('nameValue', $bahan->nama);
        Session::put('tabValue', $request->tab);

        return redirect()->route('show');
    }

    function restokCair(bahan $bahan, Request $request)
    {
        $model = [
            'stok' => $request->stok + $request->restok,
            'lokasi' => $request->lokasi
        ];

        Bahan::find($request->id)->update($model);

        $bahan = Bahan::find($request->id);
        Session::put('nameValue', $bahan->nama);
        Session::put('tabValue', $request->tab);

        return redirect()->route('show');
    }


    public function login(Request $request)
    {
        if (Auth::attempt($request->only('username', 'password'))) {
            // dd('benar');
            return redirect()->route('show');
        } else {
            // dd('salah');
            Session::flash('admin', 'Username/Password Salah!');
            return back();
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(bahan $bahan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, bahan $bahan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(bahan $bahan)
    {
        //
    }
}
