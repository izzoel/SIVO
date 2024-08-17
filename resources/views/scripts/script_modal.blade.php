<script>
    $(document).ready(function() {
        $(document).on('click', '.ambilModal', function() {
            var id = $(this).data('id');
            var segment = "{{ route('show-bahan', request()->segment(2)) }}";

            $.ajax({
                url: segment,
                type: 'GET',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(data) {
                    if (data.nama) {
                        $('#labelTakeNama').text(data.nama);
                        $('#labelTakeStok').text(data.stok);
                        $('#labelTakeLokasi').text(data.lokasi);
                        $('#labelTakeSatuan').text(data.satuan);

                        $("#submit-form").submit(function(event) {
                            event.preventDefault();
                            let route = "{{ route('take') }}";
                            let token = "{{ csrf_token() }}";
                            let id = data.id;
                            let ambil = $('#inputTake').val();
                            let jenis = "{{ request()->segment(2) }}";
                            data = {
                                _token: token,
                                id: id,
                                ambil: ambil,
                                jenis: jenis,
                            }
                            $.ajax({
                                url: route,
                                type: 'POST',
                                data: data,
                                success: function(postData) {
                                    Swal.fire({
                                        title: "Tersimpan!",
                                        text: "Sukses",
                                        icon: "success",
                                        showConfirmButton: false,
                                        timer: 800
                                    }).then((result) => {
                                        location.reload(true);
                                    })
                                },
                                error: function(xhr, status, error) {
                                    console.error(xhr.responseText);
                                    $('#modalTake .modal-body').html(
                                        '<p>Error loading content</p>'
                                    );
                                    $('#modalTake').modal('show');
                                }
                            });

                        });

                    } else {
                        $('#labelTakeNama').text('No Name Available');
                    }

                    $('#modalTake').modal('show');
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    $('#takeModal .modal-body').html('<p>Error loading content</p>');
                    $('#takeModal').modal('show');
                }
            });
        });

        $(document).on('click', '.setorModal', function() {
            var id = $(this).data('id');
            var segment = "{{ route('show-bahan', request()->segment(2)) }}";

            $.ajax({
                url: segment,
                type: 'GET',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(data) {
                    if (data.nama) {
                        $('#labelPutNama').text(data.nama);
                        $('#labelPutStok').text(data.stok);
                        $('#labelPutLokasi').text(data.lokasi);
                        $('#labelPutSatuan').text(data.satuan);

                        $("#submit-put").submit(function(event) {
                            event.preventDefault();
                            let route = "{{ route('put') }}";
                            let token = "{{ csrf_token() }}";
                            let id = data.id;
                            let setor = $('#inputPut').val();
                            let jenis = "{{ request()->segment(2) }}";
                            data = {
                                _token: token,
                                id: id,
                                setor: setor,
                                jenis: jenis
                            }

                            $.ajax({
                                url: route,
                                type: 'POST',
                                data: data,
                                success: function(postData) {
                                    Swal.fire({
                                        title: "Tersimpan!",
                                        text: "Sukses",
                                        icon: "success",
                                        showConfirmButton: false,
                                        timer: 800
                                    }).then((result) => {
                                        location.reload(true);
                                    })
                                },
                                error: function(xhr, status, error) {
                                    console.error(xhr.responseText);
                                    $('#modalPut .modal-body').html(
                                        '<p>Error loading content</p>'
                                    );
                                    $('#modalPut').modal('show');
                                }
                            });

                        });

                    } else {
                        $('#labelPutNama').text('No Name Available');
                    }

                    $('#modalPut').modal('show');
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    $('#modalPut .modal-body').html('<p>Error loading content</p>');
                    $('#modalPut').modal('show');
                }
            });
        });

        $(document).on('click', '.settingModal', function() {
            var id = $(this).data('id');
            dataSettingId = $(this).data('id');
            let segment = "{{ route('modal-setting', request()->segment(2)) }}";
            $.ajax({
                url: segment,
                type: 'GET',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(data) {
                    if (data.bahan.nama) {
                        $('#labelSettingSatuan').empty();
                        $('#labelSettingLokasi').empty();

                        $('#labelSettingNama').val(data.bahan.nama);
                        $('#labelSettingStok').val(data.bahan.stok);

                        $('#labelSettingSatuan').append($('<option>', {
                            value: data.bahan.satuan,
                            text: data.bahan.satuan,
                            selected: true
                        }));
                        data.satuan.forEach(function(satuan) {
                            if (satuan.satuan !== data.bahan.satuan) {
                                $('#labelSettingSatuan').append($('<option>', {
                                    value: satuan.satuan,
                                    text: satuan.satuan
                                }));
                            }
                        });

                        $('#labelSettingLokasi').append($('<option>', {
                            value: data.bahan.lokasi,
                            text: data.bahan.lokasi,
                            selected: true
                        }));
                        data.lokasi.forEach(function(lokasi) {
                            if (lokasi.lokasi !== data.bahan.lokasi) {
                                $('#labelSettingLokasi').append($('<option>', {
                                    value: lokasi.lokasi,
                                    text: lokasi.lokasi
                                }));
                            }
                        });

                        $("#submit-setting").submit(function(event) {
                            event.preventDefault();

                            let route = "{{ route('set') }}";
                            let token = "{{ csrf_token() }}";
                            let id = data.bahan.id;
                            let namaEdit = $('#labelSettingNama').val();
                            let stokEdit = $('#labelSettingStok').val();
                            let satuanEdit = $('#labelSettingSatuan').val();
                            let lokasiEdit = $('#labelSettingLokasi').val();
                            let jenis = "{{ request()->segment(2) }}";

                            data = {
                                _token: token,
                                id: id,
                                namaEdit: namaEdit,
                                stokEdit: stokEdit,
                                satuanEdit: satuanEdit,
                                lokasiEdit: lokasiEdit,
                                jenis: jenis
                            }

                            $.ajax({
                                url: route,
                                type: 'POST',
                                data: data,
                                success: function(postData) {
                                    Swal.fire({
                                        title: "Tersimpan!",
                                        text: "Sukses",
                                        icon: "success",
                                        showConfirmButton: false,
                                        timer: 800
                                    }).then((result) => {
                                        location.reload(true);
                                    })
                                },
                                error: function(xhr, status, error) {
                                    console.error(xhr.responseText);
                                    $('#modalSetting .modal-body').html(
                                        '<p>Error loading content</p>'
                                    );
                                    $('#modalSetting').modal('show');
                                }
                            });


                        });



                    } else {
                        $('#labelSettingNama').text('No Name Available');
                    }
                    $('#modalSetting').modal('show');
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    $('#modalSetting .modal-body').html('<p>Error loading content</p>');
                    $('#modalSetting').modal('show');
                }
            });
        });

        $(document).on('click', '.settingMenuModal', function() {
            var id = $(this).data('id');
            var set = '{{ request()->segment(3) }}';

            let segment = "{{ route('get-setting', request()->segment(3)) }}";
            $.ajax({
                url: segment,
                type: 'GET',
                data: {
                    id: id,
                    set: set
                },
                dataType: 'json',
                success: function(data) {
                    if (set == 'satuan') {
                        $('#inputEdit').val(data.satuan);
                    } else if (set == 'lokasi') {
                        $('#inputEdit').val(data.lokasi);
                    } else if (set == 'laboratorium') {
                        $('#inputEdit').val(data.laboratorium);
                    }

                    $("#submit-menu-setting").submit(function(event) {
                        event.preventDefault();
                        let route = "{{ route('update-setting', request()->segment(3) ?? request()->segment(2)) }}";
                        let token = "{{ csrf_token() }}";
                        let edit = $('#inputEdit').val();

                        data = {
                            _token: token,
                            id: id,
                            set: set,
                            edit: edit
                        }

                        $.ajax({
                            url: route,
                            type: 'POST',
                            data: data,
                            success: function(postData) {
                                Swal.fire({
                                    title: "Tersimpan!",
                                    text: "Sukses",
                                    icon: "success",
                                    showConfirmButton: false,
                                    timer: 800
                                }).then((result) => {
                                    location.reload(true);
                                })
                            },
                            error: function(xhr, status, error) {
                                console.error(xhr.responseText);
                                $('#modalMenuSetting .modal-body').html('<p>Error loading content</p>');
                                $('#modalMenuSetting').modal('show');
                            }
                        })
                    });

                    $('#modalMenuSetting').modal('show');
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    $('#modalMenuSetting .modal-body').html('<p>Error loading content</p>');
                    $('#modalMenuSetting').modal('show');
                }
            });
        });


        cek = "{{ request()->segment(2) }}";
        if (cek === 'setting') {
            $(document).on("click", "#destroyButton", function(event) {
                event.preventDefault();
                let setId = $(this).attr('data-id');
                let jenis = "{{ request()->segment(3) }}";
                Swal.fire({
                    title: "Hapus Data?",
                    text: "Tidak dapat dikembalikan!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yap, hapus!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('destroy') }}",
                            type: 'POST',
                            data: {
                                _token: "{{ csrf_token() }}",
                                id: setId,
                                jenis: jenis
                            },
                            success: function(postData) {
                                Swal.fire({
                                    title: "Terhapus!",
                                    text: "Data berhasil dihapus.",
                                    icon: "success",
                                    showConfirmButton: false,
                                    timer: 800
                                }).then((result) => {
                                    localStorage.removeItem('datatableSearchValue');
                                    location.reload(true);
                                });
                            },
                        })
                    }
                });
            });
        } else if (cek !== 'kerusakan') {
            $("#destroyButton").on("click", function(event) {
                event.preventDefault();
                Swal.fire({
                    title: "Hapus Data?",
                    text: "Tidak dapat dikembalikan!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yap, hapus!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('destroy') }}",
                            type: 'POST',
                            data: {
                                _token: "{{ csrf_token() }}",
                                id: dataSettingId,
                                jenis: cek
                            },
                            success: function(postData) {
                                Swal.fire({
                                    title: "Terhapus!",
                                    text: "Data berhasil dihapus.",
                                    icon: "success",
                                    showConfirmButton: false,
                                    timer: 800
                                }).then((result) => {
                                    localStorage.removeItem('datatableSearchValue');
                                    location.reload(true);
                                });
                            },
                            error: function(xhr, status, error) {
                                console.error(xhr.responseText);
                                $('#modalSetting .modal-body').html(
                                    '<p>Error loading content</p>'
                                );
                                $('#modalSetting').modal('show');
                            }
                        })

                    }
                });
            });
        } else {
            $(document).on('click', '#destroyButton[data-id]', function() {
                event.preventDefault();
                var dataId = $(this).attr('data-id');
                let jenis = "{{ request()->segment(2) }}";
                Swal.fire({
                    title: "Hapus Data?",
                    text: "Tidak dapat dikembalikan!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yap, hapus!"
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            url: "{{ route('destroy') }}",
                            type: 'POST',
                            data: {
                                _token: "{{ csrf_token() }}",
                                id: dataId,
                                jenis: jenis
                            },
                            success: function(postData) {
                                Swal.fire({
                                    title: "Terhapus!",
                                    text: "Data berhasil dihapus.",
                                    icon: "success",
                                    showConfirmButton: false,
                                    timer: 800
                                }).then((result) => {
                                    localStorage.removeItem('datatableSearchValue');
                                    location.reload(true);
                                });
                            },
                            error: function(xhr, status, error) {
                                console.error(xhr.responseText);
                                $('#modalSetting .modal-body').html(
                                    '<p>Error loading content</p>'
                                );
                                $('#modalSetting').modal('show');
                            }
                        })

                    }
                });
            });
        }

    });
</script>
