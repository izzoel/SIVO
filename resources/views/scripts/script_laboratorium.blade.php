<script>
    $('#storeLaboratorium').on('click', function(event) {
        event.preventDefault();

        Swal.fire({
            title: "Tersimpan!",
            text: "Sukses",
            icon: "success",
            showConfirmButton: false,
        })
        $("#form-storeLaboratorium").submit();
    });

    $('#updateLaboratorium' + {{ $laboratorium->id }}).on('click', function(event) {
        event.preventDefault();

        Swal.fire({
            title: "Tersimpan!",
            text: "Sukses",
            icon: "success",
            showConfirmButton: false,
        })
        $("#form-updateLaboratorium" + {{ $laboratorium->id }}).submit();
    });

    $('#destroyLaboratorium' + {{ $laboratorium->id }}).on('click', function(event) {
        event.preventDefault();

        var href = $(this).attr('href');

        Swal.fire({
            title: "Hapus Laboratorium?",
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
                    text: "Sukses",
                    icon: "success",
                    showConfirmButton: false,
                });
                window.location.href = href;
            }
        });
    });
</script>
