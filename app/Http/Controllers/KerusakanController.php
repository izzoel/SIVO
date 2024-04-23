<?php

namespace App\Http\Controllers;

use App\Models\Kerusakan;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        //
    }

    public function import(Request $request)
    {
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
    public function update(Request $request, Kerusakan $kerusakan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kerusakan $kerusakan)
    {
        //
    }
}
