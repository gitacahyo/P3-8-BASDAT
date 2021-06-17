<?php
    session_start();
    include "koneksi.php";

    //sudah login? direct ke dashboard
    if( isset($_SESSION["login"]) ){
      header("Location: dashboard.php");
      exit;
    }

    //koneksi ke dashboard
    if (isset($_POST['fmasuk'])) {
        $username = $_POST['fusername'];
        $password = $_POST['fpassword'];
        $result = mysqli_query($koneksi, "SELECT * FROM user
                                        WHERE username = '$username'");
                                        //AND password = '$password
        //cek username
        if ( mysqli_num_rows($result) ===1 ) {
          //cek password
          $row = mysqli_fetch_assoc($result);
          if( password_verify($password,$row["password"])  ){
            //set session
            $_SESSION["login"] = true;
            $_SESSION["user"] = $row["nama_lengkap"];

            header("Location: dashboard.php");
          }
        }
        $error = true;
      ///  else {
      ///      echo "Maaf username dan password anda tidak sesuai! Harap coba lagi.";
      ///  }

    }
?>


<!DOCTYPE html>
<html>
<head>
<title> Login SKINEY.CO </title>
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
    <h1 class="teal"> <center> Halaman Login SKINEY.CO </center> </h1>

    <!-- ngasih tau kalau ada yang error-->
    <?php if( isset($error) ) : ?>
      <p style="font-weight:bold; color:red">Username / Password salah</p>
    <?php endif; ?>

        <label for="username">Username: </label> <br>
		      <input type="text" name="fusername" id="fusername" placeholder="Masukkan username anda"> <br> <br>
        <label for="password"> Sandi: </label>
          <input type="password" name="fpassword" id="fpassword" placeholder="Masukkan sandi anda"> <br> <br>
        <p class="btn">
            <button class="btn first" type="submit" name="fmasuk"> Login </button> <br> <br>
		</p>
    </form>
    <form action="registrasi.php">
      <h4>Belum Mendaftar?</h4>
      <button type="submit" class="btn btn-primary">Daftar</button> <br> </br>
    </form>
</body>
</html>
