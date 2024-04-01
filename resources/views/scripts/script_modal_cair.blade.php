<script>
    function submitForm() {
        $.ajax({
            url: $('.takeForm').attr('action'),
            type: 'POST',
            data: $('.takeForm').serialize(),
            success: function(response) {
                peminjaman();
                $('.modal-cair').modal('hide');
                $('.modal-backdrop').remove();
            },
            error: function(xhr) {
                console.error(xhr.responseText);
            }
        });
    }
</script>
