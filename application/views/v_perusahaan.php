<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
     Daftar Perusahaan
    </div>
    <div>
    <a href="#tambah" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
      <table class="table" ui-jq="footable" style="font-size: 12px; text-align: center;">
        <tr>
            <th>NO</th>
            <th>ID</th>
            <th>PERUSAHAAN</th>
            <th>GAMBAR</th>
            <th>KUOTA</th>
            <th>DESKRIPSI</th>
            <th>KATEGORI</th>
            <th>PERSYARTAN</th>
            <th>AKSI</th>
        </tr>
                    <?php
                    $no=0;
                    foreach ($perusahaan as $prs) 
                    {
                    $no++;
                    echo '<tr>
                                  
                    <td>'.$no.'</td>
                    <td>'.$prs->id_perusahaan.'</td>
                    <td>'.$prs->nama_perusahaan.'</td>
                    <td>'.$prs->gambar.'</td>
                    <td>'.$prs->kuota.'</td>
                    <td>'.$prs->deskripsi.'</td>
                    <td>'.$prs->jurusan.','.$prs->kota.'</td>
                    <td>'.$prs->cv.','.$prs->surat_izin.'</td>
                    <td><a class="btn btn-danger btn-md" onclick="return confirm(\'Anda yakin ingin menghapus?\')" href="'.base_url().'index.php/perusahaan/hapus_perusahaan/'.$prs->id_perusahaan.'"> Hapus </a>
                        <a href="#" onclick="prepare_update_perusahaan('.$prs->id_perusahaan.')" data-toggle="modal" data-target="#ubah" class="btn btn-success btn-md">Edit</a></td>
                          </tr>';
                    }
                    ?>

<div class="modal fade" id="tambah">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myModalLabel">Tambah Perusahaan</h4>
        </div>
        <div class="modal-body">
          <form action="<?php echo base_url() ?>index.php/perusahaan/add_perusahaan" method="post" enctype="multipart/form-data">
          Nama Perusahaan
          <input type="text" name="nama_perusahaan" class="form-control"><br>
          Gambar
          <input type="file" name="gambar" class="form-control"><br>
         Kuota
          <input type="text" name="kuota" class="form-control"><br>
          Deskripsi
          <input type="text" name="deskripsi" class="form-control"><br>
          Kategori
          <select name="kategori" class="form-control" >
					                    <?php
						                    foreach ($kategori as $k) {
							                echo '
								            <option value="'.$k->id_kat.'">jurusan:'.$k->jurusan.', kota:'.$k->kota.' </option>
			                                ';
						                    } 
					                    ?>	        		
                                    </select>  
          Persyaratan
          <select name="persyaratan" class="form-control" >
					                    <?php
						                    foreach ($persyaratan as $p) {
							                echo '
								            <option value="'.$p->id_persyaratan.'">cv:'.$p->cv.', surat izin:'.$p->surat_izin.'</option>
			                                ';
						                    }
					                    ?>	        		
                                    </select>  

         <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
          </form>
        </div>
      </table>
      <?php if($this->session->flashdata('pesan')!=null): ?>
              <div class= "alert alert-success"><?= $this->session->flashdata('pesan');?></div>
      <?php endif?>
    </div>
  </div>
  <div class="modal fade" id="ubah">
    <div class="modal-dialog">
      <div class="modal-content">
      <form action="<?php echo base_url() ?>index.php/Perusahaan/ubah" method="post" enctype="multipart/form-data">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myModalLabel">Ubah Perusahaan</h4>
        </div>

        <div class="modal-body">
        <input type="hidden" name="id_perusahaan_edit" id="id_perusahaan_edit">

        Nama Perusahaan
          <input type="text" name="edit_nama_perusahaan"  id="edit_nama_perusahaan" class="form-control"><br>
         Kuota
          <input type="text" name="edit_kuota" id="edit_kuota" class="form-control"><br>
        Deskripsi
          <input type="text" name="edit_deskripsi" id="edit_deskripsi" class="form-control"><br>
          Kategori
          <select name="edit_kategori" id="edit_kategori" class="form-control" >
					                    <?php
						                    foreach ($kategori as $k) {
							                echo '
								            <option value="'.$k->id_kat.'">jurusan:'.$k->jurusan.', kota:'.$k->kota.' </option>
			                                ';
						                    }
					                    ?>	        		
                                    </select>  
          Persyaratan
          <select name="edit_persyaratan" id="edit_persyaratan" class="form-control" >
					                    <?php
						                    foreach ($persyaratan as $p) {
							                echo '
								            <option value="'.$p->id_persyaratan.'">cv:'.$p->cv.', surat izin:'.$p->surat_izin.'</option>
			                                ';
						                    }
					                    ?>	        		
                                    </select>  
          <div id="gambar"></div>

          <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
                              </form>
        </div>
        </div>
</div>
</section>

<script type="text/javascript">
function prepare_update_perusahaan(id_perusahaan) {
          $.getJSON('<?php echo base_url() ?>index.php/perusahaan/json_perusahaan_by_id/'+id_perusahaan, function(data){
          $("#edit_nama_perusahaan").val(data.nama_perusahaan);
          $("#edit_kuota").val(data.kuota);
          $("#edit_deskripsi").val(data.deskripsi);
          $("#edit_kategori").val(data.id_kat);
          $("#edit_persyaratan").val(data.id_persyaratan);
          $("#gambar").html('<img src="<?php echo base_url(); ?>assets/images/perusahaan/' + data.gambar + '" width="50px" >');
          $("#id_perusahaan_edit").val(data.id_perusahaan);

          });
        }
</script>


