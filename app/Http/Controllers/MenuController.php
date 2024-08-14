<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\Cair;
use App\Models\Menu;
use App\Models\Bahan;
use App\Models\Padat;
use App\Models\Lokasi;
use App\Models\Satuan;
use App\Models\Kerusakan;
use App\Models\Mahasiswa;
use App\Models\Transaksi;
use App\Models\Laboratorium;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{

    private function bankData()
    {
        $nim = session('nim');
        $nama = session('nama');
        $prodi = session('prodi');
        $keperluan = session('keperluan');
        $cari = session('cari');

        $cairs = Cair::all();
        $padats = Padat::all();
        $alats = Alat::all();

        $kerusakans = Kerusakan::all();
        $satuans = Satuan::all();
        $lokasis = Lokasi::all();
        $laboratoriums = Laboratorium::all();

        $historys = Transaksi::where('id_mahasiswa', $nim)->get();
        $history_admins = Transaksi::all();
        $rekaps = Transaksi::selectRaw('nama, jenis, stok, MONTH(tanggal) as bulan, SUM(jumlah_ambil) as ambil, SUM(jumlah_kembali) as kembali, keperluan')
            ->groupBy('nama', 'jenis', 'stok', 'bulan', 'keperluan')
            ->get();

        return compact('nim', 'nama', 'prodi', 'keperluan', 'cari', 'cairs', 'padats', 'alats',  'kerusakans', 'satuans', 'lokasis', 'laboratoriums', 'historys', 'history_admins', 'rekaps');
    }
    public function show()
    {
        // $nim = session('nim');
        // $nama = session('nama');
        // $prodi = session('prodi');
        // $keperluan = session('keperluan');
        // $cari = session('cari');

        // $kerusakans = Kerusakan::all();
        // $cairs = Bahan::where('jenis', 'Cair')->get();
        // $historys = Transaksi::where('id_mahasiswa', $nim)->get();
        // $history_admins = Transaksi::all();
        // $rekaps = Transaksi::selectRaw('id_bahan, MONTH(tanggal) as bulan, SUM(jumlah_ambil) as ambil,SUM(jumlah_kembali) as kembali, keperluan')
        //     ->groupBy('id_bahan', 'bulan', 'keperluan')
        //     ->get();
        // $title = "cair";
        // return view('contents.menu', compact('nim', 'nama', 'prodi', 'keperluan', 'kerusakans', 'cairs',  'historys', 'history_admins', 'rekaps', 'title', 'cari', 'lokasis'));
        // return view('contents.menu', compact('nim', 'nama', 'prodi', 'keperluan', 'cairs', 'padats', 'alats', 'kerusakans', 'historys', 'history_admins', 'rekaps', 'title'));
    }
    public function showCair()
    {
        $data = $this->bankData();
        $data['title'] = "cair";

        return view('contents.menu', $data);
    }
    public function showPadat()
    {
        $data = $this->bankData();
        $data['title'] = "padat";

        return view('contents.menu', $data);
    }
    public function showAlat()
    {
        $data = $this->bankData();
        $data['title'] = "alat";

        return view('contents.menu', $data);
    }
    public function showKerusakan()
    {
        $data = $this->bankData();
        $data['title'] = "kerusakan";

        return view('contents.menu', $data);
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
        $request->session()->forget('cari');

        return response()->json(['message' => 'Session key "cari" purged successfully']);
    }

    public function setting()
    {
        $data = $this->bankData();
        $data['title'] = "setting";

        return view('contents.menu', $data);
    }
    public function settingSatuan()
    {
        $data = $this->bankData();
        $data['title'] = "satuan";

        return view('contents.menu', $data);
    }
    public function settingLokasi()
    {
        $data = $this->bankData();
        $data['title'] = "lokasi";

        return view('contents.menu', $data);
    }
    public function settingLaboratorium()
    {
        $data = $this->bankData();
        $data['title'] = "laboratorium";

        return view('contents.menu', $data);
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

        return redirect()->route('menu-cair');
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
