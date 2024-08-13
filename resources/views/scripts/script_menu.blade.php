<script>
    // ############ Simpan Cari Data  ################
    $('.dt-search input[type="search"]').val('{{ $cari }}');
    $('.dt-search input[type="search"]').trigger('input');

    $('.dt-search input[type="search"]').on('input', function() {
        inputValue = $(this).val();
    });

    $('.modal').on('shown.bs.modal', function() {
        $(this).find('#cari').val(inputValue);
    });

    $(document).on('click', '.navbar-nav .nav-link', function() {
        $.ajax({
            url: "{{ route('purge-cari') }}",
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            }
        });
    });
    // 


    $('#tabel_history').DataTable({
        language: {
            "lengthMenu": "Tampilkan _MENU_ baris per halaman",
            "info": "Menampilkan _START_ ke _END_ dari _TOTAL_ baris",
            "search": "Cari:",
        },
        "lengthMenu": [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "Semua"]
        ],
        columnDefs: [{
            targets: 0,
            orderData: [0],
            orderable: false,
            createdCell: function(td, cellData, rowData, row, col) {
                $(td).attr('data-order', rowData[0]);
            }
        }],
        order: [
            [0, 'desc']
        ]
    });

    var rekap = $('#tabel_rekap').DataTable({
        dom: 'B<"row mb-2"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>><"row mb-2"<"col-sm-12">><"row mb-2"<"col-sm-12"t>><"row mb-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6">>',
        language: {
            "lengthMenu": "Tampilkan _MENU_ baris per halaman",
            "search": "Cari:",
            "info": "Menampilkan _START_ ke _END_ dari _TOTAL_ baris",
        },
        buttons: [{
            extend: 'excelHtml5',
            text: '<i class="bi bi-filetype-xlsx"></i> Excel',
            title: 'Rekap Data',
            className: 'btn btn-sm btn-warning mb-2',
            exportOptions: {
                columns: [0, 1, 2, 3, 4, 5]
            }
        }],
        "lengthMenu": [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "Semua"]
        ],
    });

    $('#filter_bulan').on('change', function() {
        var month = $(this).val();
        rekap.search(month).draw();
    });

    $('#input_bahan, #import_bahan').on('change', function() {
        $('#form_import').toggle('fast');
        $('#form_submit').toggle('fast');
    });
    $('#input_kerusakan, #import_kerusakan').on('change', function() {
        $('#form_import2').toggle('fast');
        $('#form_submit2').toggle('fast');
    });

    $("#jenis").change(function() {
        var jenis = $(this).val();
        if (jenis == "Cair") {
            $("#ml").removeClass("d-none");
            $("#gr, #pcs").addClass("d-none");
        } else if (jenis == "Padat") {
            $("#gr").removeClass("d-none");
            $("#ml, #pcs").addClass("d-none");
        } else {
            $("#pcs").removeClass("d-none");
            $("#ml, #gr").addClass("d-none");
        }
    });


    function submitBahan() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        let token = $("meta[name='_token']").attr("content");
        let nama = $("#nama").val();
        let jenis = $('select[name=jenis] option').filter(':selected').val()
        let stok = $("#stok").val();
        let lokasi = $('select[name=lokasi] option').filter(':selected').val()
        data = {
            _token: token,
            nama: nama,
            jenis: jenis,
            stok: stok,
            lokasi: lokasi
        };

        $.ajax({
            url: "{{ route('store-bahan') }}",
            method: 'post',
            data: data,
            success: function(data) {
                // alert('berhasil');
                $('#modal_bahan').modal('hide');
                location.reload();

            },
            error: function(data) {
                alert('gagal');
            },
        });

    }

    function importBahan() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            enctype: 'multipart/form-data'
        });


        let token = $("meta[name='_token']").attr("content");
        let excel = $("#import_excel").val();

        data = {
            _token: token,
            excel: excel,
        };

        $.ajax({
            url: "{{ route('import-bahan') }}",
            method: 'post',
            data: data,
            success: function(data) {
                // alert('berhasil');
                $('#modal_bahan').modal('hide');
                location.reload();

            },
            error: function(data) {
                alert('gagal');
            },
        });

    }
</script>
