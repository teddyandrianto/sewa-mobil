  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <?php echo $this->session->flashdata('pesan');?>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
     <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <!-- <h3 class="card-title">Daftar Mobil</h3> -->
               <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#pengembalian">Pengembalian Mobil <i class="fa fa-mail-forward"></i></button>
            </div>
            <div class="card-body">
              <table id="myTable" class="table table-bordered table-hover" width="100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Mobil</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Tarif/Hari</th>
                    <th>Total Bayar</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                 <?php $no=1; foreach ($sewa as $s) { ?>
                  <tr>
                    <td><?php echo $no++?></td>
                    <td><?php echo $s->merek." ".$s->model."(".$s->plat_nomor.")"; ?></td>
                    <td><?php echo $s->tanggal_mulai ?></td>
                    <td><?php echo $s->tanggal_selesai ?></td>
                    <td><?php echo $s->tarif_sewa ?></td>
                    <td><?php echo $s->tarif_sewa*$s->lama_sewa ?></td>
                    <td><span class="badge bg-success">Dikembalikan</span></td>
                  </tr>
                <?php } ?>

              </tbody>
            </table>
              <div class="modal fade in" id="pengembalian">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <form action="<?php echo base_url('index.php/pengembalian_mobil/proses_pengembalian')?>" method="POST">
                      <div class="modal-header">
                        <h4 class="modal-title">Pengembalian Sewa Mobil</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">
                          <div class="form-group">
                            <label>Nomor Polisi</label>
                            <input type="text" class="form-control" maxlength="9" name="nomorPolisi"  placeholder="Masukan Nomor Polisi"  oninput="this.value = this.value.toUpperCase()" required>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary btn-block">Pengembalian Mobil</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<script type="text/javascript">
  $(document).ready(function() {

    $('#myTable').DataTable( {
      "scrollCollapse": true,
      "autoWidth": false,
      "responsive": true,
      "columnDefs": [ {
        "targets": [6],
        "orderable": false,
      }]
    } );
  });
  </script>