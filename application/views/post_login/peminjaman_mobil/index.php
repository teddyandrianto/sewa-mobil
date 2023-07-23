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
                <div class="col-sm-3">
                  <label for="inputEmail3" class="col-form-label">Tanggal Mulai Sewa</label>
                  <input class="form-control" type="date" name="startDate" id="dateStart" required>
                </div>
                <div class="col-sm-3">
                  <label for="inputEmail3" class="col-form-label">Tanggal Selesai</label>
                  <input class="form-control" type="date"  name="endDate" id="dateEnd" required>
                </div>
                <div class="col-sm-2">
                  <label for="inputEmail3" class="col-form-label">&nbsp;</label>
                  <button type="submite" class="btn btn-primary btn-block">Cari Mobil <i class="fa fa-search"></i></button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <?php if($this->input->get('startDate')AND$this->input->get('endDate')){?>
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
                    <th>Nomor Polisi</th>
                    <th>Merek</th>
                    <th>Model</th>
                    <!-- <th>Status</th> -->
                    <th>Tarif Sewa</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                 <?php $no=1; foreach ($mobil as $m) { ?>
                  <tr>
                    <td><?php echo $no++?></td>
                    <td><?php echo $m->plat_nomor ?></td>
                    <td><?php echo $m->merek ?></td>
                    <td><?php echo $m->model ?></td>
                    <!-- <td><?php echo $m->status ?></td> -->
                    <td><?php echo $m->tarif_sewa ?></td>
                    <td><center>
                      <button class="btn btn-warning"  data-toggle="modal" data-target="#order<?php echo $m->id_mobil?>">Detai Sewa <i class="fa fa-arrow-circle-right"></i></button>
                    </center></td>
                  </tr>
                  <div class="modal fade in" id="order<?php echo $m->id_mobil?>">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Detail Sewa</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Nomor Polisi</label>
                            <div class="col-sm-8">
                             <div class="form-control"><?php echo $m->plat_nomor ?></div>
                           </div>
                         </div>
                         <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Mobil</label>
                          <div class="col-sm-8">
                           <div class="form-control"><?php echo $m->merek." ".$m->model ?></div>
                         </div>
                       </div>
                       <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Tarif Sewa/Hari</label>
                        <div class="col-sm-8">
                         <div class="form-control"><?php echo $m->tarif_sewa ?></div>
                       </div>
                     </div>
                     <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Lama Sewa </label>
                      <div class="col-sm-8">
                       <div class="form-control"><?php
                       $dateStart = strtotime($this->input->get('startDate'));
                       $dateEnd = strtotime($this->input->get('endDate'));
                       $hari = ceil(abs($dateEnd - $dateStart) / 86400);
                       echo $hari; ?> Hari</div>
                     </div>
                   </div>
                   <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Total Biaya Sewa</label>
                    <div class="col-sm-8">
                     <div class="form-control"><?php echo $m->tarif_sewa*$hari ?></div>
                   </div>
                 </div>
               </div>
               <div class="modal-footer">
                <form action="<?php echo base_url('index.php/peminjaman_mobil/order_pinjam_mobil')?>" method="POST">
                  <input type="hidden" name="idMobil" value="<?php echo $m->id_mobil?>">
                  <input type="hidden" name="tarifSewa" value="<?php echo $m->tarif_sewa?>">
                  <input type="hidden" name="lamaSewa" value="<?php echo $hari?>">
                  <input type="hidden" name="startDate" value="<?php echo $this->input->get('startDate')?>">
                  <input type="hidden" name="endDate" value="<?php echo $this->input->get('endDate')?>">
                  <button type="submit" class="btn btn-warning btn-block">Sewa <i class="fa fa-arrow-circle-right"></i></button>
                </form>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>

    </tbody>
  </table>
</div>
</div>
</div>
<?php } ?>
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
        "targets": [5],
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

  $("#dateStart").attr('min', moment().format('YYYY-MM-DD'));
  $("#dateStart").val(moment().format('YYYY-MM-DD'));
  $("#dateEnd").attr('min', moment().add('days',1).format('YYYY-MM-DD'));
  $("#dateEnd").val(moment().add('days',1).format('YYYY-MM-DD'));
  if('<?php echo $this->input->get('endDate')?>'!=''){
    $("#dateEnd").val(moment('<?php echo $this->input->get('endDate')?>').format('YYYY-MM-DD'));
  }

  if('<?php echo $this->input->get('startDate')?>'!=''){
    $("#dateStart").val(moment('<?php echo $this->input->get('startDate')?>').format('YYYY-MM-DD'));
    $("#dateEnd").attr('min', moment('<?php echo $this->input->get('startDate')?>').add('days',1).format('YYYY-MM-DD'));
  }

  $("#dateStart").change(function(){   // 1st way
    $("#dateEnd").attr('min',moment($("#dateStart").val(),'YYYY-MM-DD').add('days',1).format('YYYY-MM-DD'));
      //if($("#dateEnd").val()==''){
    $("#dateEnd").val(moment($("#dateStart").val(),'YYYY-MM-DD').add('days',1).format('YYYY-MM-DD'));
      //}
  });

     $("#dateEnd").change(function(){   // 1st way
       //$("#dateStart").attr('max', moment($("#dateEnd").val(),'YYYY-MM-DD').add('days',-1).format('YYYY-MM-DD'));
       if($("#dateStart").val()==''){
        $("#dateStart").val(moment($("#dateEnd").val(),'YYYY-MM-DD').add('days',1).format('YYYY-MM-DD'));
      }
    });
  </script>