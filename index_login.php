<?

// Use session variable on this page. This function must put on the top of page.

session_start();



////// Login Section.

$Login=$_POST['login'];

if($Login){ 

	$username=$_POST['user'];

	$password=md5(trim(str_replace("\n","",$_POST['pass'])));
	$checkpassword=trim(str_replace("\n","",$_POST['pass']));



	// Connect database.

	require('connection.php');

	connectdatabase();


    $sql="SELECT * FROM user WHERE username='$username' and password='$password'";
    $res=mysql_query($sql);
    $jum=mysql_num_rows($res);

    if($jum>0){

        ?>
        <script>

            window.location="admin.php?module=operator_weight";
</script>
        <?php

    }else{

               ?>
        <script>

            window.location="admin.php?module=operator_weight";
</script>

<?php

    }
	
}
?>








<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8">
    <title>warehouse management system</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="Sigit Warsono">
    <meta name="author" content="Sigit Warsono" />


    <!-- favicon -->
    <link rel="shortcut icon" href="assets/img/logo.png" />

    <!-- Bootstrap 3.3.2 -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="assets/plugins/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="assets/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="assets/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

</head>

<body class="login-page bg-login">
    <?php
	$koneksi_alert=$_GET['koneksi'];
	if($koneksi_alert==1){
	?>
    <div class="alert alert-primary" role="alert">
        &nbsp;<h1> MOHON MAAF INTERNET MATI, SILAHKAN DIPROSES ULANG</h1>
    </div>
    <?php 
	}
	?>
    <div class="login-box">
        <div style="color:#3c8dbc" class="login-logo">
            <img style="margin-top:-12px" src="assets/img/logo.png" alt="Logo" height="20" width="30"> <b
                style="font-size: 20px;">Warehouse
                Management System</b>
        </div><!-- /.login-logo -->
        <?php  
      // fungsi untuk menampilkan pesan
      // jika alert = "" (kosong)
      // tampilkan pesan "" (kosong)
      if (empty($_GET['alert'])) {
        echo "";
      } 
      // jika alert = 1
      // tampilkan pesan Gagal "Username atau Password salah, cek kembali Username dan Password Anda"
      elseif ($_GET['alert'] == 1) {
        echo "<div class='alert alert-danger alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4>  <i class='icon fa fa-times-circle'></i> Gagal Login!</h4>
                Username atau Password salah, cek kembali Username dan Password Anda.
              </div>";
      }
      // jika alert = 2
      // tampilkan pesan Sukses "Anda telah berhasil logout"
      elseif ($_GET['alert'] == 2) {
        echo "<div class='alert alert-success alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
                Anda telah berhasil logout.
              </div>";
      }
      ?>



        <div class="login-box-body">
            <p class="login-box-msg"><i class="fa fa-user icon-title"></i> Silahkan Login</p>
            <br />
            <form name="form1" action="" method="POST">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="user" placeholder="Username" autocomplete="off"
                        required />
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="pass" placeholder="Password" required />
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                </div>
                <br />

                <div class="row">
                    <div class="col-xs-12">
                        <input type="submit" class="btn btn-primary btn-lg btn-block btn-flat" name="login"
                            value="Login" />

                    </div><!-- /.col -->
                </div>
                <a href="ganti_password.php">ganti password</a>
            </form>

        </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.3 -->
    <script src="assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

</body>

</html>