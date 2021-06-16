<?php 
require 'C:/xampp/htdocs/jo&co-web/functions.php';
$user = query("SELECT * FROM user");
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User</title>
    <style>
        .warnakita {
            color: #04376e;
        }
        .putih {
            color: #FFFFFF;
        }
        body {
            font-family: sans-serif;
            background: url('../bg.jpg');
            background-position: center;
            background-size: cover;
            height: auto;
            transition: all .5s;
        }
        .table1 {
            font-family: sans-serif;
            color: #444;
            border-collapse: collapse;
            /* width: auto; */
            height: 400px;
            border: 1px solid #D2f5f7;
        }
        .table1 tr th {
            background: #04376e;
            color: #fff;
            font-weight: normal;
        }
        .table1, th, td {
            padding: 8px 20px;
            text-align: center;
            background-color: #f2f2f2;
        }
        .table1 tr:hover {
            background-color: #f2f2f2;
        }
        .table1 tr:nth-child(even) {
            background-color: #f2f2f2;
        }

    </style>
    <!-- //ganti ikon tab website  -->
    <link href='../logo_fix.png' rel='shortcut icon'>
    
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

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
                    <a href="../dashboard.php">
                        <b> SKINEY.CO </b>
                    </a>
                </li>
                <li>
                    <a href="../data_user/daftar_user.php">User</a>
                </li>
                <li>
                    <a href="../produk/daftar_produk.php">Produk</a>
                </li>
                <li>
                    <a href="../dokter/daftar_dokter.php">Dokter</a>
                </li>
                <li>
                    <a href="../konsultasi/daftar_konsultasi.php">Konsultasi</a>
                </li>
                <li>
                <a href="../logout.php" onclick="return confirm('Apakah Anda yakin ingin keluar?');"> Logout </a>              
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="warnakita">Data User</h1>
                        <a href="tambah_user.php"> Tambah Data User </a>
                        <br><br>

                        <table class="table1" border="1">
                            <tr>
                                <th width="50px"> <center> <b> No. </b> </center> </th>
                                <th width="100px"> <center> <b> Aksi </b> </center> </th>
                                <th width="150px"> <center> <b> Nama Lengkap </b> </center> </th>
                                <th width="150px"> <center> <b> Username </b> </center> </th>
                                <th width="150px"> <center> <b> Jenis Kelamin </b> </center> </th>
                                <th width="250px"> <center> <b> Jenis Kulit </b> </center> </th>
                            </tr>
                            <?php $i = 1; ?>
                            <?php foreach($user as $row) : ?>
                            <tr>
                                <td> <?= $i ?> </td>
                                <td>
                                    <a href="ubah_user.php?id=<?= $row["id"]; ?>"> Ubah </a> |
                                    <a href="hapus_user.php?id=<?= $row["id"]; ?>"> Hapus </a>              
                                </td>
                                <td> <?= $row["nama_lengkap"]; ?> </td>
                                <td> <?= $row["username"]; ?> </td>
                                <td> <?= $row["jenis_kelamin"]; ?> </td>
                                <td> <?= $row["jenis_kulit"] ?> </td>
                            </tr>
                            <?php $i++; ?>
                            <?php endforeach; ?>


</table>
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