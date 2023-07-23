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
              <h3 class="card-title">Custom Filter</h3>
            </div>
            <form>
              <div class="card-body">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Merek Mobil</label>
                  <div class="col-sm-4">
                    <select  id="select-merek-filter" class="form-control form-control-sm" name="merek">
                      <option><?=$this->input->get('merek')?></option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Model Mobil</label>
                  <div class="col-sm-4">
                    <select  id="select-model-filter" class="form-control form-control-sm" name="model" readonly> 
                      <option><?=$this->input->get('model')?></option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Status Sewa</label>
                  <div class="col-sm-4">
                    <select  id="select-status-filter" class="form-control form-control-sm" name="status">
                     <option>DISEWA</option>
                     <option>TIDAK-DISEWA</option>
                     <option>SEMUA</option>
                   </select>
                 </div>
               </div> 
               <div class="form-group row">
                 <div class="col-sm-2"></div>
                 <div class="col-sm-4">
                  <button type="submite" class="btn btn-primary btn-sm">Filter</button>
                  <a href="<?=base_url('index.php/manajemen_mobil/index')?>" class="btn btn-default btn-sm" >Reset</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Daftar Mobil</h3>
            <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#tambah"> Tambah Mobil <i class="fa fa-plus"></i></button>
          </div>
          <div class="card-body">
            <table id="myTable" class="table table-bordered table-hover" width="100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nomor Polisi</th>
                  <th>Merek</th>
                  <th>Model</th>
                  <th>Tarif Sewa</th>
                  <th>Status</th>
                  <th>History</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
               <?php $no=1; foreach ($mobil as $m) {

                  $statusFilter = "SEMUA";
                  if($this->input->get('status')=="DISEWA"){
                    $statusFilter = "ORDER";
                  }elseif ($this->input->get('status')=="TIDAK-DISEWA") {
                    $statusFilter = "NO-ORDER";
                  }
                  
                  $cekStatus=$this->db->query("SELECT status FROM tbl_sewa WHERE DATE_FORMAT(tanggal_mulai,'%Y-%m-%d')<='".date('Y-m-d')."' AND DATE_FORMAT(tanggal_selesai,'%Y-%m-%d')>=".date('Y-m-d')." AND status='ORDER' AND id_mobil=".$m->id_mobil."")->row();
                    if($cekStatus){
                      $status=$cekStatus->status;
                    }else{
                      $status="NO-ORDER";
                    }
                  if($status==$statusFilter or $statusFilter==$this->input->get('status')){
                ?>
                <tr>
                  <td><?php echo $no++?></td>
                  <td><?php echo $m->plat_nomor ?></td>
                  <td><?php echo $m->merek ?></td>
                  <td><?php echo $m->model ?></td>
                  <td><?php echo $m->tarif_sewa ?></td>
                  <td><center><span class="badge bg-success"><?php echo ($status=="ORDER"?"DISEWA":"TIDAK-DISEWA") ?></span></center></td>
                  <td><center><button class="btn btn-info btn-xs" onClick="historySewa('<?php echo $m->id_mobil?>','<?php echo $m->plat_nomor?>')">Lihat History Sewa</button><center></td>
                    <td><center>
                      <button class="btn btn-warning btn-xs"  onClick='onUbahShowBarang(<?php echo '`'.$m->id_mobil."`,`".$m->plat_nomor."`,`".$m->merek."`,`".$m->id_merek."`,`".$m->model."`,`".$m->id_model."`,`".$m->tarif_sewa."`"; ?>)'><i class="fa fa-pencil-square-o"></i></button>

                      <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#hapus<?php echo $m->id_mobil?>" <?php if($m->status=="ORDER"){ echo "disabled"; }?>><i class="fa fa-times"></i></button></center></td>
                    </tr>


                    <div class="modal fade in" id="hapus<?php echo $m->id_mobil?>">
                      <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Hapus Mobil</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p>Apakah Anda Yakin Untuk Hapus Mobil dengan Nomor Polisi </p>
                            <p><b><?php echo $m->plat_nomor ?></b></p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                            <a href="<?php echo base_url('index.php/manajemen_mobil/hapus_mobil/').$m->id_mobil ?>" class="btn btn-primary">Hapus</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php }} ?>

                </tbody>
                <div class="modal fade in" id="tambah">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form action="<?php echo base_url('index.php/manajemen_mobil/input_mobil')?>" method="POST">
                        <div class="modal-header">
                          <h4 class="modal-title">Tambah Mobil Baru</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                          </div>
                          <div class="modal-body">
                            <div class="form-group">
                              <label>Nomor Polisi</label>
                              <input type="text" class="form-control" maxlength="9" name="nomorPolisi"  placeholder="Masukan Nomor Polisi"  oninput="this.value = this.value.toUpperCase()" required>
                            </div>
                            <div class="form-group">
                              <label>Merek Mobil</label>
                              <select  id="select-merek" class="form-control form-control" name="merek" required>
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Model Mobil</label>
                              <select  id="select-model" class="form-control form-control" name="model" required disabled>
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Tarif Sewa</label>
                              <input type="number" class="form-control"  maxlength="6" name="tarifSewa"  placeholder="Masukan Tarif Sewa/Hari" required>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

                  <div class="modal fade in" id="ubah">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form id="formEdit"  method="POST">
                          <div class="modal-header">
                            <h4 class="modal-title">Ubah Data Mobil</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                              <div class="form-group">
                                <label>Nomor Polisi</label>
                                <input type="text" class="form-control" maxlength="9" name="nomorPolisi"  placeholder="Masukan Nomor Polisi"  oninput="this.value = this.value.toUpperCase()" id="nomorPolisiEdit" required>
                              </div>
                              <div class="form-group">
                                <label>Merek Mobil</label>
                                <select  id="select-merek-edit" class="form-control form-control" name="merek" required>
                                  <option value="<?php echo $m->id_merek ?>"><?php echo $m->merek ?></option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label>Model Mobil</label>
                                <select  id="select-model-edit" class="form-control form-control" name="model" required readonly>
                                  <option value="<?php echo $m->id_model ?>" ><?php echo $m->model ?></option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label>Tarif Sewa</label>
                                <input type="number" class="form-control"  maxlength="6" name="tarifSewa"  placeholder="Masukan Tarif Sewa/Hari" id="tarifSewaEdit" required>
                              </div>  
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                              <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>

                  </table>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <div class="modal fade in" id="historySewaModal">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="titleHistorySewa">History Sewa</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <table id="tblHistorySewa" class="table table-striped" width="100%">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal Mulai</th>
                      <th>Tanggal Selesai</th>
                      <th>Tarif/Hari</th>
                      <th>Total Bayar</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <script type="text/javascript">
        $(document).ready(function() {

          $('#myTable').DataTable( {
            "scrollCollapse": true,
            "autoWidth": false,
            "responsive": true,
            "columnDefs": [ {
              "targets": [5,6,7],
              "orderable": false,
            }]
          } );

         



          $('#select-merek').select2({
            placeholder: "Pilih Merek Mobil",
            ajax: {
              url: '<?=base_url('index.php/')?>manajemen_mobil/get_merek_mobil',
              type: "post",
              dataType: 'json',
              delay: 250,
              data: function (params) {
               return {
                 searchMerek: params.term // search term
               };
             },
             processResults: function (response) {
              let dataArray=[];
              response.forEach((element, index, array) => {
                dataArray.push({"id":element.id,"text":element.text});
              });
              console.log(dataArray);
              return {
               results: dataArray
             };
           },
           cache: true
         }
       }).on("change", function (e) {
        console.log($('#select-merek').val());
        var idMerek = $('#select-merek').val();
        $('#select-model').val('');
        $('#select-model').prop("disabled",false);
        $('#select-model').select2({
          placeholder: "Pilih Model Mobil",
          ajax: {
            url: '<?=base_url('index.php/')?>manajemen_mobil/get_model_mobil/',
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function (params) {
             return {
                 searchModel: params.term, // search term
                 idMerek: idMerek
               };
             },
             processResults: function (response) {
              let dataArray=[];
              response.forEach((element, index, array) => {
                dataArray.push({"id":element.id,"text":element.text});
              });
              console.log(dataArray);
              return {
               results: dataArray
             };
           },
           cache: true
         }
       });
      });




       $('#select-merek-edit').select2({
        placeholder: "Pilih Merek Mobil",
        ajax: {
          url: '<?=base_url('index.php/')?>manajemen_mobil/get_merek_mobil',
          type: "post",
          dataType: 'json',
          delay: 250,
          data: function (params) {
           return {
                 searchMerek: params.term // search term
               };
             },
             processResults: function (response) {
              let dataArray=[];
              response.forEach((element, index, array) => {
                dataArray.push({"id":element.id,"text":element.text});
              });
              console.log(dataArray);
              return {
               results: dataArray
             };
           },
           cache: true
         }
       }).on("change", function (e) {
        console.log($('#select-merek-edit').val());
        var idMerek = $('#select-merek').val();
        $('#select-model-edit').val('');
        $('#select-model-edit').prop("disabled",false);
        $('#select-model-edit').select2({
          placeholder: "Pilih Model Mobil",
          ajax: {
            url: '<?=base_url('index.php/')?>manajemen_mobil/get_model_mobil/',
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function (params) {
             return {
                 searchModel: params.term, // search term
                 idMerek: idMerek
               };
             },
             processResults: function (response) {
              let dataArray=[];
              response.forEach((element, index, array) => {
                dataArray.push({"id":element.id,"text":element.text});
              });
              console.log(dataArray);
              return {
               results: dataArray
             };
           },
           cache: true
         }
       });
      });

       $('#select-merek-filter').select2({
        placeholder: "Pilih Merek Mobil",
        ajax: {
          url: '<?=base_url('index.php/')?>manajemen_mobil/get_merek_mobil',
          type: "post",
          dataType: 'json',
          delay: 250,
          data: function (params) {
           return {
                 searchMerek: params.term // search term
               };
             },
             processResults: function (response) {
              let dataArray=[];
              response.forEach((element, index, array) => {
                dataArray.push({"id":element.text,"text":element.text});
              });
              console.log(dataArray);
              return {
               results: dataArray
             };
           },
           cache: true
         }
       }).on("change", function (e) {
        console.log($('#select-merek-filter').val());
        var labelMerek = $('#select-merek-filter').val();
        $('#select-model-filter').val('');
        $('#select-model-filter').prop("disabled",false);
        $('#select-model-filter').select2({
          placeholder: "Pilih Model Mobil",
          ajax: {
            url: '<?=base_url('index.php/')?>manajemen_mobil/get_model_mobil/',
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function (params) {
             return {
                 searchModel: params.term, // search term
                 labelMerek: labelMerek
               };
             },
             processResults: function (response) {
              let dataArray=[];
              response.forEach((element, index, array) => {
                dataArray.push({"id":element.text,"text":element.text});
              });
              console.log(dataArray);
              return {
               results: dataArray
             };
           },
           cache: true
         }
       });
      });



       $('#select-status-filter').select2({
        placeholder: "Pilih Status",
      });
       $('#select-status-filter').val(<?=json_encode($this->input->get('status'))?>);
       $('#select-status-filter').trigger('change');

     } );

  function onUbahShowBarang(idmobil,nomorPolisi,merek,idMerek,model,idModel,tarifSewa) {
    var url_redirect =  window.location.href.split("?")[1];

    $('#nomorPolisiEdit').val(nomorPolisi);
    $('#tarifSewaEdit').val(tarifSewa);
    $('#select-merek-edit').html('<option value="'+idMerek+'">'+merek+'</option>');
    $('#select-model-edit').html('<option value="'+idModel+'">'+model+'</option>');
    $('#formEdit').attr('action', '<?php echo base_url("index.php/manajemen_mobil/ubah_mobil/")?>'+idmobil);
    $("#ubah").modal();
  }

  function historySewa(idMobil,nomorPolisi) {
    $('#tblHistorySewa').find('tbody').remove();
    $('#titleHistorySewa').html("History Sewa <b>"+nomorPolisi+"</b>");   
    $.ajax({
      type: "GET",
      url: "<?php echo base_url('index.php/manajemen_mobil/get_history_sewa_mobil/')?>"+idMobil,
      success: function (data) {
        var tr;
        tr = $('<tbody/>');
        for (var i = 0; i < data.data.length; i++) {
          tr.append("<tr><td>" + data.data[i].no + "</td><td>" + data.data[i].tanggalMulai + "</td><td>" + data.data[i].tanggalSelesai + "</td><td>" + data.data[i].tarifSewa + "</td><td>" + JSON.stringify(data.data[i].totalBayar) + "</td><td><span class='badge bg-success'>" + (data.data[i].status=="ORDER"?"DISEWA":"DIKEMBALIKAN") + "</span></td></tr>");
          $('#tblHistorySewa').append(tr);
        }
      }
    });
    $("#historySewaModal").modal();
  }
</script>