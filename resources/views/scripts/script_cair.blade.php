<script>
    $('#form-updateCair{{ $cair->id }}').on('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        Swal.fire({
            title: "Tersimpan!",
            text: "Sukses",
            icon: "success",
            showConfirmButton: false,
            timer: 800, // Close the alert after 1.5 seconds
        }).then(() => {
            $(this).unbind('submit').submit();
        });
    });

    $('#destroyCair{{ $cair->id }}').on('click', function(event) {
        event.preventDefault();

        var href = $(this).attr('href');

        Swal.fire({
            title: "Hapus {{ $cair->nama }}?",
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
