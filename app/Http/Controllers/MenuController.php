<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Bahan;
use App\Models\Kerusakan;
use App\Models\Mahasiswa;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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




    // public function show()
    // {
    //     $nim = session('nim');
    //     $nama = session('nama');
    //     $prodi = session('prodi');
    //     $keperluan = session('keperluan');

    //     $cairs = Bahan::where('jenis', 'Cair')->get();
    //     $padats = Bahan::where('jenis', 'Padat')->get();
    //     $alats = Bahan::where('jenis', 'Alat')->get();
    //     $kerusakans = Kerusakan::all();
    //     $historys = Transaksi::where('id_mahasiswa', $nim)->get();
    //     $history_admins = Transaksi::all();
    //     $rekaps = Transaksi::selectRaw('id_bahan, MONTH(tanggal) as bulan, SUM(jumlah_ambil) as ambil,SUM(jumlah_kembali) as kembali, keperluan')
    //         ->groupBy('id_bahan', 'bulan', 'keperluan')
    //         ->get();

    //     return view('contents.menu', compact('nim', 'nama', 'prodi', 'keperluan', 'cairs', 'padats', 'alats', 'kerusakans', 'historys', 'history_admins', 'rekaps'));
    // }
    public function show()
    {
        $nim = session('nim');
        $nama = session('nama');
        $prodi = session('prodi');
        $keperluan = session('keperluan');
        $cari = session('cari');

        $cairs = Bahan::where('jenis', 'Cair')->get();
        // $padats = Bahan::where('jenis', 'Padat')->get();
        // $alats = Bahan::where('jenis', 'Alat')->get();
        // $kerusakans = Kerusakan::all();
        $historys = Transaksi::where('id_mahasiswa', $nim)->get();
        $history_admins = Transaksi::all();
        $rekaps = Transaksi::selectRaw('id_bahan, MONTH(tanggal) as bulan, SUM(jumlah_ambil) as ambil,SUM(jumlah_kembali) as kembali, keperluan')
            ->groupBy('id_bahan', 'bulan', 'keperluan')
            ->get();
        $title = "cair";
        return view('contents.menu', compact('nim', 'nama', 'prodi', 'keperluan', 'cairs',  'historys', 'history_admins', 'rekaps', 'title', 'cari'));
        // return view('contents.menu', compact('nim', 'nama', 'prodi', 'keperluan', 'cairs', 'padats', 'alats', 'kerusakans', 'historys', 'history_admins', 'rekaps', 'title'));
    }
    public function showCair()
    {
        $nim = session('nim');
        $nama = session('nama');
        $prodi = session('prodi');
        $keperluan = session('keperluan');
        $cari = session('cari');

        $cairs = Bahan::where('jenis', 'Cair')->get();
        $historys = Transaksi::where('id_mahasiswa', $nim)->get();
        $history_admins = Transaksi::all();
        $rekaps = Transaksi::selectRaw('id_bahan, MONTH(tanggal) as bulan, SUM(jumlah_ambil) as ambil,SUM(jumlah_kembali) as kembali, keperluan')
            ->groupBy('id_bahan', 'bulan', 'keperluan')
            ->get();
        $title = "cair";
        return view('contents.menu', compact('nim', 'nama', 'prodi', 'keperluan', 'cairs',  'historys', 'history_admins', 'rekaps', 'title', 'cari'));
    }
    public function showPadat()
    {
        $nim = session('nim');
        $nama = session('nama');
        $prodi = session('prodi');
        $keperluan = session('keperluan');
        $cari = session('cari');

        $padats = Bahan::where('jenis', 'Padat')->get();
        $historys = Transaksi::where('id_mahasiswa', $nim)->get();
        $history_admins = Transaksi::all();
        $rekaps = Transaksi::selectRaw('id_bahan, MONTH(tanggal) as bulan, SUM(jumlah_ambil) as ambil,SUM(jumlah_kembali) as kembali, keperluan')
            ->groupBy('id_bahan', 'bulan', 'keperluan')
            ->get();
        $title = "padat";
        return view('contents.menu', compact('nim', 'nama', 'prodi', 'keperluan', 'padats',  'historys', 'history_admins', 'rekaps', 'title', 'cari'));
    }
    public function showAlat()
    {
        $nim = session('nim');
        $nama = session('nama');
        $prodi = session('prodi');
        $keperluan = session('keperluan');
        $cari = session('cari');

        $alats = Bahan::where('jenis', 'Alat')->get();
        $historys = Transaksi::where('id_mahasiswa', $nim)->get();
        $history_admins = Transaksi::all();
        $rekaps = Transaksi::selectRaw('id_bahan, MONTH(tanggal) as bulan, SUM(jumlah_ambil) as ambil,SUM(jumlah_kembali) as kembali, keperluan')
            ->groupBy('id_bahan', 'bulan', 'keperluan')
            ->get();
        $title = "alat";
        return view('contents.menu', compact('nim', 'nama', 'prodi', 'keperluan', 'alats',  'historys', 'history_admins', 'rekaps', 'title', 'cari'));
    }
    public function showKerusakan()
    {
        $nim = session('nim');
        $nama = session('nama');
        $prodi = session('prodi');
        $keperluan = session('keperluan');
        $cari = session('cari');

        $kerusakans = Kerusakan::all();
        $historys = Transaksi::where('id_mahasiswa', $nim)->get();
        $history_admins = Transaksi::all();
        $rekaps = Transaksi::selectRaw('id_bahan, MONTH(tanggal) as bulan, SUM(jumlah_ambil) as ambil,SUM(jumlah_kembali) as kembali, keperluan')
            ->groupBy('id_bahan', 'bulan', 'keperluan')
            ->get();
        $title = "kerusakan";
        return view('contents.menu', compact('nim', 'nama', 'prodi', 'keperluan', 'kerusakans',  'historys', 'history_admins', 'rekaps', 'title', 'cari'));
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

    public function purge(Request $request)
    {
        // Purge the specific session key
        $request->session()->forget('cari');

        // Optionally, return a response
        return response()->json(['message' => 'Session key "cari" purged successfully']);
    }

    function landing()
    {
        return view('landing');
    }

    public function logbook(menu $menu, Request $request)
    {
        $nim = Mahasiswa::where('nim', $request->input('data_mahasiswa'))->pluck('nim')->first();

        $biodata = Mahasiswa::find($nim);
        $avatar = substr($biodata->nim, -1);
        session()->put('nim', $nim);
        session()->put('nama', $biodata->nama);
        session()->put('prodi', $biodata->prodi);
        session()->put('keperluan', $request->input('keperluan'));
        session()->put('avatar', $avatar);

        return redirect()->route('show-menu');
    }
    public function login(Menu $menu, Request $request)
    {
        $credentials = $request->only('username', 'password');
        if (auth()->attempt($credentials)) {
            session()->put('nim', '∞');
            session()->put('nama', 'ADMIN');
            session()->put('prodi', 'UNIVERSAL');
            session()->put('keperluan', 'Inventaris');
            session()->put('avatar', 'admin');


            return redirect()->route('menu-cair');
            // return redirect()->route('show-menu');
        } else {
            return redirect()->back();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect()->route('landing');
    }
}
