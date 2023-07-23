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
                  </tr>
                <?php } ?>

              </tbody>
            </table>
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
    } );
    
  });
</script>