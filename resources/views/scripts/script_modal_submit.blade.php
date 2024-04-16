<script>
    function submitForm() {

        $.ajax({
            url: $('.submit-form').attr('action'),
            type: 'POST',
            data: $('.submit-form').serialize(),
            success: function(response) {
                peminjaman();
                $('.modal-cair').modal('hide');
                $('.modal-padat').modal('hide');
                $('.modal-backdrop').remove();

                $('.modal').on('hidden.bs.modal', function(e) {
                    location.reload();
                });
            },
            error: function(xhr) {
                console.error(xhr.responseText);
            }
        });


    }

    function modalBiodata() {
        $('#modal_biodata').on('shown.bs.modal', function() {
            $.ajax({
                url: "{{ route('show_mahasiswa') }}",
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    $('#data_mahasiswa').empty();

                    // Filter out options where 'nama' contains 'ADMIN' (case insensitive)
                    var filteredData = response.filter(function(item) {
                        return item.nama.toUpperCase().indexOf('ADMIN') === -1;
                    });

                    // Append non-admin options to the select element
                    $.each(filteredData, function(index, value) {
                        $('#data_mahasiswa').append('<option value="' + value.nim +
                            '">' + value.nim + ' - ' + value.nama + '</option>');
                    });

                    // Reinitialize Select2
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

    }

    $('#input_bahan, #import_bahan').on('change', function() {
        if ($('#input_bahan').is(':checked')) {
            var html = '';
            // $('#nama').attr('name', 'nama');
            $('#import').hide('fast');
            $('#submit_import').hide('fast');
            $('#input').show('fast');

            html =
                '<div class="mb-3"><label for="nama" class="form-label">Nama Bahan</label><input type="text" class="form-control" id="nama"></div>';

            $('#input').append(html);
        } else {
            // $('#nama').attr('name', '');
            $('#import').show('fast');
            $('#submit_import').show('fast');
            $('#submit_bahan').hide('fast');
            $('#input').hide('fast');
            $('#input').html("");
        }
        var html = '';
        $('#input').append(html);
    });
</script>
