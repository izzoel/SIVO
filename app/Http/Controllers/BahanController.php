<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use Illuminate\Http\Request;

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
    public function showCair(bahan $bahan, Request $request)
    {
        $cair = Bahan::where('jenis', 'Cair')->get();
        $padat = Bahan::where('jenis', 'Padat')->get();
        $alat = Bahan::where('jenis', 'Alat')->get();


        $nameValue = '';



        return view('index')->with(['dcair' => $cair, 'dpadat' => $padat, 'dalat' => $alat, 'selectedTabId'  => 'nav-cair-tab', 'nameValue' => $nameValue]);
        // dd($users);
    }

    public function upCair(bahan $bahan, Request $request)
    {
        $model = [
            'stok' => $request->stok - $request->ambil,
        ];

        Bahan::find($request->id)->update($model);
        $bahan = Bahan::find($request->id);

        if ($bahan) {
            $nameValue = $bahan->nama;
        }

        $cair = Bahan::where('jenis', 'Cair')->get();
        $padat = Bahan::where('jenis', 'Padat')->get();
        $alat = Bahan::where('jenis', 'Alat')->get();

        return view('index')->with(['dcair' => $cair, 'dpadat' => $padat, 'dalat' => $alat, 'selectedTabId'  => 'nav-cair-tab', 'nameValue' => $nameValue]);
    }


    public function login(bahan $bahan, Request $request)
    {
        dd($request->all());
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
