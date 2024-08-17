<script>
    $('#storeKerusakan').on('submit', function(event) {
        event.preventDefault();
        Swal.fire({
            title: "Tersimpan!",
            text: "Sukses",
            icon: "success",
            showConfirmButton: false,
        })
        $(this).unbind('submit').submit();
    });

    $('#form-updateKerusakan' + {{ $kerusakan->id }}).on('submit', function(event) {
        event.preventDefault();
        Swal.fire({
            title: "Tersimpan!",
            text: "Sukses",
            icon: "success",
            showConfirmButton: false,
        })
        $(this).unbind('submit').submit();
    });
</script>
