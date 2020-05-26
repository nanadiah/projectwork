<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
     Daftar Siswa 
    </div>
    <div>
    <a href="#tambah" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
      <table class="table" ui-jq="footable">
        <tr>
            <th>NO</th>
            <th>ID SISWA</th>
            <th>NAMA SISWA</th>
            <th>NIS</th>
            <th>KELAS</th>
            <th>TELPON</th>
            <th>USERNAME</th>
            <th>PASSWORD</th>
            <th>AKSI</th>
        </tr>
                    <?php
                    $no=0;
                    foreach ($arr as $dt_siswa) 
                    {
                    $no++;
                    echo '<tr>
                                  
                    <td>'.$no.'</td>
                    <td>'.$dt_siswa->id_siswa.'</td>
                    <td>'.$dt_siswa->nama_siswa.'</td>
                    <td>'.$dt_siswa->nis.'</td>
                    <td>'.$dt_siswa->kelas.'</td>
                    <td>'.$dt_siswa->telp.'</td>
                    <td>'.$dt_siswa->username.'</td>
                    <td>'.$dt_siswa->password.'</td>
                    <td><a class="btn btn-danger btn-md" onclick="return confirm(\'Anda yakin ingin menghapus?\')" href="'.base_url().'index.php/siswa/hapus/'.$dt_siswa->id_siswa.'"> Hapus </a>
                        <a href="#" onclick="prepare_update_siswa('.$dt_siswa->id_siswa.')" data-toggle="modal" data-target="#ubah" class="btn btn-success btn-md">Edit</a></td>
                          </tr>';
                    }
                    ?>

<div class="modal fade" id="tambah">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myModalLabel">Tambah Siswa</h4>
        </div>
        <div class="modal-body">
          <form action="<?php echo base_url() ?>index.php/siswa/add_siswa" method="post">
          Nama Siswa
          <input type="text" name="nama_siswa" class="form-control"><br>
          NIS
          <input type="text" name="nis" class="form-control"><br>
         Kelas
          <input type="text" name="kelas" class="form-control"><br>
          Telepon
          <input type="text" name="telp" class="form-control"><br>
          Username
          <input type="text" name="username" class="form-control"><br>
          Password
          <input type="password" name="password" class="form-control"><br>

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
      <form action="<?php echo base_url() ?>index.php/siswa/ubah" method="post">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myModalLabel">Ubah Siswa</h4>
        </div>

        <div class="modal-body">
        <input type="hidden" name="id_siswa_edit" id="id_siswa_edit">

          Nama Siswa
          <input type="text" id="nama_siswa_edit" name="nama_siswa_edit" class="form-control"><br>
          NIS
          <input type="text" id="nis_edit" name="nis_edit" class="form-control"><br>
          Kelas
          <input type="text" id="kelas_edit" name="kelas_edit" class="form-control"><br>
          Telepon
          <input type="text" id="telp_edit" name="telp_edit" class="form-control"><br>
          Username
          <input type="text" id="username_edit" name="username_edit" class="form-control"><br>
          Password
          <input type="password" id="password_edit" name="password_edit" class="form-control"><br>

          <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
                              </form>
        </div>
        </div>
</div>
</section>

<script type="text/javascript">
function prepare_update_siswa(id_siswa) {
          $.getJSON('<?php echo base_url() ?>index.php/Siswa/json_siswa_by_id/'+id_siswa, function(data){
          $("#nama_siswa_edit").val(data.nama_siswa);
          $("#nis_edit").val(data.nis);
          $("#kelas_edit").val(data.kelas);
          $("#telp_edit").val(data.telp);
          $("#username_edit").val(data.username);
          $("#password_edit").val(data.password);
          $("#id_siswa_edit").val(data.id_siswa);
 
          });
        }
</script>


