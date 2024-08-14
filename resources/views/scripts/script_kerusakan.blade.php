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

    $('#destroyKerusakan' + {{ $kerusakan->id }}).on('click', function(event) {
        event.preventDefault();

        var href = $(this).attr('href');

        Swal.fire({
            title: "Hapus Kerusakan?",
            text: "Tidak dapat dikembalikan!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yap, hapus!"
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Terhapus!",
                    text: "Data berhasil dihapus.",
                    icon: "success",
                    showConfirmButton: false,
                });
                window.location.href = href;
            }
        });
    });
</script>
