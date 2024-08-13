<script>
    $('#cair').DataTable({
        dom: 'B<"row mb-2"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>><"row mb-2"<"col-sm-12">><"row mb-2"<"col-sm-12"t>><"row mb-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6">>',
        language: {
            "lengthMenu": "Tampilkan _MENU_ baris per halaman",
            "info": "Menampilkan _START_ ke _END_ dari _TOTAL_ baris",
            "search": "Cari:",
        },
        buttons: [{
            text: '+ Tambah',
            title: 'Tambah',
            className: 'btn btn-sm btn-danger mb-2',
            action: function(e, dt, node, config) {
                $('#modal_bahan').modal('show');
            }
        }],
        "lengthMenu": [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "Semua"]
        ],
    });

    $('#padat').DataTable({
        dom: 'B<"row mb-2"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>><"row mb-2"<"col-sm-12">><"row mb-2"<"col-sm-12"t>><"row mb-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6">>',
        language: {
            "lengthMenu": "Tampilkan _MENU_ baris per halaman",
            "info": "Menampilkan _START_ ke _END_ dari _TOTAL_ baris",
            "search": "Cari:",
        },
        buttons: [{
            text: '+ Tambah',
            title: 'Tambah',
            className: 'btn btn-sm btn-danger mb-2',
            action: function(e, dt, node, config) {
                $('#modal_bahan').modal('show');
            }
        }],
        "lengthMenu": [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "Semua"]
        ],
    });

    $('#alat').DataTable({
        dom: 'B<"row mb-2"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>><"row mb-2"<"col-sm-12">><"row mb-2"<"col-sm-12"t>><"row mb-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6">>',
        language: {
            "lengthMenu": "Tampilkan _MENU_ baris per halaman",
            "info": "Menampilkan _START_ ke _END_ dari _TOTAL_ baris",
            "search": "Cari:",
        },
        buttons: [{
            text: '+ Tambah',
            title: 'Tambah',
            className: 'btn btn-sm btn-danger mb-2',
            action: function(e, dt, node, config) {
                $('#modal_bahan').modal('show');
            }
        }],
        "lengthMenu": [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "Semua"]
        ],
    });

    $('#kerusakan').DataTable({
        dom: 'B<"row mb-2"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>><"row mb-2"<"col-sm-12">><"row mb-2"<"col-sm-12"t>><"row mb-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6">>',
        language: {
            "lengthMenu": "Tampilkan _MENU_ baris per halaman",
            "search": "Cari:",
            "info": "Menampilkan _START_ ke _END_ dari _TOTAL_ baris",
        },
        buttons: [{
            text: '+ Tambah',
            title: 'Tambah',
            className: 'btn btn-sm btn-danger mb-2',
            action: function(e, dt, node, config) {
                $('#modal_kerusakan').modal('show');
            }
        }],
        "lengthMenu": [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "Semua"]
        ],
    });
    $('#table_satuan').DataTable({
        dom: 'B<"row mb-2"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>><"row mb-2"<"col-sm-12">><"row mb-2"<"col-sm-12"t>><"row mb-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6">>',
        buttons: [{
            text: '+ Tambah',
            title: 'Tambah',
            className: 'btn btn-sm btn-danger',
            action: function(e, dt, node, config) {
                $('#add_satuan').modal('show');
            }
        }],
        searching: false,
        lengthChange: false,
        info: false
    });
    $('#table_lokasi').DataTable({
        dom: 'B<"row mb-2"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>><"row mb-2"<"col-sm-12">><"row mb-2"<"col-sm-12"t>><"row mb-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6">>',
        buttons: [{
            text: '+ Tambah',
            title: 'Tambah',
            className: 'btn btn-sm btn-danger',
            action: function(e, dt, node, config) {
                $('#add_lokasi').modal('show');
            }
        }],
        searching: false,
        lengthChange: false,
        info: false
    });

    $('#table_laboratorium').DataTable({
        dom: 'B<"row mb-2"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>><"row mb-2"<"col-sm-12">><"row mb-2"<"col-sm-12"t>><"row mb-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6">>',
        buttons: [{
            text: '+ Tambah',
            title: 'Tambah',
            className: 'btn btn-sm btn-danger',
            action: function(e, dt, node, config) {
                $('#add_laboratorium').modal('show');
            }
        }],
        searching: false,
        lengthChange: false,
        info: false
    });
</script>
