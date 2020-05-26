<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                        <br>
                        <br>
                        </div>
                        <div class="login-form">
                            <form action="<?php echo base_url() ?>index.php/Permintaan_siswa/create" method="post" enctype="multipart/form-data">
                            <div class="syarat">Persyaratan</div>   
                            <div class="form-group">
                                    <label>Upload CV</label>
                                    <input class="au-input au-input--full" type="file" name="cv"><br>
                                </div>
                                <div class="form-group">
                                    <label>Pilihan Perusahaan</label>
                                    <select name="status_pilihan" id="status_pilihan">
                                    <option value="1">Pilihan 1</option>
                                    <option value="2">Pilihan 2</option>
                                    <option value="3">Pilihan 3</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input class="au-input au-input--full" type="hidden" name="id_perusahaan" value="<?=$id_perusahaan?>">
                                    <input class="au-input au-input--full" type="hidden" name="id_siswa" value="<?php echo $this->session->userdata('id_siswa'); ?>">
                                </div>

                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">KIRIM</button>
                                <div class="social-login-content">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
