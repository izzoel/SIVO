@php
    $badgeClass = $keperluan == 'Praktikum' ? 'bg-primary' : 'bg-success';
@endphp

<header id="header" style="z-index: auto">
    <div class="d-flex flex-column">
        <div class="profile text-center">
            <img src="assets/img/profile-img.jpg" alt="" class="img-fluid rounded-circle mx-auto d-block">
            {{-- <img src="https://api.dicebear.com/8.x/bottts/svg" alt="Avatar"> --}}
            <h4 class="text-light"><a>{{ $nama }}</a> <a href="{{ route('logout') }}"
                    class="btn btn-sm btn-danger"><i class="bx bx-power-off"></i></a></h4>
            <span class="badge rounded-pill {{ $badgeClass }}">{{ $keperluan }}</span>
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
            <span class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#history"><b>History</b></span>
        </div>
        <div class="card-body">

            <div class="row" style="overflow-y: auto; max-height: 120px;" id="list-history">
                @foreach ($historys as $history)
                    <div class="col-auto">
                        <div class="card-text text-secondary">{{ substr($history->tanggal, 0, 10) }}</div>
                    </div>
                    <div class="col">
                        <hr>
                    </div>
                    <div class="col-auto">
                        <span
                            class="badge rounded-pill {{ $history->keperluan === 'Praktikum' ? 'bg-primary' : 'bg-success' }}">{{ $history->keperluan }}
                        </span>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
    @include('partials.links')
</header>
