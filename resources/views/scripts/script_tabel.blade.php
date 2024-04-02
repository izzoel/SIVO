<script>
    function tabelCair() {
        $.ajax({
            url: "{{ route('show-cair') }}",
            method: "GET",
            contentType: 'application/json'
        }).done(function(data) {
            $('#cair').DataTable({
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
                                '" data-bs-toggle="modal" data-bs-target="#cair' + row
                                .id + '" ' + disabled + '>' +
                                '<i class="bx bxs-donate-blood"></i>' + '</button>' +

                                '<button type="button" class="btn btn-success btn-sm" ' +
                                'data-item-id="' + row.id + '" data-jenis="' + row.jenis +
                                '" data-bs-toggle="modal" data-bs-target="#restok_cair' + row
                                .id + '" >' +
                                '<i class="bx bxs-archive-in"></i>' + '</button>';
                        },
                    },
                ]
            });
            $(".button-cair").click(function() {
                var itemId = $(this).data("item-id");
                var jenis = $(this).data("jenis");
                $('.angka').on('keyup', function() {
                    var ambil = $(this).val();
                    $('input[name=ambil]').val(ambil);
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
                            return '<button type="button" class="btn btn-warning btn-sm button-padat" ' +
                                'data-item-id="' + row.id + '" data-jenis="' + row.jenis +
                                '" data-bs-toggle="modal" data-bs-target="#padat' + row
                                .id + '" ' + disabled + '>' +
                                '<i class="bx bxs-donate-blood"></i>' + '</button>';
                        },
                    },
                ]
            });
            $(".button-padat").click(function() {
                var itemId = $(this).data("item-id");
                var jenis = $(this).data("jenis");
                $('.angka').on('keyup', function() {
                    var ambil = $(this).val();
                    $('input[name=ambil]').val(ambil);
                });
                $('input[name="id_bahan"]').val(itemId);
                $('input[name="tab"]').val(jenis);
            });
        });
    }



    $('#tabel').DataTable();
    $('#tabel_history').DataTable();
</script>
