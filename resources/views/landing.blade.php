<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SIVO | Sistem Informasi Inventaris Depo</title>
    <link rel="shortcut icon" type="image/jpg" href="assets/img/favicon.png" />
    <meta content="" name="description">
    <meta content="" name="keywords">

    @include('partials.links')
    <!-- =======================================================
  * Template Name: iPortfolio
  * Updated: Nov 17 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
        <div class="hero-container d-flex flex-column justify-content-center" data-aos="fade-in">
            <h1 class=""><a href="#" class="text-white" data-bs-toggle="modal" data-bs-target="#modal_admin"
                    style="text-decoration: none">Sistem</a>
                Informasi Inventaris Depo</h1>
            <p class="">Cek Persediaan <span class="typed"
                    data-typed-items="Bahan Cair, Bahan Padat, Alat"></span></p>

            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group me-2" role="group" aria-label="First group">
                    <a class="btn btn-lg btn-warning  d-flex justify-content-center"
                        style="font-size: 1.5rem; padding: 1rem 2rem; align-self: center;" data-bs-toggle="modal"
                        data-bs-target="#modal_biodata" role="button" data-aos="fade-left"><b><i
                                class="bi bi-journal-richtext"></i> Logbook</b></a>
                </div>
                {{-- <div class="btn-group" role="group" aria-label="Third group">
                    <a class="btn btn-lg btn-primary  d-flex justify-content-center"
                        style="font-size: 1.5rem; padding: 1rem 2rem; align-self: center;" data-bs-toggle="modal"
                        data-bs-target="#modal_biodata" role="button" data-aos="fade-left"><b>Pengembalian</b></a>
                </div> --}}
            </div>



        </div>

    </section>

    @include('modals.modal_biodata')
    @include('modals.modal_admin')

    @include('partials.scripts')









</body>

</html>
