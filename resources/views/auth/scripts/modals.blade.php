  <script>
      $("#M_S_mahasiswa").on('show.bs.modal', function(e) {

          ["#S_nim", "#S_nama", "#S_tempat_lahir", "#S_alamat"].forEach(function(selector) {
              $(selector).on('keyup', function() {
                  this.value = this.value.toUpperCase();
              });
          });

      })

      $(document).on('click', '.U_B_mahasiswa', function() {
          let nim = $(this).data("nim").split('-').pop();

          $(".modalUpdate").attr("id", "M_U_mahasiswa-" + nim);
          $("#M_U_mahasiswa-" + nim).modal('show');
          $("#U_route").attr('action', "/data/mahasiswa/update/" + nim);

          $.get("/data/mahasiswa/show/" + nim, function(data) {
              if (data.kelamin == "L") {
                  var kelamin = "#U_l";
              } else {
                  var kelamin = "#U_p";
              }
              $("#U_nim").val(data.nim);
              $("#U_nama").val(data.nama);
              $("#U_tempat_lahir").val(data.tempat_lahir);
              $("#U_tanggal_lahir").val(data.tanggal_lahir);
              $(kelamin).val(data.kelamin).prop('checked', true);
              $("#U_prodi").val(data.prodi).prop('selected', true);
              $("#U_hp").val(data.no_hp);
              $("#U_alamat").val(data.alamat);
          });

          ["#U_nim", "#U_nama", "#U_tempat_lahir", "#U_alamat"].forEach(function(selector) {
              $(selector).on('keyup', function() {
                  this.value = this.value.toUpperCase();
              });
          });
      });

      $(document).on("click", ".D_B_mahasiswa", function() {
          let nim = $(this).data("nim");

          $(".modalDelete").attr("id", "M_D_mahasiswa-" + nim);
          $("#M_D_mahasiswa-" + nim).modal('show');
          $("#D_route").attr('action', "/data/mahasiswa/destroy/" + nim);
      })

      $(document).on('click', '.U_B_kerusakan', function() {
          let id = $(this).data("id").split('-').pop();

          $(".modalUpdate").attr("id", "M_U_kerusakan-" + id);
          $("#M_U_kerusakan-" + id).modal('show');
          $("#U_route").attr('action', "/data/kerusakan/update/" + id);

          $.get("/data/kerusakan/show/" + id, function(data) {
              $("#U_nama").val(data.nama);
              $("#U_lokasi").val(data.lokasi).prop('selected', true);
              $("#U_kondisi").val(data.kondisi);
              $("#U_status").val(data.status);
          });
      });

      $(document).on("click", ".D_B_kerusakan", function() {
          let id = $(this).data("id").split('-').pop();

          $(".modalDelete").attr("id", "M_D_kerusakan-" + id);
          $("#M_D_kerusakan-" + id).modal('show');
          $("#D_route").attr('action', "/data/kerusakan/destroy/" + id);
      })

      $("#M_S_alat").on('show.bs.modal', function(e) {
          $("#stok").on('input', function() {
              var value = $(this).val();

              if (!$.isNumeric(value)) {
                  $(this).val(value.replace(/[^0-9]/g, ''));
              }
          });
      });

      $(document).on('click', '.U_B_alat', function() {
          let id = $(this).data("id").split('-').pop();

          $(".modalUpdate").attr("id", "M_U_alat-" + id);
          $("#M_U_alat-" + id).modal('show');
          $("#U_route").attr('action', "/data/alat/update/" + id);

          $.get("/data/alat/show/" + id, function(data) {
              $("#U_nama").val(data.nama);
              $("#U_stok").val(data.stok);
              $("#U_satuan").val(data.satuan);
              $("#U_lokasi").val(data.lokasi).prop('selected', true);
              $("#U_jenis").val(data.jenis);
          });

          $("#U_stok").on('input', function() {
              var value = $(this).val();

              if (!$.isNumeric(value)) {
                  $(this).val(value.replace(/[^0-9]/g, ''));
              }
          });
      });

      $(document).on('click', '.U_A_alat', function() {
          let id = $(this).data("id").split('-').pop();
          $(".modalAmbil").attr("id", "M_A_alat-" + id);
          $("#M_A_alat-" + id).modal('show');
          $("#A_route").attr('action', "/data/alat/ambil/" + id);

          $.get("/data/alat/show/" + id, function(data) {
              $("#A_nama").val(data.nama);
              $("#A_stok").val(data.stok);
              $("#A_lokasi").val(data.lokasi).prop('selected', true);
              $("#A_satuan").text(data.satuan);
          });

          $("#A_ambil").on('input', function() {
              var value = $(this).val();

              if (!$.isNumeric(value)) {
                  $(this).val(value.replace(/[^0-9]/g, ''));
              }
          });
      });

      $(document).on('click', '.U_K_alat', function() {
          let id = $(this).data("id").split('-').pop();
          $(".modalKembali").attr("id", "M_K_alat-" + id);
          $("#M_K_alat-" + id).modal('show');
          $("#K_route").attr('action', "/data/alat/kembali/" + id);

          $.get("/data/alat/show/" + id, function(data) {
              $("#K_nama").val(data.nama);
              $("#K_stok").val(data.stok);
              $("#K_lokasi").val(data.lokasi).prop('selected', true);
              $("#K_satuan").text(data.satuan);
          });

          $("#K_kembali").on('input', function() {
              var value = $(this).val();

              if (!$.isNumeric(value)) {
                  $(this).val(value.replace(/[^0-9]/g, ''));
              }
          });
      });

      $(document).on("click", ".D_B_alat", function() {
          let id = $(this).data("id").split('-').pop();

          $(".modalDelete").attr("id", "M_D_alat-" + id);
          $("#M_D_alat-" + id).modal('show');
          $("#D_route").attr('action', "/data/alat/destroy/" + id);
      })

      $("#M_S_cair").on('show.bs.modal', function(e) {
          $("#stok").on('input', function() {
              var value = $(this).val();

              if (!$.isNumeric(value)) {
                  $(this).val(value.replace(/[^0-9]/g, ''));
              }
          });
      });

      $(document).on('click', '.U_B_cair', function() {
          let id = $(this).data("id").split('-').pop();

          $(".modalUpdate").attr("id", "M_U_cair-" + id);
          $("#M_U_cair-" + id).modal('show');
          $("#U_route").attr('action', "/data/cair/update/" + id);

          $.get("/data/cair/show/" + id, function(data) {
              $("#U_nama").val(data.nama);
              $("#U_stok").val(data.stok);
              $("#U_satuan").val(data.satuan);
              $("#U_lokasi").val(data.lokasi).prop('selected', true);
              $("#U_jenis").val(data.jenis);
          });

          $("#U_stok").on('input', function() {
              var value = $(this).val();

              if (!$.isNumeric(value)) {
                  $(this).val(value.replace(/[^0-9]/g, ''));
              }
          });
      });

      $(document).on("click", ".D_B_cair", function() {
          let id = $(this).data("id").split('-').pop();

          $(".modalDelete").attr("id", "M_D_cair-" + id);
          $("#M_D_cair-" + id).modal('show');
          $("#D_route").attr('action', "/data/cair/destroy/" + id);
      })

      $("#M_S_padat").on('show.bs.modal', function(e) {
          $("#stok").on('input', function() {
              var value = $(this).val();

              if (!$.isNumeric(value)) {
                  $(this).val(value.replace(/[^0-9]/g, ''));
              }
          });
      });

      $(document).on('click', '.U_B_padat', function() {
          let id = $(this).data("id").split('-').pop();

          $(".modalUpdate").attr("id", "M_U_padat-" + id);
          $("#M_U_padat-" + id).modal('show');
          $("#U_route").attr('action', "/data/padat/update/" + id);

          $.get("/data/padat/show/" + id, function(data) {
              $("#U_nama").val(data.nama);
              $("#U_stok").val(data.stok);
              $("#U_satuan").val(data.satuan);
              $("#U_lokasi").val(data.lokasi).prop('selected', true);
              $("#U_jenis").val(data.jenis);
          });

          $("#U_stok").on('input', function() {
              var value = $(this).val();

              if (!$.isNumeric(value)) {
                  $(this).val(value.replace(/[^0-9]/g, ''));
              }
          });
      });

      $(document).on("click", ".D_B_padat", function() {
          let id = $(this).data("id").split('-').pop();

          $(".modalDelete").attr("id", "M_D_padat-" + id);
          $("#M_D_padat-" + id).modal('show');
          $("#D_route").attr('action', "/data/padat/destroy/" + id);
      })

      $(document).on('click', '.U_B_laboratorium', function() {
          let id = $(this).data("id").split('-').pop();

          $(".modalUpdate").attr("id", "M_U_laboratorium-" + id);
          $("#M_U_laboratorium-" + id).modal('show');
          $("#U_route").attr('action', "/setting/laboratorium/update/" + id);

          $.get("/setting/laboratorium/show/" + id, function(data) {
              $("#U_nama").val(data.nama);
              $("#U_lokasi").val(data.lokasi);
          });

          $("#U_stok").on('input', function() {
              var value = $(this).val();

              if (!$.isNumeric(value)) {
                  $(this).val(value.replace(/[^0-9]/g, ''));
              }
          });
      });

      $(document).on("click", ".D_B_laboratorium", function() {
          let id = $(this).data("id").split('-').pop();

          $(".modalDelete").attr("id", "M_D_laboratorium-" + id);
          $("#M_D_laboratorium-" + id).modal('show');
          $("#D_route").attr('action', "/setting/laboratorium/destroy/" + id);
      })

      $(document).on('click', '.U_B_lokasi', function() {
          let id = $(this).data("id").split('-').pop();

          $(".modalUpdate").attr("id", "M_U_lokasi-" + id);
          $("#M_U_lokasi-" + id).modal('show');
          $("#U_route").attr('action', "/setting/lokasi/update/" + id);

          $.get("/setting/lokasi/show/" + id, function(data) {
              $("#U_nama").val(data.nama);
              $("#U_jenis").val(data.jenis);
          });

          $("#U_stok").on('input', function() {
              var value = $(this).val();

              if (!$.isNumeric(value)) {
                  $(this).val(value.replace(/[^0-9]/g, ''));
              }
          });
      });

      $(document).on('click', '.D_B_lokasi', function() {
          let id = $(this).data("id").split('-').pop();

          $(".modalDelete").attr("id", "M_D_lokasi-" + id);
          $("#M_D_lokasi-" + id).modal('show');
          $("#D_route").attr('action', "/setting/lokasi/destroy/" + id);
      })

      $(document).on('click', '.U_B_satuan', function() {
          let id = $(this).data("id").split('-').pop();

          $(".modalUpdate").attr("id", "M_U_satuan-" + id);
          $("#M_U_satuan-" + id).modal('show');
          $("#U_route").attr('action', "/setting/satuan/update/" + id);

          $.get("/setting/satuan/show/" + id, function(data) {
              $("#U_nama").val(data.nama);
              $("#U_jenis").val(data.jenis);
          });

          $("#U_stok").on('input', function() {
              var value = $(this).val();

              if (!$.isNumeric(value)) {
                  $(this).val(value.replace(/[^0-9]/g, ''));
              }
          });
      });

      $(document).on('click', '.D_B_satuan', function() {
          let id = $(this).data("id").split('-').pop();

          $(".modalDelete").attr("id", "M_D_satuan-" + id);
          $("#M_D_satuan-" + id).modal('show');
          $("#D_route").attr('action', "/setting/satuan/destroy/" + id);
      })
  </script>
