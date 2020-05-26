<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="<?=base_url()?>assets/siswa/css/font-face.css" rel="stylesheet" media="all">
    <link href="<?=base_url()?>assets/siswa/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?=base_url()?>assets/siswa/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?=base_url()?>assets/siswa/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?=base_url()?>assets/siswa/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?=base_url()?>assets/siswa/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?=base_url()?>assets/siswa/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?=base_url()?>assets/siswa/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?=base_url()?>assets/siswa/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?=base_url()?>assets/siswa/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="<?=base_url()?>assets/siswa/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?=base_url()?>assets/siswa/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?=base_url()?>assets/siswa/css/theme.css" rel="stylesheet" media="all">
    <script src="<?=base_url()?>assets/siswa/vendor/jquery-3.2.1.min.js"></script>

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img class="logo-kerjoin" src="<?=base_url()?>assets/siswa/images/kerjoin2.png" alt="" width="220px"/>
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="<?=base_url('index.php/Home_siswa/index')?>">
                            <i class="fas fa-tachometer-alt"></i>Home</a>
                        </li>
                        <li class="active has-sub">
                            <a class="js-arrow" href="<?=base_url('index.php/Get_perusahaan/rpl')?>">
                            <i class="fas fa-tachometer-alt"></i>RPL</a>
                        </li>
                        <li class="active has-sub">
                            <a class="js-arrow" href="<?=base_url('index.php/Get_perusahaan/tkj')?>">
                            <i class="fas fa-tachometer-alt"></i>TKJ</a>
                        </li>
                        
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP--> 
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="<?php echo base_url(); ?>index.php/Get_perusahaan/cari" method="post">
                                <input class="au-input au-input--xl" type="text" name="nama_perusahaan" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity" id="bunder"></span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="" id="notif">
                                               
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="" id="centang"></i>
                                                </div>
                                                <div class="" >
                                                <h5 id="notif"></h5>
                                                <p style="margin-top:-5px;" id="isi"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">

                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><span class="profile-text"><?php echo $this->session->userdata('username'); ?></span></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                    
                                            <div class="account-dropdown__footer">
                                                <a href="<?php echo base_url() ?>index.php/Login_siswa/Logout">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- MAIN CONTENT-->
                      <?php $this->load->view($content_view);?>

    <!-- Jquery JS-->
    <!-- Bootstrap JS-->
    <script src="<?=base_url()?>assets/siswa/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?=base_url()?>assets/siswa/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="<?=base_url()?>assets/siswa/vendor/slick/slick.min.js">
    </script>
    <script src="<?=base_url()?>assets/siswa/vendor/wow/wow.min.js"></script>
    <script src="<?=base_url()?>assets/siswa/vendor/animsition/animsition.min.js"></script>
    <script src="<?=base_url()?>assets/siswa/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="<?=base_url()?>assets/siswa/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="<?=base_url()?>assets/siswa/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="<?=base_url()?>assets/siswa/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?=base_url()?>assets/siswa/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?=base_url()?>assets/siswa/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="<?=base_url()?>assets/siswa/vendor/select2/select2.min.js">
    </script> 

    <!-- Main JS-->
    <script src="<?=base_url()?>assets/siswa/js/main.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        notif();
    });
        function notif(){
      $.getJSON("<?php echo base_url() ?>index.php/Permintaan_siswa/notif", function(data){
            $("#notif").html("Permintaan anda telah diterima");
            $("#isi").html(data.nama_perusahaan+" Telah menerima Anda!");
            $("#centang").html(
                "<i class='fa fa-check adminpro-checked-pro admin-check-pro' aria-hidden='true'></i>"
            )
            $('#centang').addClass('notification-icon');
            $('#bunder').addClass('indicator-nt');
        })
        }
        </script>

</body>

</html>
<!-- end document-->
