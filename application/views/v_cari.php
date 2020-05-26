<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h2 class="daftar" style="text-align: center;">DAFTAR PERUSAHAAN</h2>
					<?php if($this->session->flashdata('pesan')!=null): ?>
                                <div class= "alert alert-success"><?= $this->session->flashdata('pesan');?></div>
                                <?php endif?>
				</div>
                <?php
                foreach ($perusahaan as $p){?>
				<div class="col-md-12">
			  		<div class="row" id="lihat_perusahaan">
                      <div class="col-md-4" >
				<div class="card">
					<div class="card-header">
						<strong class="card-title"><?php echo $p->nama_perusahaan ?></strong>
					</div>
						<div class="card-body">
							<div class="mx-auto d-block">
								<img style="height:165px;width:210px;" src="<?=base_url('assets/images/perusahaan/')?><?php echo $p->gambar ?>" alt="Card image cap"><br><br>
								<p class="card-text"><?php echo $p->deskripsi ?></p><br>
								<p class="card-text"><?php echo $p->kuota ?></p><br>
								<a href="<?=base_url()?>index.php/Permintaan_siswa/card/<?php echo $p->id_perusahaan ?>" class="thumbnail text-center">Persyaratan</a>
							</div>
						</div>
					</div>
				</div> 
                <?php
                }
                ?>
			</div>
			  		</div>
					  <div> 
					  </div>
				</div> 
			</div>
		</div>
	</div>
</div>