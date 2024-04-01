<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MahasiswaController extends Controller
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
    public function show(Mahasiswa $mahasiswa)
    {
        $mahasiswa = Mahasiswa::orderBy('nama')->get();

        return response($mahasiswa);
    }


    public function select(Mahasiswa $mahasiswa, Request $request)
    {
        $select = Mahasiswa::find($request->input('data_mahasiswa'));

        dd($request->all(), $select);


        //     return response($mahasiswa);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //
    }

    public function import()
    {
        Excel::import(new UsersImport(), request()->file('file'));

        return redirect()->back()->with('success', 'Users imported successfully.');
    }
}
