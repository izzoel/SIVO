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

              $.ajax({
                  url: "{{ route('show-cair') }}",
                  method: "GET",
                  contentType: 'application/json'
              }).done(function(data) {
                  $('#cair').DataTable({
                      data: data,
                      columns: [{
                              data: "nama"
                          },
                          {
                              data: "stok"
                          },
                          {
                              data: "lokasi"
                          },
                          {
                              data: "aksi",
                              render: function(data, type, row, meta) {
                                  var disabled = row.stok <= 0 ? 'disabled' : '';
                                  return '<button type="button" class="btn btn-warning btn-sm button-cair" ' +
                                      'data-item-id="' + row.id +
                                      '" data-bs-toggle="modal" data-bs-target="#cair' + row
                                      .id + '" ' + disabled + '>' +
                                      '<i class="bx bxs-donate-blood"></i>' + '</button>';
                              },
                          },
                      ]
                  });
                  $(".button-cair").click(function() {
                      var itemId = $(this).data("item-id");
                      $('.angka').on('keyup', function() {
                          var ambil = $(this).val();
                          $('input[name=ambil]').val(ambil);
                      });
                      $('input[name="id_bahan"]').val(itemId);
                  });
                  $('.modal').on('hidden.bs.modal', function(e) {
                      location.reload();
                  });
              });



              $('#padat').DataTable();
              $('#alat').DataTable();

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

              peminjaman();

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

  <script>
      function peminjaman() {
          $.ajax({
              url: "{{ route('show-transaksi') }}",
              type: 'GET',
              success: function(response) {
                  $('#transaksi').empty();
                  $.each(response, function(index, transaksi) {
                      const tanggalAmbil = new Date(transaksi.tanggal_ambil);
                      const options = {
                          year: 'numeric',
                          month: 'short',
                          day: 'numeric'
                      };
                      const formattedDate = tanggalAmbil.toLocaleDateString('id-ID', options);
                      $('#transaksi').append(
                          `<div class="col-auto"><div class="card-text text-secondary">${formattedDate}</div></div><div class="col"><hr></div><div class="col-auto"><span class="badge rounded-pill bg-primary">${transaksi.keperluan}</span></div>`
                      );
                  });
              },
              error: function(xhr, status, error) {
                  // Tangani kesalahan jika terjadi
                  console.error(xhr.responseText);
              }
          });
      }
  </script>
