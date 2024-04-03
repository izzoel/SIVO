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

    function peminjaman() {
        $.ajax({
            url: "{{ route('show-history') }}",
            type: 'GET',
            success: function(response) {
                const formattedDates = new Set();
                $('#list-history').empty();
                response.forEach(transaksi => {
                    const tanggalAmbil = new Date(transaksi.tanggal);
                    const options = {
                        year: 'numeric',
                        month: 'short',
                        day: 'numeric'
                    };
                    const formattedDate = tanggalAmbil.toLocaleDateString('id-ID', options);
                    const className = transaksi.keperluan === 'Praktikum' ? 'bg-primary' :
                        'bg-success';
                    if (!formattedDates.has(formattedDate)) {
                        formattedDates.add(formattedDate);
                        $('#list-history').append(
                            `<div class="col-auto"><div class="card-text text-secondary">${formattedDate}</div></div><div class="col"><hr></div><div class="col-auto"><span class="badge rounded-pill ${className}">${transaksi.keperluan}</span></div>`
                        );
                    }

                });
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }
</script>
