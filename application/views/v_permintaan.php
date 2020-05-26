<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
     DAFTAR PERMINTAAN
    </div>
    <div>
      <table class="table" ui-jq="footable">
      <tr>
									          <th style="text-align:center;">No.</th>
                            <th style="text-align:center;">CV</th>
                            <th style="text-align:center;">Status Pilihan</th>
                            <th style="text-align:center;">Tanggal</th>
                            <th style="text-align:center;">Nama Perusahaan</th>
                            <th style="text-align:center;">Nama Siswa</th>
                            <th style="text-align:center;">Aksi</th>
								</tr>
							
							<?php
								$no = 1;
								foreach ($permintaan as $p) {?>
										<tr>
											                      <td><?= $no?></td>
                                            <td><a href="#" onclick="cv(<?= $p->id_detil?>)" style="background:transparent;border:none;" data-toggle="modal" data-target="#ubah" class="btn btn-success btn-md"><img src="<?= base_url('assets/images/cv/'.$p->cv)?>" alt="" style="width:200px;height:200px;"></a></td>
                                            <td><?= $p->status_pilihan?></td>
                                            <td><?= $p->tanggal?></td>
                                            <td><?= $p->nama_perusahaan?></td>
                                            <td><?= $p->nama_siswa?></td>
											<td>
											<a href="<?= base_url('index.php/permintaan/terima/'.$p->id_detil)?>" class="btn btn-warning" data-toggle="modal">Terima</a> 
                            <a href="<?= base_url('index.php/permintaan/tolak/'.$p->id_detil)?>" class="btn btn-danger" data-toggle="modal" onclick="return confirm(\'anda yakin?\')">Tolak</a>
											</td>
										</tr>
								<?php	$no++;
								}
							?> 
								
						</table>
                                <?php if($this->session->flashdata('pesan')!=null): ?>
                                <div class= "alert alert-success"><?= $this->session->flashdata('pesan');?></div>
                                <?php endif?>
                              </div>
                              </div>
                          </div>

    <div class="modal fade" id="update_permintaan">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title" id="myModalLabel">Update Permintaan</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/Permintaan/update_permintaan')?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_detil" id="id_detil">
        Status Perusahaan
        <select name="status_transaksi" id="status_transaksi">
        <option value="Diterima"></option>
        <option value="Ditolak"></option>
        </select>
        <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
		</div>
	</div>
</div>

<div class="modal fade" id="ubah">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myModalLabel">CV</h4>
        </div>
        <div class="modal-body">
        <center>
        <img src="<?= base_url('assets/images/cv/'.$p->cv)?>" alt="" style="width:200px;height:200px;">
        </center>
    </div>
  </div>

<script type="text/javascript">

    function cv(id_detil) {
        $.getJSON("<?=base_url()?>index.php/Permintaan/get_detail_permintaan/"+id_detil,function(data){
			$("#id_detil").val(data['id_detil']);
            $("#cv").val(data['cv']);
        });
    }

</script>


