<?php
    session_start();
    include "koneksi.php";
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
        <label for="username">Username: </label> <br> 
		<input type="text" name="fusername" placeholder="Masukkan username anda" required/> <br> <br>
        <label for="password"> Sandi: </label> 
        <input type="password" name="fpassword" id="password" placeholder="Masukkan sandi Anda" required> <br> <br>
        <p class="btn">
            <button class="btn first" type="submit" name="fmasuk"> Login </button> <br> <br>
		</p>
    </form>
<!-- //koneksi ke dashboard  -->
    <?php
        if (isset($_POST['fmasuk'])) {
            $username = $_POST['fusername'];
            $password = $_POST['fpassword'];
            $qry = mysqli_query($koneksi, "SELECT * FROM user 
                                            WHERE username = '$username' 
                                            AND password = md5('$password')");
            $cek = mysqli_num_rows($qry);
            if ($cek==1) {
                $_SESSION['userweb']=$username;
                header ("location:dashboard.php");
                exit;
            }
            else {
                echo "Maaf username dan password anda tidak sesuai! Harap coba lagi.";
            }

        }
    ?>
</body>
</html>