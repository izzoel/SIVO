<script>
    $(document).ready(function() {
        tabelCair();
        tabelPadat();
        tabelAlat();
        tabelRekap();

        $('#nav-' + "{{ session('tab') }}".toLowerCase() + '-tab').trigger('click');


        $('#data_mahasiswa').select2({
            dropdownParent: $("#modal_biodata"),
            theme: 'bootstrap-5',
            placeholder: "-- Cari Mahasiswa --"
        });
        $('#keperluan').select2({
            dropdownParent: $("#modal_biodata"),
            theme: 'bootstrap-5',
            placeholder: "-- Pilih Keperluan --",
            minimumResultsForSearch: Infinity // Disable the search box
        });


        modalBiodata();
    });
</script>
