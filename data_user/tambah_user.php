<?php
$conn = mysqli_connect("localhost", "root", "", "joco");

//cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
    //ambil data dari tiap elemen dalam form
    $nama_lengkap = $_POST["nama_lengkap"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $password2 = $_POST["password2"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $jenis_kulit = $_POST["jenis_kulit"];

    //query insert data
    $query = "INSERT INTO user VALUES
                    ('', 
                    '$nama_lengkap', 
                    '$username', 
                    '$password',
                    '$jenis_kelamin',
                    '$jenis_kulit')";
    mysqli_query($conn, $query);

    //cek keberhasilan input data
    if( mysqli_affected_rows($conn) > 0) {
        echo "
            <script> 
                alert('Berhasil menambahkan data user!');
                document.location.href = 'daftar_user.php';
            </script>
            ";
    } else {
        echo "<script> 
        alert('Gagal menambahkan data user!');
        document.location.href = 'daftar_user.php';
    </script>
    ";
    }
    
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data User</title>
    <style>
        body {
            font-family: sans-serif;
            background: url('../bg.jpg');
            background-position: center;
            background-size: cover;
            height: auto;
            transition: all .5s;
        }
        .tambah {
            margin: 170px auto;
            width: 400px;
            padding: 4px;
            background: rgb(194, 218, 216);
            border: 3px solid white;
            border-radius: 25px;
        }
        input[type=text], input[type=password] {
            margin: 4px auto;
            width: 80%;
            height: 25px;
            padding: auto;
            position: center;
        }
        input[type=radio] {
            width: 14%;
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
            margin: 2px 20px 0px 0px;
            padding: 7px 16px 7px 16px;
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
<div class="tambah">
    <h1 class="teal"> <center> Tambah Data User </center> </h1>
    <form action="" method="post">
        <ul>
            <p>
                <label for="nama_lengkap">Nama Lengkap</label> <br>
                <input type="text" name="nama_lengkap" id="nama_lengkap" placeholder="Masukkan nama lengkap user" required>
            </p>
            <p>
                <label for="username">Username</label> <br>
                <input type="text" name="username" id="username" placeholder="Masukkan username" required>
            </p>
            </p>
            <p>
            <label for="password"> Sandi: </label> <br>
            <input type="password" name="password" id="password" placeholder="Masukkan sandi" required>
            </p>
            <p>
            <label for="password2"> Konfirmasi Sandi: </label> <br>
            <input type="password" name="password2" id="password2" placeholder="Masukkan ulang sandi" required>
            </p>
		    <p>
            <p>
			<label for="jenis_kelamin">Jenis Kelamin: </label> <br>
			<label><input type="radio" name="jenis_kelamin" value="Laki-laki" required> Laki-laki</label>
			<label><input type="radio" name="jenis_kelamin" value="Perempuan" required> Perempuan</label>
    		</p>
            <p>
                <label for="jenis_kulit">Jenis Kulit</label> <br>
                <input type="text" name="jenis_kulit" id="jenis_kulit" placeholder="Masukkan jenis kulit user" required> 
            <p class="btn">
            <button class="btn first" type="submit" name="submit"> Tambah data user </button>
            </p>
        </ul>

    </form>


</div>
</body>





</html>