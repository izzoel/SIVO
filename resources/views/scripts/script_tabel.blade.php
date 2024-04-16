<script>
    // function tabelCair() {

    //     $('#cair').DataTable({
    //         language: {
    //             "lengthMenu": "Tampilkan _MENU_ baris per halaman",
    //             "info": "Menampilkan _START_ ke _END_ dari _TOTAL_ baris",
    //             "search": "Cari:",
    //         },
    //         "lengthMenu": [
    //             [10, 25, 50, 100, -1],
    //             [10, 25, 50, 100, "Semua"]
    //         ],
    //     });
    // }

    // function tabelPadat() {
    //     $('#padat').DataTable({
    //         language: {
    //             "lengthMenu": "Tampilkan _MENU_ baris per halaman",
    //             "info": "Menampilkan _START_ ke _END_ dari _TOTAL_ baris",
    //             "search": "Cari:",
    //         },
    //         "lengthMenu": [
    //             [10, 25, 50, 100, -1],
    //             [10, 25, 50, 100, "Semua"]
    //         ],
    //     });
    // }

    // function tabelAlat() {
    //     $('#alat').DataTable({
    //         language: {
    //             "lengthMenu": "Tampilkan _MENU_ baris per halaman",
    //             "info": "Menampilkan _START_ ke _END_ dari _TOTAL_ baris",
    //             "search": "Cari:",
    //         },
    //         "lengthMenu": [
    //             [10, 25, 50, 100, -1],
    //             [10, 25, 50, 100, "Semua"]
    //         ],
    //     });
    // }

    // function tabelHistory() {
    //     $('#tabel_history').DataTable({
    //         language: {
    //             "lengthMenu": "Tampilkan _MENU_ baris per halaman",
    //             "info": "Menampilkan _START_ ke _END_ dari _TOTAL_ baris",
    //             "search": "Cari:",
    //         },
    //         "lengthMenu": [
    //             [10, 25, 50, 100, -1],
    //             [10, 25, 50, 100, "Semua"]
    //         ],
    //         columnDefs: [{
    //             targets: 0,
    //             orderData: [0],
    //             orderable: false,
    //             createdCell: function(td, cellData, rowData, row, col) {
    //                 $(td).attr('data-order', rowData[0]);
    //             }
    //         }],
    //         order: [
    //             [0, 'desc']
    //         ]
    //     });
    // }

    // function tabelRekap() {
    //     var rekap = $('#tabel_rekap').DataTable({
    //         dom: 'B<"row mb-2"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>><"row mb-2"<"col-sm-12">><"row mb-2"<"col-sm-12"t>><"row mb-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6">>',
    //         language: {
    //             "lengthMenu": "Tampilkan _MENU_ baris per halaman",
    //             "search": "Cari:",
    //             "info": "Menampilkan _START_ ke _END_ dari _TOTAL_ baris",
    //         },
    //         buttons: [{
    //             extend: 'excelHtml5',
    //             text: '<i class="bi bi-filetype-xlsx"></i> Excel',
    //             title: 'Rekap Data',
    //             className: 'btn btn-sm btn-warning mb-2',
    //             exportOptions: {
    //                 columns: [0, 1, 2, 3, 4, 5]
    //             }
    //         }],
    //         "lengthMenu": [
    //             [10, 25, 50, 100, -1],
    //             [10, 25, 50, 100, "Semua"]
    //         ],
    //     });

    //     $('#filter_bulan').on('change', function() {
    //         var month = $(this).val();
    //         rekap.search(month).draw();
    //     });

    // }
</script>
