<header id="header">
    <div class="d-flex flex-column">
        <div class="profile text-center">
            <img src="assets/img/profile-img.jpg" alt="" class="img-fluid rounded-circle mx-auto d-block">
            <h4 class="text-light"><a>{{ $biodata->nama }}</a> <a href="{{ route('logout') }}"
                    class="btn btn-sm btn-danger"><i class="bx bx-power-off"></i></a></h4>
            <span class="badge rounded-pill bg-primary">{{ $keperluan }}</span>
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
                    style="background-color: chocolate">{{ $biodata->nim }}</span></div>
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
                    class="badge rounded-pill bg-success">{{ $biodata->prodi }}</span></div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <span class="btn btn-sm btn-warning"><b>Peminjaman</b></span>
        </div>
        <div class="card-body">

            <div class="row" style="overflow-y: auto; max-height: 120px;" id="transaksi">
            </div>

        </div>
    </div>

    @include('partials.links')
</header>
