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

                    $.each(response, function(index, value) {
                        $('#data_mahasiswa').append('<option value="' + value.nim +
                            '">' + value
                            .nim + ' - ' + value.nama + '</option>');
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
    }
</script>
