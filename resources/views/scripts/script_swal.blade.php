<script>
    $('#deleteSatuan').on('click', function(event) {
        event.preventDefault(); // Prevent the default behavior (i.e., the link from being followed)

        var url = $(this).attr('href'); // Get the href of the delete button

        Swal.fire({
            title: 'Hapus artikel ?',
            icon: 'warning',
            html: `<a autofocus></a>`,
            showCancelButton: true,
            reverseButtons: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect to the delete route
                window.location.href = url;
            }
        });
    });
</script>
