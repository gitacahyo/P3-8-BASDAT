<?php
require '../functions.php';
$koneksi = mysqli_connect("localhost", "root", "", "joco");

//ambil data di URL
$id = $_GET["id"];

//query data user berdasarkan id
$user = query("SELECT * FROM user WHERE id = $id")[0];


//cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
    //ambil data dari tiap elemen dalam form
    $nama_lengkap = $_POST["nama_lengkap"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $password2 = $_POST["password2"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $jenis_kulit = $_POST["jenis_kulit"];

//cek keberhasilan UBAH data
    if( ubahuser($_POST) > 0) {
        echo "
            <script> 
                alert('Berhasil mengubah data!');
                document.location.href = 'daftar_user.php';
            </script>
            ";
    } else {
        echo "<script> 
        alert('Gagal mengubah data! Periksa kembali!');
        document.location.href = 'daftar_user.php';
    </script>
    ";
    }
    
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Ubah Data User</title>
    <style>
        body {
            font-family: sans-serif;
            background: url('../bg.jpg');
            background-position: center;
            background-size: cover;
            /* background-repeat: no-repeat; */
            height: 600px;
            transition: all .5s;
        }
        .ubah {
            margin: 100px auto;
            width: 400px;
            padding: 4px;
            background: rgb(194, 218, 216);
            border: 3px solid white;
            border-radius: 25px;
        }
        input[type=text], input[type=date], input[type=time] {
            margin: 4px auto;
            width: 87%;
            height: 29px;
            padding: 0px;
            position: center;
            border-radius: 5px;
        }
        input[type="radio"] {
            /* margin: 4px auto; */
            width: 10%;
            height: 15px;
            /* padding: auto;
            position: right; */
        }
        input[type=submit] {
            float: right;
            margin: 4px auto;
            padding: auto;
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
            /* border: 2px solid #e74c3c; */
            border-radius: 0.6em;
            color: #2b6974;
            cursor: pointer;
            /* display: flex; */
            align-self: center;
            font-size: 1rem;
            font-weight: 400;
            width: 320px;
            margin: 0px 10px 0px 0px;
            padding: 7px 0px 7px 0px;
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
            transition: background 400ms ease-in-out;
        }
        .first:hover {
            background-position: 0;
        }
    </style>
    <!-- //ganti ikon tab website  -->
    <link href='../logo_fix.png' rel='shortcut icon'>
</head>
<body>
<div class="ubah">
<h1 class="teal"> <center> Ubah Data User </center> </h1>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $user["id"]; ?>">
        <ul>
            <p class="teal">
            <p>
                <label for="nama_lengkap">Nama Lengkap</label> <br>
                <input type="text" name="nama_lengkap" id="nama_lengkap" placeholder="Masukkan nama lengkap user" required value="<?= $user["nama_lengkap"]; ?>"/>
            </p>
            <p>
                <label for="username">Username</label> <br>
                <input type="text" name="username" id="username" placeholder="Masukkan username" required value="<?= $user["username"]; ?>"/>
            </p>
            </p>
            <p>
            <label for="password"> Sandi: </label> <br>
            <input type="password" name="password" id="password" placeholder="Masukkan sandi" required value="<?= $user["password"]; ?>"/>
            </p>
            <p>
            <label for="password2"> Konfirmasi Sandi: </label> <br>
            <input type="password" name="password2" id="password2" placeholder="Masukkan ulang sandi" required value="<?= $user["password2"]; ?>"/>
            </p>
		    <p>
			<label for="jenis_kelamin"><b>Jenis Kelamin</b></label> <br>
            <?php $jenis_kelamin = $user['jenis_kelamin']; ?>
            <label><input type="radio" name="jenis_kelamin" value="Laki-laki" <?php echo ($jenis_kelamin == 'Laki-laki') ? "checked": "" ?>> Laki-laki </label>
            <label><input type="radio" name="jenis_kelamin" value="Perempuan" <?php echo ($jenis_kelamin == 'Perempuan') ? "checked": "" ?>> Perempuan </label>
            </p>
            <p>
                <label for="jenis_kulit">Jenis Kulit</label> <br>
                <input type="text" name="jenis_kulit" id="jenis_kulit" placeholder="Masukkan jenis kulit user" required value="<?= $user["jenis_kulit"]; ?>"/> 
            <p class="btn">
            <button class="btn first" type="submit" name="submit"> Ubah data user </button>

        </ul>
    </form>
</div>
</body>
</html>