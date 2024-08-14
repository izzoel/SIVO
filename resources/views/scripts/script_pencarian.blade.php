<script>
    // ############ Simpan Cari Data ################
    $('.dt-search input[type="search"]').val('{{ $cari }}');
    $('.dt-search input[type="search"]').trigger('input');

    $('.dt-search input[type="search"]').on('input', function() {
        inputValue = $(this).val();
        console.log(inputValue);

    });

    $('.modal').on('shown.bs.modal', function() {
        // $(this).find('#cari').val(inputValue);
        console.log('modal');
    });

    $('.navbar-nav .nav-link').on('click', function() {
        $.ajax({
            url: "{{ route('purge-cari') }}",
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            }
        });
    });
    //
</script>
