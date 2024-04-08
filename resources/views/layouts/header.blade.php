<head>
    @include('partials.links')
</head>

<header id="header" style="z-index: auto">
    @if (auth()->check())
        <title>SIVO | Admin Panel</title>
    @else
        <title>SIVO | Menu</title>
    @endif
    <div class="d-flex flex-column">
        <div class="profile text-center">
            <img src="assets/avatars/{{ session('avatar') }}.png" alt=""
                class="img-fluid rounded-circle mx-auto d-block">
            {{-- <img src="{{ Avatar::create(session('nama'))->toSvg() }}" class="img-fluid rounded-circle mx-auto d-block" /> --}}
            {{-- <img src="{{ Avatar::create(session('nama'))->toGravatar() }}" alt=""> --}}
            {{-- <img src="{{ Avatar::create(session('nama'))->setFontFamily('Laravolt')->toSvg() }}" alt=""> --}}
            {{-- <img src="https://api.dicebear.com/8.x/bottts/svg" alt=""> --}}
            {{-- <img src="https://api.dicebear.com/8.x/bottts/svg" alt="Avatar"> --}}
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
            <span class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#history"><i
                    class='bx bx-history'></i><b> History</b></span>
            @auth
                <span class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#rekap"><i
                        class='bx bx-spreadsheet'></i><b> Rekap</b></span>

            @endauth
        </div>
        <div class="card-body">

            <div class="row" style="overflow-y: auto; max-height: 120px;" id="list-history">
                @php($historyMap = [])
                @foreach ($historys->sortByDesc('tanggal') as $history)
                    @if (!isset($historyMap[$history->keperluan]))
                        @php($historyMap[$history->keperluan] = true)
                        <div class="col-auto">
                            <div class="card-text text-secondary">
                                {{ \Carbon\Carbon::parse($history->tanggal)->translatedFormat('d F Y') }}
                            </div>
                        </div>
                        <div class="col">
                            <hr>
                        </div>
                        <div class="col-auto">
                            <span
                                class="badge rounded-pill  {{ $history->keperluan === 'Praktikum' ? 'bg-primary' : ($history->keperluan === 'Penelitian' ? 'bg-success' : 'bg-danger') }}">{{ $history->keperluan }}
                            </span>
                        </div>
                    @endif
                @endforeach
            </div>

        </div>
    </div>

</header>
