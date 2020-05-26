
                            <div class="col-lg-12">
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                            <tr>
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
                                </div>
                            </div>
                          
