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
    // public function show(bahan $bahan, Request $request)
    // {
    //     $cair = Bahan::where('jenis', 'Cair')->get();
    //     $padat = Bahan::where('jenis', 'Padat')->get();
    //     $alat = Bahan::where('jenis', 'Alat')->get();
    //     $lokasi = Bahan::distinct()->pluck('lokasi');

    //     // $mahasiswas = Mahasiswa::all();
    //     // dd($mahasiswas);
    //     // dd(session()->get('tabValue') ?? 'cair');
    //     // $jenis = Bahan::where('jenis', ucfirst(session()->get('tabValue') ?? 'Cair'))->get();
    //     // dd(session()->get('tabValue') ?? 'cair');
    //     return view('landing')->with([
    //         'dcair' => $cair,
    //         'dpadat' => $padat,
    //         'dalat' => $alat,
    //         'jenis' => Bahan::where('jenis', ucfirst(session()->get('tabValue') ?? 'Cair'))->get(),
    //         // 'selectedTabId'  => 'nav-cair-tab',
    //         // 'nameValue' => session()->get('nameValue') ?? '',
    //         'tabValue' => session()->get('tabValue') ?? 'Bahan Cair',
    //         'lokasi' => $lokasi,
    //         // 'mahasiswas' => $mahasiswas

    //     ]);
    // }

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

    // public function take(bahan $bahan, Request $request)
    // {

    //     $model = [
    //         'stok' => max(0, $request->stok - $request->ambil),
    //         'lokasi' => ($request->stok - $request->ambil <= 0) ? '-' : Bahan::where('id', $request->id)->value('lokasi')
    //     ];

    //     $create = [
    //         'id_bahan' => $request->id,
    //         'jumlah_ambil' => $request->ambil,
    //         'id_mahasiswa' => $request->nim,
    //         'tanggal' => $request->tanggal,
    //         'keperluan' => $request->keperluan
    //     ];

    //     Bahan::find($request->id)->update($model);
    //     Transaksi::create($create);

    //     $bahan = Bahan::find($request->id);
    //     Session::put('nameValue', $bahan->nama);
    //     Session::put('tabValue', $request->tab);
    //     Session::put('nim', $request->nim);

    //     if (auth()->check()) {
    //         return redirect()->route('admin');
    //     } else {
    //         return back();
    //     }
    // }

    public function store_take(Request $request)
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

            // dd($update);

            Transaksi::where('id_bahan', $history_tanggal->pluck('id_bahan'))->where('keperluan', $history_tanggal->pluck('keperluan'))->update($update);
            // dd($t);
            // Transaksi::where('id_bahan', $history_tanggal->pluck('id_bahan'))->where('keperluan', $history_tanggal->pluck('keperluan'))->update($update);
        }

        Bahan::find($id_bahan)->update($model);

        return back();
    }
    public function store_put(Request $request)
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

            Transaksi::where('id_bahan', $history_tanggal->pluck('id_bahan'))->update($update);
        }

        Bahan::find($id_bahan)->update($model);

        return back();
    }


    // public function login(Request $request)
    // {
    //     if (Auth::attempt($request->only('username', 'password'))) {
    //         // dd('benar');
    //         return redirect()->route('admin');
    //     } else {
    //         // dd('salah');
    //         Session::flash('admin', 'Username/Password Salah!');
    //         return back();
    //     }
    // }
    // public function logout(Request $request)
    // {
    //     Auth::logout();

    //     $request->session()->invalidate();

    //     $request->session()->regenerateToken();
    //     return back();
    // }

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
