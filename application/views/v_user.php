<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
     Daftar User
    </div>
    <div>
    <a href="#tambah" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
      <table class="table" ui-jq="footable">
        <tr>
                                  <th>NO</th>
                                  <th>ID USER</th>
                                  <th>NAMA USER</th>
                                  <th>USERNAME</th>
                                  <th>LEVEL</th>
                                  <th>AKSI</th>
        </tr>
        <?php
                                $no=0;
                                foreach ($arr as $dt_user) {
                                  $no++;
                                  echo '<tr>
                                  
                                  <td>'.$no.'</td><td>'.$dt_user->id_user.'</td><td>'.$dt_user->nama_user.'</td><td>'.$dt_user->username.'</td><td>'.$dt_user->level.'</td>
                                  <td><a class="btn btn-danger btn-md" onclick="return confirm(\'Anda yakin ingin menghapus?\')" href="'.base_url().'index.php/user/hapus/'.$dt_user->id_user.'"> Hapus </a>
                                                                                              <a href="#" onclick="prepare_update_user('.$dt_user->id_user.')" data-toggle="modal" data-target="#ubah" class="btn btn-success btn-md"> Edit </a></td>
                                  </tr>';
                                }
                                ?>
<div class="modal fade" id="tambah">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myModalLabel">Tambah User</h4>
        </div>
        <div class="modal-body">
          <form action="<?php echo base_url() ?>index.php/user/add_user" method="post">
          Nama user
          <input type="text" name="nama_user" class="form-control"><br>
          Username
          <input type="text" name="username" class="form-control"><br>
         Password
          <input type="password" name="password" class="form-control"><br>
          Level
          <select class="form-control" name="level">
	        		<option value="admin">Admin</option>
	        		<option value="hubin">Hubin</option>
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
      <form action="<?php echo base_url() ?>index.php/user/ubah" method="post">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myModalLabel">Ubah user</h4>
        </div>

        <div class="modal-body">
        <input type="hidden" name="id_siswa_edit" id="id_siswa_edit">

        Nama user
          <input type="text" id="nama_user_edit" name="nama_user_edit" class="form-control"><br>
        Username
          <input type="text" id="username_edit" name="username_edit" class="form-control"><br>
        Password
          <input type="password" id="password_edit" name="password_edit" class="form-control"><br>
        Level
          <input type="text" id="level_edit" name="level_edit" class="form-control"><br>

          <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
                              </form>
        </div>
        </div>
</div>
</section>
<script type="text/javascript">
        function prepare_update_user(id_user) {
          $.getJSON('<?php echo base_url() ?>index.php/user/json_user_by_id/'+id_user, function(data){
          $("#nama_user_edit").val(data.nama_user);
          $("#username_edit").val(data.username);
          $("#password_edit").val(data.password);
          $("#level_edit").val(data.level);
          $("#id_user_edit").val(data.id_user);

          });
        }
        </script>


