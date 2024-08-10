<header id="header" style="z-index: auto">
    @if (auth()->check())
        <title>SIVO | Admin Panel</title>
    @else
        <title>SIVO | Menu</title>
    @endif
    <div class="d-flex flex-column">
        <div class="profile text-center">
            <img src="{{ asset('/avatars/' . session('avatar') . '.png') }}" alt=""
                class="img-fluid rounded-circle mx-auto d-block">
            <h4 class="text-light"><a>{{ $nama }}</a> <a href="{{ route('logout') }}"
                    class="btn btn-sm btn-danger"><i class="bx bx-power-off"></i></a></h4>
            <span
                class="badge rounded-pill  {{ $keperluan === 'Praktikum' ? 'bg-primary' : ($keperluan === 'Penelitian' ? 'bg-success' : 'bg-danger') }}">{{ $keperluan }}</span>
        </div>
    </div>
    <div class="row pe-4 pt-4">
        <div class="col-md-3">
            <div href="#hero" class="text-white p-3 pb-1" disabled><span>NIM</span></div>
        </div>
        <div class="col-md-1">
            <div class="text-white p-3 pb-1" disabled><span>:</span></div>
        </div>
        <div class="col-md-auto">
            <div class="text-white p-3 pb-1" disabled> <span class="badge rounded-pill"
                    style="background-color: chocolate">{{ session('nim') }}</span></div>
        </div>
    </div>
    <div class="row pe-4 pb-4">
        <div class="col-md-3">
            <div href="#hero" class="text-white p-3" disabled><span>Prodi</span></div>
        </div>
        <div class="col-md-1">
            <div class="text-white p-3" disabled><span>:</span></div>
        </div>
        <div class="col-md-auto">
            <div class="text-white p-3" disabled><span
                    class="badge rounded-pill bg-success">{{ session('prodi') }}</span></div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">

            <div class="btn-group btn-group-sm" role="group">
                <span class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modal_history"><i
                        class='bx bx-history'></i><b> History</b></span>
                @auth
                    <span class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#modal_rekap"><i
                            class='bx bx-spreadsheet'></i><b> Rekap</b></span>
                    <span class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal_bahan"><i
                            class='bx bxs-vial'></i><b> Bahan</b></span>
                @endauth
            </div>

        </div>
        <div class="card-body">

            <div class="row" style="overflow-y: auto; max-height: 120px;" id="list-history">
                @php($historyMap = [])
                @foreach ($historys->sortByDesc('tanggal') as $history)
                    @if (!isset($historyMap[$history->keperluan]))
                        @php($historyMap[$history->keperluan] = true)
                        <div class="col-auto text-secondary d-flex align-items-center" style="font-size: 10px">
                            {{-- <div class="card-text text-secondary" style="font-size: 10px"> --}}
                            {{ \Carbon\Carbon::parse($history->tanggal)->translatedFormat('d F Y') }}
                            {{-- </div> --}}
                        </div>
                        <div class="col" style="font-size: 10px">
                            <hr>
                        </div>
                        <div class="col-auto">
                            <span
                                class="badge rounded-pill  {{ $history->keperluan === 'Praktikum' ? 'bg-primary' : ($history->keperluan === 'Penelitian' ? 'bg-success' : 'bg-danger') }}"
                                style="font-size: 10px">{{ $history->keperluan }}
                            </span>
                        </div>
                    @endif
                @endforeach
            </div>

        </div>
    </div>

</header>