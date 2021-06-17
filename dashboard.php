<?php
session_start();

include('C:/xampp/htdocs/jo&co-web/functions.php');
//require 'C:/xampp/htdocs/jo&co-web/functions.php';
$produk = query("SELECT * FROM produk");
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>
    <style>
        .warnakita {
            color: #04376e;
        }
        .putih {
            color: #FFFFFF;
        }
        body {
            font-family: sans-serif;
            background: url('bg.jpg');
            background-position: center;
            /* background-size: cover; */
            height: 150%;
            transition: all .5s;
        }
    </style>
    <!-- //ganti ikon tab website  -->
    <link href='logo_fix.png' rel='shortcut icon'>

    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="bootstrap/css/simple-sidebar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="dashboard.php">
                        <b> SKINEY.CO </b>
                    </a>
                </li>
                <br></br>
                <li>
                    <a href="data_user/daftar_user.php">User</a>
                </li>
                <li>
                    <a href="produk/daftar_produk.php">Produk</a>
                </li>
                <li>
                    <a href="dokter/daftar_dokter.php">Dokter</a>
                </li>
                <li>
                    <a href="konsultasi/daftar_konsultasi.php">Konsultasi</a>
                </li>
                <li>
                <a href="logout.php" onclick="return confirm('Apakah Anda yakin ingin keluar?');"> Logout </a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="warnakita"> <b> Selamat Datang di Web SKINEY.CO! <b> </h1>
                        <h4 class="warnakita"> Jelajahi kebutuhan kulitmu dan dapatkan pengalaman terbaik untuk perawatan kulit sehatmu. </h4>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
