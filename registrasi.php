<?php
    session_start();
    include "koneksi.php";
    include "functions.php";

    //sudah login? direct ke dashboard
    if( isset($_SESSION["login"]) ){
      header("Location: dashboard.php");
      exit;
    }

    //koneksi ke database untuk register
    if (isset($_POST['daftar'])) {
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $pwd = $_POST['pwd'];
        $pwd2 = $_POST['pwd2'];
        $jeklam = $_POST['jeklam'];
        $jekul= $_POST['jekul'];

        //cek apakah data tidak diisi
        isEmpty($nama);
        isEmpty($username);
        isEmpty($pwd);
        isEmpty($pwd2);
        isEmpty($jeklam);
        isEmpty($jekul);

        $result = mysqli_query($koneksi, "SELECT * FROM user
                                        WHERE username = '$username'");
                                        //AND password = '$password

        //cek username sudah ada atau belum
        if ( mysqli_num_rows($result) > 0 ) {
          echo "<script>
            alert('Username sudah terdaftar!');
            location.href = location.href;
          </script>";
          return false;
        }

        //cek konfirmasi password2
        if( $pwd!== $pwd2){
          echo"<script>
            alert('Konfirmasi password tidak sama!');
            location.href = location.href;
          </script>";
          return false;
        }

        $pcrypt = password_hash($_POST['pwd'], PASSWORD_DEFAULT);

        $query = mysqli_query($koneksi, "INSERT INTO user
          (nama_lengkap, username, password, jenis_kelamin, jenis_kulit)
        VALUES
          ('$nama', '$username', '$pcrypt', '$jeklam', '$jekul' )");


        if( $query==TRUE ) {
          // kalau berhasil alihkan ke halaman index.php dengan status=sukses
          echo "<script>alert('Registrasi berhasil! Silahkan login.'); window.location = 'index.php'</script>";
        } else {
          // kalau gagal alihkan ke halaman indek.ph dengan status=gagal
          echo "<script>alert('Registrasi gagal, mohon coba kembali.'); window.location = 'registrasi.php'</script>";
        }

      }
?>


<!DOCTYPE html>
<html>
<head>
<title> Register SKINEY.CO </title>
    <meta charset="utf-8">
    <style type="text/css">
        body {
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            background: url('bg.jpg');
            background-position: center;
            background-size: cover;
            height: 100%;
            background-repeat: no-repeat;
            transition: all .5s;
            }
        .login {
            margin: 165px auto;
            width: 400px;
            padding: 5px;
            background: rgb(194, 218, 216);
            border: 3px solid white;
            border-radius: 15px;
        }
        input[type=text], input[type=password] {
            margin: 5px auto;
            width: 98%;
            height: 25px;
            padding: auto;
            border-radius: 0.6em;
        }
        input[type=submit] {
            float: right;
            padding: 5px;
            width: 90px;
            border: 1px solid #fff;
            color: #fff;
            background: rgb(18, 90, 90);
            cursor: hand;
        }
        .teal {
            color: rgb(18, 90, 90);
        }
        .btn {
            box-sizing:border-box;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-color: transparent;
            border-radius: 0.6em;
            color: #2b6974;
            cursor: pointer;
            /* display: flex; */
            align-self: center;
            font-size: 1rem;
            font-weight: 400;
            width: 392px;
            margin: 0.2px;
            padding: 5px;
            text-decoration: none;
            text-align: center;
            text-transform: uppercase;
            font-family: 'Calibri', sans-serif;
            font-weight: 400;
        }
        .btn:hover, .btn:focus {
            color: #fff;
            outline: 0;
        }
        .first {
            border-color: #2b6974;
            color: teal;
            background-image: linear-gradient(45deg, #2b6974 50%, transparent 50%);
            background-position: 100%;
            background-size: 400%;
            transition: background 300ms ease-in-out;
        }
        .first:hover {
            background-position: 0;
        }


    </style>
    <!-- //ganti ikon tab website  -->
    <link href='logo_fix.png' rel='shortcut icon'>


</head>
<body>
    <form method="post">
    <div class="login">
    <h1 class="teal"> <center> Registrasi SKINEY.CO </center> </h1>
        <label for="nama">Nama: </label> <br>
		      <input type="text" name="nama" id="nama" placeholder="Masukkan nama lengkap anda"> <br> <br>
        <label for="username"> Username: </label>
          <input type="text" name="username" id="username" placeholder="Masukkan username untuk login anda"> <br> <br>
        <label for="pwd">Password: </label> <br>
          <input type="password" name="pwd" id="pwd" placeholder="Masukkan sandi Kembali"> <br> <br>
        <label for="pwd2"> Sandi: </label>
          <input type="password" name="pwd2" id="pwd2" placeholder="Masukkan sandi anda kembali"> <br> <br>
        <label for="jeklam">Jenis Kelamin: </label>
          <input type="radio" name="jeklam" value="laki-laki"> Laki-laki
          <input type="radio" name="jeklam" value="perempuan"> Perempuan <br> <br>
        <label for="jekul">Jenis Kulit: </label>
          <input type="text" name="jekul" id="jekul" placeholder="Masukkan jenis kulit anda"> <br> <br>

        <p class="btn">
            <button class="btn first" type="submit" name="daftar">Register </button> <br> <br>
		</p>
    </form>
    <form action="index.php">
      <h4>Sudah Mendaftar?</h4>
      <button type="submit" class="btn btn-primary">Login</button> <br> </br>
    </form>
</body>
</html>
