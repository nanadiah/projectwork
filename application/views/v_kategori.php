<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
     Daftar Kategori
    </div>
    <div>
    <a href="#tambah" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
      <table class="table" ui-jq="footable">
      <tr>
									<th>No</th>
									<th>Jurusan</th>
                                    <th>Kota</th>
									<th>Aksi</th>
								</tr>
							
							<?php
								$no = 1;
								foreach ($kategori as $kt) {
									echo '
										<tr>
											<td>'.$no.'</td>
                                            <td>'.$kt->jurusan.'</td>
                                            <td>'.$kt->kota.'</td>
											<td>
											<a class="btn btn-danger btn-md" onclick="return confirm(\'Anda yakin ingin menghapus?\')" href="'.base_url().'index.php/Kategori/hapus/'.$kt->id_kat.'"> Hapus </a>
											<a href="#" onclick="prepare_ubah_kategori('.$kt->id_kat.')" data-toggle="modal" data-target="#modal_ubah_kategori" class="btn btn-success btn-md"> Edit </a></td>
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
        <h4 class="modal-title">Tambah Kategori</h4>
      </div>
      <form action="<?php echo base_url('index.php/Kategori/tambah'); ?>" method="post">
	      <div class="modal-body">
        Jurusan
	    <input type="text" class="form-control" name="jurusan">
        Kota
	    <input type="text" class="form-control" name="kota">
	      </div>
	      <div class="modal-footer">
	        <input type="submit" class="btn btn-primary" name="submit" value="SIMPAN">
	        <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
      </form>
    </div>

  </div>
</div>

<div id="modal_ubah_kategori" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ubah Kategori</h4>
      </div>
      <form action="<?php echo base_url('index.php/Kategori/ubah'); ?>" method="post" enctype="multipart/form-data">
	      <div class="modal-body">
	        	<input type="hidden" name="edit_id_kat" id="edit_id_kat">
                Jurusan
	        	<input type="text" class="form-control" name="edit_jurusan" id="edit_jurusan">
                Kota
	        	<input type="text" class="form-control" name="edit_kota" id="edit_kota">
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
	
	function prepare_ubah_kategori(id_kat)
	{
		$.getJSON('<?php echo base_url(); ?>index.php/kategori/json_data_kategori_by_id/' + id_kat,  function(data){
			$("#edit_jurusan").val(data.jurusan);
            $("#edit_kota").val(data.kota);
			$("#edit_id_kat").val(data.id_kat);
		});                          
	}

</script>


