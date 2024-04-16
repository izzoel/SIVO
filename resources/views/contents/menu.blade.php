<!DOCTYPE html>
<html lang="en">

@include('layouts.header')

<body>

    <main id="main">
        <section id="about">
            <div class="container-fluid">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-cair-tab" data-bs-toggle="tab" data-bs-target="#nav-cair"
                            type="button" role="tab">Bahan
                            Cair</button>
                        <button class=" nav-link" id="nav-padat-tab" data-bs-toggle="tab" data-bs-target="#nav-padat"
                            type="button" role="tab" aria-selected="false">Bahan&nbsp;Padat</button>
                        <button class="nav-link" id="nav-alat-tab" data-bs-toggle="tab" data-bs-target="#nav-alat"
                            type="button" role="tab">Alat</button>
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-cair" role="tabpanel">
                        <div class="row m-2 p-3" data-aos="fade-up">
                            <table id="cair" class="table table-striped table-hover table-bordered"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nama Bahan Cair</th>
                                        <th class="col-2">Stok</th>
                                        <th class="col-2">Lokasi</th>
                                        <th class="col-3">Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-padat" role="tabpanel">
                        <div class="row m-2 p-3" data-aos="fade-up">
                            <table id="padat" class="table table-striped table-hover table-bordered"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nama Bahan Padat</th>
                                        <th class="col-2">Stok</th>
                                        <th class="col-2">Lokasi</th>
                                        <th class="col-3">Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-alat" role="tabpanel">
                        <div class="row m-2 p-3" data-aos="fade-up">
                            <table id="alat" class="table table-striped table-hover table-bordered"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nama Alat</th>
                                        <th class="col-2">Stok</th>
                                        <th class="col-2">Lokasi</th>
                                        <th class="col-3">Aksi</th>
                                    </tr>
                                </thead>

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
    @include('modals.modal_alat')

    @auth
        @include('modals.modal_rekap')
        @include('modals.modal_bahan')
        @include('modals.modal_lokasi')
    @endauth

    <a href="/" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up"></i></a>

    <footer id="footer">
        <div class="container">
            <div class="copyright">
                <button type="button" class="btn btn-warning">
                    <strong><span>[ Versi BETA ]</span></strong>
                </button>
                </p>
            </div>
            <div class="credits">
                Designed by <a href="https://izzoel.github.io/"
                    style="text-decoration: none; color: #d2691e;"><b>zetware</b> </a>@2024
            </div>
        </div>
    </footer>
    < @include('partials.scripts') </body>

</html>
