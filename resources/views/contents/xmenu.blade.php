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
                            type="button" role="tab"">Bahan
                            Cair</button>
                        <button class="nav-link" id="nav-padat-tab" data-bs-toggle="tab" data-bs-target="#nav-padat"
                            type="button" role="tab" aria-selected="false">Bahan&nbsp;Padat</button>
                        <button class="nav-link" id="nav-alat-tab" data-bs-toggle="tab" data-bs-target="#nav-alat"
                            type="button" role="tab">Alat</button>
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-cair" role="tabpanel">
                        <div class="row m-2 p-3" data-aos="fade-up">
                            <table id="cair" class="table table-striped tabca" style="width:100%">
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

                    <div class="tab-pane fade" id="nav-padat" role="tabpanel">
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
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-alat" role="tabpanel">
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
    @include('modals.modal_history')
    @include('modals.modal_cair')
    @include('modals.modal_padat')


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
