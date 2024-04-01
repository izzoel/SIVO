<!DOCTYPE html>
<html lang="en">
@include('layouts.header')

<body>

    <main id="main">
        <section id="about">
            <div class="container">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-cair-tab" data-bs-toggle="tab" data-bs-target="#nav-cair"
                            type="button" role="tab" aria-controls="nav-cair" aria-selected="true">Bahan
                            Cair</button>
                        <button class="nav-link" id="nav-padat-tab" data-bs-toggle="tab" data-bs-target="#nav-padat"
                            type="button" role="tab" aria-controls="nav-padat"
                            aria-selected="false">Bahan&nbsp;Padat</button>
                        <button class="nav-link" id="nav-alat-tab" data-bs-toggle="tab" data-bs-target="#nav-alat"
                            type="button" role="tab" aria-controls="nav-alat" aria-selected="false">Alat</button>
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-cair" role="tabpanel"
                        aria-labelledby="nav-cair-tab">
                        <div class="row m-2 p-3" data-aos="fade-up">
                            <table id="cair" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nama Bahan Cair</th>
                                        <th>Stok</th>
                                        <th>Lokasi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-padat" role="tabpanel" aria-labelledby="nav-padat-tab">
                        <div class="row m-2 p-3" data-aos="fade-up">
                            <table id="padat" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nama Bahan Padat</th>
                                        <th>Stok</th>
                                        <th>Lokasi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dpadat as $d)
                                        <tr>
                                            <td>{{ $d->nama }}</td>
                                            <td>{{ $d->stok }} gram</td>
                                            <td>{{ $d->lokasi }}</td>
                                            <td>
                                                <button type="button" class="btn btn-warning btn-sm"
                                                    data-bs-toggle="modal" data-bs-target="#padat{{ $d->id }}"
                                                    {{ $d->stok <= 0 ? 'disabled' : '' }}>
                                                    <i class='bx bxs-donate-blood'></i>
                                                </button>
                                                @auth
                                                    <button type="button" class="btn btn-success btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#restok_padat{{ $d->id }}">
                                                        <i class='bx bxs-archive-in'></i>
                                                    </button>
                                                @endauth
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-alat" role="tabpanel" aria-labelledby="nav-alat-tab">
                        <div class="row m-2 p-3" data-aos="fade-up">
                            <table id="alat" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nama Alat</th>
                                        <th>Stok</th>
                                        <th>Lokasi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dalat as $d)
                                        <tr>
                                            <td>{{ $d->nama }}</td>
                                            <td>{{ $d->stok }}</td>
                                            <td>{{ $d->lokasi }}</td>
                                            <td>
                                                <a class="btn btn-warning btn-sm" href="" role="button">
                                                    <i class='bx bxs-donate-blood'></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </section>

    </main>

    @include('modals.modal_cair')

    {{-- @foreach ($dpadat as $n)
        <div class="modal fade" id="padat{{ $n->id }}" tabindex="-1" aria-labelledby="modalBahanCair"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <a class="btn btn-warning"><b>{{ $n->nama }} </b></a>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form
                        action="{{ auth()->check() ? route('admin_take', ['id' => $m->id]) : route('take', $m->id) }}">
                        @csrf
                        <div class="modal-body">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Stok</td>
                                        <td>:</td>
                                        <td><span class="badge bg-primary">{{ $n->stok . ' ml' }}</span></td>
                                        <input type="hidden" name="id" value="{{ $n->id }}">
                                        <input type="hidden" name="stok" value="{{ $n->stok }}">
                                        <input type="hidden" name="tab" value="padat">
                                    </tr>
                                    <tr>
                                        <td>Lokasi</td>
                                        <td>:</td>
                                        <td><span class="badge bg-secondary">{{ $n->lokasi }}</span></td>
                                    </tr>
                                </tbody>
                            </table>

                            <div>
                                <label for="ambil">Jumlah Pengurangan</label>
                                <div class="input-group">
                                    <input type="text" class="form-control angka" id="ambil{{ $n->id }}"
                                        name="ambil" required>
                                    <span class="input-group-text">gr</span>
                                </div>
                            </div>
                            <div class="mt-4">
                                <label for="keperluan ">Keperluan</label>
                                <select class="form-select " name="keperluan" required>
                                    <option selected disabled value="">-- pilih --</option>
                                    <option value="Penelitian">Penelitian</option>
                                    <option value="Penelitian">Praktikum</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @auth
            <div class="modal fade" id="restok_padat{{ $n->id }}" tabindex="-1"
                aria-labelledby="modalBahanCair" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">
                                <a class="btn btn-warning"><b>{{ $n->nama }} </b></a>
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ route('restok', '') . '/' . $n->id }}">
                            @csrf
                            <div class="modal-body">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Stok</td>
                                            <td>:</td>
                                            <td><span class="badge bg-primary">{{ $n->stok . ' ml' }}</span></td>
                                            <input type="hidden" name="id" value="{{ $n->id }}">
                                            <input type="hidden" name="stok" value="{{ $n->stok }}">
                                            <input type="hidden" name="tab" value="padat">
                                        </tr>
                                        <tr>
                                            <td>Lokasi</td>
                                            <td>:</td>
                                            <td>
                                                <select class="form-select" aria-label="lokasi bahan" name="lokasi">
                                                    <option disabled>-- pilih --</option>

                                                    @foreach ($lokasi as $lok)
                                                        <option value="{{ $lok }}"
                                                            {{ $lok === $n->lokasi ? 'selected' : '' }}>
                                                            {{ $lok }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <label for="restok">Jumlah Penambahan</label>
                                <div class="input-group">
                                    <input type="text" class="form-control angka" id="restok{{ $n->id }}"
                                        name="restok">
                                    <span class="input-group-text">gr</span>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endauth
    @endforeach --}}



    <div class="modal fade" id="admin" tabindex="-1" aria-labelledby="modalAdmin" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                @guest


                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Login
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="login" action="{{ route('login') }}">
                        <div class="modal-body">
                            @csrf
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" id="username"
                                    aria-describedby="username">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm">Login</button>
                        </div>
                    </form>
                @endguest
                @auth
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Login
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="login" action="{{ route('logout') }}">
                        <div class="modal-body">
                            @csrf
                            Logout dari akun Admin?
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                        </div>
                    </form>
                @endauth

            </div>
        </div>
    </div>

    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="modalAdd" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="addLabel">
                        Tambah Baru
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="add">
                    <div class="modal-body">
                        @csrf
                        <div class="row g-3 align-items-center ps-4 pe-4">
                            <div class="col-4">
                                <label for="namaBahan" class="col-form-label">Nama Bahan</label>
                            </div>
                            <div class="col">
                                <input type="password" id="namaBahan" class="form-control" </div>
                            </div>
                        </div>
                        <div class="row g-3 mt-1 align-items-center ps-4 pe-4">
                            <div class="col-4">
                                <label for="stok" class="col-form-label">Stok</label>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="stok">
                                    <span class="input-group-text">ml</span>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3 mt-1 align-items-center ps-4 pe-4">
                            <div class="col-4">
                                <label class="col-form-label">Lokasi</label>
                            </div>
                            <div class="col">
                                <select class="form-select" aria-label="lokasi bahan" name="lokasi">
                                    <option disabled>-- pilih --</option>
                                    @foreach ($lokasi as $lok)
                                        <option value="{{ $lok }}">{{ $lok }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <a href="/" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-repeat"></i></a>




    @include('partials.scripts')






</body>

</html>
