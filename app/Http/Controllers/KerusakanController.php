<?php

namespace App\Http\Controllers;

use App\Models\Kerusakan;
use Illuminate\Http\Request;
use App\Imports\KerusakanImports;
use Maatwebsite\Excel\Facades\Excel;

class KerusakanController extends Controller
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
    public function store(Request $reques)
    {
    }

    public function import(Request $request)
    {
        Excel::import(new KerusakanImports, $request->file('excel'));
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Kerusakan $kerusakan)
    {
        $kerusakan = Kerusakan::all();
        return response()->json($kerusakan);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kerusakan $kerusakan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kerusakan $kerusakan, $id)
    {
        // $kerusakan = Kerusakan::find($id);
        $update = [
            'nama' => $request->nama,
            'lokasi' => $request->lokasi,
            'kondisi' => $request->kondisi,
            'status' => $request->status
        ];
        // dd($update);

        Kerusakan::where('id', $id)->update($update);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kerusakan $kerusakan)
    {
        //
    }
}
