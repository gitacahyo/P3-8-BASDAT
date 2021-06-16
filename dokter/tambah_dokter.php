<?php
$conn = mysqli_connect("localhost", "root", "", "joco");

//cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
    //ambil data dari tiap elemen dalam form
    $nama_dokter = $_POST["nama_dokter"];
    $email = $_POST["email"];
    $biaya_konsultasi = $_POST["biaya_konsultasi"];

    //query insert data
    $query = "INSERT INTO dokter_spkk VALUES
                    ('', 
                    '$nama_dokter', 
                    '$email', 
                    '$biaya_konsultasi')";
    mysqli_query($conn, $query);

    //cek keberhasilan input data
    if( mysqli_affected_rows($conn) > 0) {
        echo "
            <script> 
                alert('Berhasil menambahkan data dokter!');
                document.location.href = 'daftar_dokter.php';
            </script>
            ";
    } else {
        echo "<script> 
        alert('Gagal menambahkan data dokter!');
        document.location.href = 'daftar_dokter.php';
    </script>
    ";
    }
    
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Dokter</title>
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
        input[type=text] {
            margin: 4px auto;
            width: 80%;
            height: 25px;
            padding: auto;
            position: center;
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
    <h1 class="teal"> <center> Tambah Data Dokter </center> </h1>
    <form action="" method="post">
        <ul>
            <p>
                <label for="nama_dokter">Nama Dokter</label> <br>
                <input type="text" name="nama_dokter" id="nama_dokter" placeholder="Masukkan nama dokter" required>
            </p >
            <p>
                <label for="email">Email</label> <br>
                <input type="text" name="email" id="email" placeholder="Masukkan email dokter" required>
            </p>
            <p>
                <label for="biaya_konsultasi">Biaya Konsultasi</label> <br>
                <input type="text" name="biaya_konsultasi" id="biaya_konsultasi" placeholder="Masukkan biaya konsultasi e.g xxx.xxx - xxx.xxx" required> 
            <p class="btn">
            <button class="btn first" type="submit" name="submit"> Tambah data dokter </button>
            </p>
        </ul>

    </form>


</div>
</body>





</html>