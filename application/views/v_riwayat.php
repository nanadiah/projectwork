<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
     RIWAYAT
    </div>
    <div>
      <table class="table" ui-jq="footable">
      <tr>
      <tr>
                                                <th>No.</th>
                                                <th>Nama Siswa</th>
                                                <th>Perusahaan</th>
                                                <th>Status Perusahaan</th>
                                                <th>Tanggal</th>
                                            </tr>
                                        <?php
								$no = 1;
								foreach ($riwayat as $r) {
									echo '
										<tr>
											<td>'.$no.'</td>
                                            <td>'.$r->nama_siswa.'</td>
                                            <td>'.$r->nama_perusahaan.'</td>
                                            <td>'.$r->status_perusahaan.'</td>
                                            <td>'.$r->tanggal.'</td>
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
</div>
</section>