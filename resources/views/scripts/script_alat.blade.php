<script>
    // function hapus() {
    $("#swal").on("click", function() {

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
                Swal.fire({
                    title: "Terhapus!",
                    text: "Data berhasil dihapus.",
                    icon: "success",
                    showConfirmButton: false,
                });
                // Perform the deletion or redirect here
            }
        });
    });
    // }
</script>
