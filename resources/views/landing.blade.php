<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SIVO | Sistem Informasi Inventaris Depo</title>


    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/img/site.webmanifest') }} ">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/aos/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}">

    <!-- Template Main CSS File -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/datatables.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />

    <!-- Styles -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <!-- Or for RTL support -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />

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
            </div>



        </div>

    </section>

    @include('modals.modal_biodata')
    @include('modals.modal_admin')

    <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/typed.js/typed.umd.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="{{ asset('assets/js/dataTables.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>

    <script>
        $('#data_mahasiswa').select2({
            dropdownParent: $("#modal_biodata"),
            theme: 'bootstrap-5',
            placeholder: "-- Cari Mahasiswa --"
        });
        $('#keperluan').select2({
            dropdownParent: $("#modal_biodata"),
            theme: 'bootstrap-5',
            placeholder: "-- Pilih Keperluan --",
            minimumResultsForSearch: Infinity // Disable the search box
        });

        $('#modal_biodata').on('shown.bs.modal', function() {
            $.ajax({
                url: "{{ route('show_mahasiswa') }}",
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    $('#data_mahasiswa').empty();
                    var filteredData = response.filter(function(item) {
                        return item.nama.toUpperCase().indexOf('ADMIN') === -1;
                    });
                    $.each(filteredData, function(index, value) {
                        $('#data_mahasiswa').append('<option value="' + value.nim +
                            '">' + value.nim + ' - ' + value.nama + '</option>');
                    });

                    $('#data_mahasiswa').select2('destroy');
                    $('#data_mahasiswa').select2({
                        dropdownParent: $("#modal_biodata"),
                        theme: 'bootstrap-5',
                        placeholder: "-- Cari Mahasiswa --"
                    });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    </script>

</body>

</html>
