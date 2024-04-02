  @auth
      <script>
          $('#cair').DataTable({
              dom: 'lBfrtip',

              buttons: [{
                  text: '+',
                  className: 'btn-sm btn-dark d-inline-block d-md-inline ms-2',
                  action: function(e, dt, node, config) {
                      $('#add').modal('show');
                  }
              }, {
                  extend: 'excel',
                  className: 'btn-sm btn-success d-inline-block d-md-inline ms-1',
                  autoFilter: true,
                  exportOptions: {
                      columns: ':not(:last-child)' // Exclude the last column (Aksi)
                  },
              }, ],
              responsive: true
          });
          $('#padat').DataTable({
              dom: 'lBfrtip',
              buttons: [{
                  text: '+',
                  className: 'btn-sm btn-dark d-inline-block d-md-inline ms-2',
                  action: function(e, dt, node, config) {
                      $('#add').modal('show');
                  }
              }, {
                  extend: 'excel',
                  className: 'btn-sm btn-success d-inline-block d-md-inline ms-1',
                  autoFilter: true,
                  exportOptions: {
                      columns: ':not(:last-child)' // Exclude the last column (Aksi)
                  },
              }, ],
              responsive: true
          });
          $('#alat').DataTable({
              dom: 'lBfrtip',
              buttons: [{
                  text: '+',
                  className: 'btn-sm btn-dark d-inline-block d-md-inline ms-2',
                  action: function(e, dt, node, config) {
                      $('#add').modal('show');
                  }
              }, {
                  extend: 'excel',
                  className: 'btn-sm btn-success d-inline-block d-md-inline ms-1',
                  autoFilter: true,
                  exportOptions: {
                      columns: ':not(:last-child)' // Exclude the last column (Aksi)
                  },
              }, ]
          });
      </script>
  @endauth

  @guest

      <script>
          $(document).ready(function() {

              tabelCair();
              tabelPadat();
              $('#nav-' + '{{ $tabValue }}'.toLowerCase() + '-tab').trigger('click');


              $('#alat').DataTable();
              peminjaman();


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

              $('#modal_biodata').on('shown.bs.modal', function() {
                  $.ajax({
                      url: "{{ route('show_mahasiswa') }}",
                      type: 'GET',
                      dataType: 'json',
                      success: function(response) {
                          $('#data_mahasiswa').empty();

                          $.each(response, function(index, value) {
                              $('#data_mahasiswa').append('<option value="' + value.nim +
                                  '">' + value
                                  .nim + ' - ' + value.nama + '</option>');
                          });
                          $('#data_mahasiswa').select2('destroy');
                          $('#data_mahasiswa').select2({
                              dropdownParent: $("#modal_biodata"),
                              theme: 'bootstrap-5',
                              placeholder: "-- Cari Mahasiswa --"
                          });
                      },
                      error: function(xhr, status, error) {
                          console.error(error);
                      }
                  });
              });
          });
      </script>

  @endguest
