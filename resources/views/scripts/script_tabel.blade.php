<script>
    function tabelCair() {
        $.ajax({
            url: "{{ route('show-cair') }}",
            method: "GET",
            contentType: 'application/json'
        }).done(function(data) {
            $('#cair').DataTable({
                language: {
                    "lengthMenu": "Tampilkan _MENU_ baris per halaman",
                    "info": "Menampilkan _START_ ke _END_ dari _TOTAL_ baris",
                    "search": "Cari:",
                },
                "lengthMenu": [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "Semua"]
                ],
                data: data,
                columns: [{
                        data: "nama"
                    },
                    {
                        data: "stok"
                    },
                    {
                        data: "lokasi"
                    },
                    {
                        data: "aksi",
                        render: function(data, type, row, meta) {
                            var disabled = row.stok <= 0 ? 'disabled' : '';
                            return '<button type="button" class="btn btn-warning btn-sm button-cair me-3" ' +
                                'data-item-id="' + row.id + '" data-jenis="' + row.jenis +
                                '" data-bs-toggle="modal" data-bs-target="#take_cair' + row
                                .id + '" ' + disabled + '>' +
                                '<i class="bx bxs-donate-blood"></i> Ambil' + '</button>' +

                                '<button type="button" class="btn btn-success btn-sm button-cair" ' +
                                'data-item-id="' + row.id + '" data-jenis="' + row.jenis +
                                '" data-bs-toggle="modal" data-bs-target="#put_cair' + row
                                .id + '" >' +
                                '<i class="bx bxs-archive-in"></i> Setor' + '</button>';
                        },
                    },
                ]
            });
            $(".button-cair").click(function() {
                var itemId = $(this).data("item-id");
                var jenis = $(this).data("jenis");
                $('.take-angka').on('keyup', function() {
                    var jumlah = $(this).val();
                    $('input[name=ambil]').val(jumlah);
                    $('input[name=kembali]').val(0);
                });
                $('.put-angka').on('keyup', function() {
                    var jumlah = $(this).val();
                    $('input[name=ambil]').val(0);
                    $('input[name=kembali]').val(jumlah);
                });
                $('input[name="id_bahan"]').val(itemId);
                $('input[name="tab"]').val(jenis);
            });

        });
    }

    function tabelPadat() {
        $.ajax({
            url: "{{ route('show-padat') }}",
            method: "GET",
            contentType: 'application/json'
        }).done(function(data) {
            $('#padat').DataTable({
                language: {
                    "lengthMenu": "Tampilkan _MENU_ baris per halaman",
                    "info": "Menampilkan _START_ ke _END_ dari _TOTAL_ baris",
                    "search": "Cari:",
                },
                "lengthMenu": [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "Semua"]
                ],
                data: data,
                columns: [{
                        data: "nama"
                    },
                    {
                        data: "stok"
                    },
                    {
                        data: "lokasi"
                    },
                    {
                        data: "aksi",
                        render: function(data, type, row, meta) {
                            var disabled = row.stok <= 0 ? 'disabled' : '';
                            return '<button type="button" class="btn btn-warning btn-sm button-padat me-3" ' +
                                'data-item-id="' + row.id + '" data-jenis="' + row.jenis +
                                '" data-bs-toggle="modal" data-bs-target="#take_padat' + row
                                .id + '" ' + disabled + '>' +
                                '<i class="bx bxs-donate-blood"></i> Ambil' + '</button>' +

                                '<button type="button" class="btn btn-success btn-sm button-padat" ' +
                                'data-item-id="' + row.id + '" data-jenis="' + row.jenis +
                                '" data-bs-toggle="modal" data-bs-target="#put_padat' + row
                                .id + '" >' +
                                '<i class="bx bxs-archive-in"></i> Setor' + '</button>';
                        },
                    },
                ]
            });
            $(".button-padat").click(function() {
                var itemId = $(this).data("item-id");
                var jenis = $(this).data("jenis");
                $('.take-angka').on('keyup', function() {
                    var jumlah = $(this).val();
                    $('input[name=ambil]').val(jumlah);
                    $('input[name=kembali]').val(0);
                });
                $('.put-angka').on('keyup', function() {
                    var jumlah = $(this).val();
                    $('input[name=ambil]').val(0);
                    $('input[name=kembali]').val(jumlah);
                });
                $('input[name="id_bahan"]').val(itemId);
                $('input[name="tab"]').val(jenis);
            });
        });
    }

    function tabelAlat() {
        $.ajax({
            url: "{{ route('show-alat') }}",
            method: "GET",
            contentType: 'application/json'
        }).done(function(data) {
            $('#alat').DataTable({
                language: {
                    "lengthMenu": "Tampilkan _MENU_ baris per halaman",
                    "info": "Menampilkan _START_ ke _END_ dari _TOTAL_ baris",
                    "search": "Cari:",
                },
                "lengthMenu": [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "Semua"]
                ],
                data: data,
                columns: [{
                        data: "nama"
                    },
                    {
                        data: "stok"
                    },
                    {
                        data: "lokasi"
                    },
                    {
                        data: "aksi",
                        render: function(data, type, row, meta) {
                            var disabled = row.stok <= 0 ? 'disabled' : '';
                            return '<button type="button" class="btn btn-warning btn-sm button-alat me-3" ' +
                                'data-item-id="' + row.id + '" data-jenis="' + row.jenis +
                                '" data-bs-toggle="modal" data-bs-target="#take_alat' + row
                                .id + '" ' + disabled + '>' +
                                '<i class="bx bxs-donate-blood"></i> Ambil' + '</button>' +

                                '<button type="button" class="btn btn-success btn-sm button-alat" ' +
                                'data-item-id="' + row.id + '" data-jenis="' + row.jenis +
                                '" data-bs-toggle="modal" data-bs-target="#put_alat' + row
                                .id + '" >' +
                                '<i class="bx bxs-archive-in"></i> Setor' + '</button>';
                        },
                    },
                ]
            });
            $(".button-alat").click(function() {
                var itemId = $(this).data("item-id");
                var jenis = $(this).data("jenis");
                $('.take-angka').on('keyup', function() {
                    var jumlah = $(this).val();
                    $('input[name=ambil]').val(jumlah);
                    $('input[name=kembali]').val(0);
                });
                $('.put-angka').on('keyup', function() {
                    var jumlah = $(this).val();
                    $('input[name=ambil]').val(0);
                    $('input[name=kembali]').val(jumlah);
                });
                $('input[name="id_bahan"]').val(itemId);
                $('input[name="tab"]').val(jenis);
            });
        });
    }

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

    function tabelRekap() {
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

    }
</script>
