<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use App\Models\Mahasiswa;
use App\Models\Transaksi;
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

    public function showCair()
    {
        $cairs = Bahan::where('jenis', 'Cair')->get();
        return response()->json($cairs);
    }
    public function showPadat()
    {
        $padats = Bahan::where('jenis', 'Padat')->get();
        return response()->json($padats);
    }
    public function showAlat()
    {
        $alats = Bahan::where('jenis', 'Alat')->get();
        return response()->json($alats);
    }

    public function storeTake(Request $request)
    {
        $stok = Bahan::where('id', $request->id_bahan)->value('stok');
        $id_bahan = Bahan::where('id', $request->id_bahan)->value('id');

        Session::put('tab', $request->tab);

        $model = [
            'stok' => max(0, $stok - $request->ambil),
            'lokasi' => ($stok - $request->ambil <= 0) ? '-' : Bahan::where('id', $request->id_bahan)->value('lokasi')
        ];

        $history_tanggal = Transaksi::whereDate('tanggal', '>=', substr($request->tanggal, 0, 10) . ' 00:00:00')
            ->whereDate('tanggal', '<=', substr($request->tanggal, 0, 10) . ' 23:59:59')->where('id_bahan', $request->id_bahan)->where('keperluan', session('keperluan'))
            ->get();

        if ($history_tanggal->isEmpty()) {
            $create = [
                'id_bahan' => $request->id_bahan,
                'jumlah_ambil' => $request->ambil,
                'jumlah_kembali' => $request->kembali,
                'id_mahasiswa' => session('nim'),
                'tanggal' => $request->tanggal,
                'keperluan' => session('keperluan')
            ];

            Transaksi::create($create);
        } else {
            $jumlah_ambil = $history_tanggal->first()->jumlah_ambil;
            $update = [
                'jumlah_ambil' => $jumlah_ambil + $request->ambil,
                'tanggal' => $request->tanggal
            ];

            // $tanggal = date('Y-m', strtotime($request->tanggal));
            // $model['tanggal'] = $tanggal;
            // dd($model['tanggal']);
            // dd($history_tanggal->pluck('id_bahan')->first(), $history_tanggal->pluck('keperluan')->first());
            Transaksi::where('id_bahan', $history_tanggal->pluck('id_bahan')->first())->where('keperluan', $history_tanggal->pluck('keperluan')->first())->update($update);
            // dd($t);
            // Transaksi::where('id_bahan', $history_tanggal->pluck('id_bahan'))->where('keperluan', $history_tanggal->pluck('keperluan'))->update($update);
        }

        Bahan::find($id_bahan)->update($model);

        return back();
    }
    public function storePut(Request $request)
    {
        $stok = Bahan::where('id', $request->id_bahan)->value('stok');
        $id_bahan = Bahan::where('id', $request->id_bahan)->value('id');

        Session::put('tab', $request->tab);

        $model = [
            'stok' => $stok + $request->kembali,
            'lokasi' => ($stok - $request->kembali <= 0) ? '-' : Bahan::where('id', $request->id_bahan)->value('lokasi')
        ];

        $history_tanggal = Transaksi::whereDate('tanggal', '>=', substr($request->tanggal, 0, 10) . ' 00:00:00')
            ->whereDate('tanggal', '<=', substr($request->tanggal, 0, 10) . ' 23:59:59')->where('id_bahan', $request->id_bahan)->where('keperluan', session('keperluan'))
            ->get();
        // dd($history_tanggal);
        if ($history_tanggal->isEmpty()) {
            // dd('create');
            $create = [
                'id_bahan' => $request->id_bahan,
                'jumlah_ambil' => $request->ambil,
                'jumlah_kembali' => $request->kembali,
                'id_mahasiswa' => session('nim'),
                'tanggal' => $request->tanggal,
                'keperluan' => session('keperluan')
            ];

            Transaksi::create($create);
        } else {
            // dd('update');
            $jumlah_kembali = $history_tanggal->first()->jumlah_kembali;
            $update = [
                'jumlah_kembali' => $jumlah_kembali + $request->kembali,
                'tanggal' => $request->tanggal
            ];

            Transaksi::where('id_bahan', $history_tanggal->pluck('id_bahan'))->where('keperluan', $history_tanggal->pluck('keperluan'))->update($update);
        }

        Bahan::find($id_bahan)->update($model);

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
