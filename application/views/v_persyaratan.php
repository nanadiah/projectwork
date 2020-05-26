<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
     Daftar Persyaratan
    </div>
    <div>
    <a href="#tambah" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
      <table class="table" ui-jq="footable">
      <tr>
									<th>No</th>
									<th>CV</th>
                                    <th>Surat Izin</th>
									<th>Aksi</th>
								</tr>
							
							<?php
								$no = 1;
								foreach ($persyaratan as $p) {
									echo '
										<tr>
											<td>'.$no.'</td>
                                            <td>'.$p->cv.'</td>
                                            <td>'.$p->surat_izin.'</td>
											<td>
											<a class="btn btn-danger btn-md" onclick="return confirm(\'Anda yakin ingin menghapus?\')" href="'.base_url().'index.php/persyaratan/hapus/'.$p->id_persyaratan.'"> Hapus </a>
											<a href="#" onclick="prepare_ubah_persyaratan('.$p->id_persyaratan.')" data-toggle="modal" data-target="#modal_ubah_persyaratan" class="btn btn-success btn-md"> Edit </a></td>
											</td>
										</tr>
									';
									$no++;
								}
							?>
								
						</table>
                                <?php if($this->session->flashdata('pesan')!=null): ?>
                                <div class= "alert alert-success"><?= $this->session->flashdata('pesan');?></div>
                                <?php endif?>
                              </div>
                              </div>
                          </div>

<div id="tambah" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Persyaratan</h4>
      </div>
      <form action="<?php echo base_url('index.php/persyaratan/tambah'); ?>" method="post">
	      <div class="modal-body">
        CV
	    <input type="text" class="form-control" name="cv">
        Surat Izin
	    <input type="text" class="form-control" name="surat_izin">
	      </div>
	      <div class="modal-footer">
	        <input type="submit" class="btn btn-primary" name="submit" value="SIMPAN">
	        <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
      </form>
    </div>

  </div>
</div>

<div id="modal_ubah_persyaratan" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ubah Persyaratan</h4>
      </div>
      <form action="<?php echo base_url('index.php/persyaratan/ubah'); ?>" method="post" enctype="multipart/form-data">
	      <div class="modal-body">
	        	<input type="hidden" name="edit_id_persyartan" id="edit_id_persyaratan">
                CV
	        	<input type="text" class="form-control" name="edit_cv" id="edit_cv">
                Surat Izin
	        	<input type="text" class="form-control" name="edit_surat_izin" id="edit_surat_izin">
	      </div>
	      <div class="modal-footer">
	        <input type="submit" class="btn btn-primary" name="submit" value="SIMPAN">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
      </form> 
    </div>
  </div>
</div>
</div>
</section>
<script type="text/javascript">
	
	function prepare_ubah_persyaratan(id_persyaratan)
	{
		$.getJSON('<?php echo base_url(); ?>index.php/persyaratan/json_data_persyaratan_by_id/' + id_persyaratan,  function(data){
			$("#edit_cv").val(data.cv);
            $("#edit_surat_izin").val(data.surat_izin);
			$("#edit_id_persyaratan").val(data.id_persyaratan);
		}); 
	}

</script>


