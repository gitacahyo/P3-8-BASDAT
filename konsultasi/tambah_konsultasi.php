<?php
$conn = mysqli_connect("localhost", "root", "", "joco");


//cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
    //ambil data dari tiap elemen dalam form
    $jenis_konsultasi = $_POST["jenis_konsultasi"];
    $tanggal_konsultasi = $_POST["tanggal_konsultasi"];
    $dokter_pj = $_POST["dokter_pj"];
    $waktu_mulai = $_POST["waktu_mulai"];
    $waktu_selesai = $_POST["waktu_selesai"];
    $catatan_konsultasi = $_POST["catatan_konsultasi"];

//query insert data
    $query = "INSERT INTO konsultasi VALUES
                    ('', 
                    '$jenis_konsultasi', 
                    '$tanggal_konsultasi', 
                    '$dokter_pj', 
                    '$waktu_mulai', 
                    '$waktu_selesai', 
                    '$catatan_konsultasi')";
    mysqli_query($conn, $query);

//cek keberhasilan input data
    if( mysqli_affected_rows($conn) > 0) {
        echo "
            <script> 
                alert('Berhasil menambahkan riwayat konsultasi!');
                document.location.href = 'daftar_konsultasi.php';
            </script>
            ";
    } else {
        echo "<script> 
        alert('Gagal menambahkan riwayat konsultasi! Periksa kembali!');
        document.location.href = 'daftar_konsultasi.php';
    </script>
    ";
    }
    
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Konsultasi</title>
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
        .tambah {
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
<div class="tambah">
<h1 class="teal"> <center> Tambah Data Konsultasi </center> </h1>
    <form action="" method="post">
        <ul>
            <p class="teal">
			<label for="jenis_konsultasi"><b>Jenis Konsultasi</b></label> <br>
			<label><input type="radio" name="jenis_konsultasi" value="Dalam Jaringan" required> Dalam Jaringan</label>
			<label><input type="radio" name="jenis_konsultasi" value="Luar Jaringan" required> Luar Jaringan</label>
            </p>
            <p class="teal">
                <label for="tanggal_konsultasi"><b>Tanggal Konsultasi</b></label>
                <input type="date" name="tanggal_konsultasi" id="tanggal_konsultasi" required> 
            </p>
            <p class="teal">
                <label for="dokter_pj"><b>Dokter Penanggung Jawab</b></label>
                <input type="text" name="dokter_pj" id="dokter_pj" required>
            </p>
            <p class="teal">
                <label for="waktu_mulai"><b>Waktu Mulai</b></label>
                <input type="time" name="waktu_mulai" id="waktu_mulai">
            </p>
            <p class="teal">
                <label for="waktu_selesai"><b>Waktu Selesai</b></label>
                <input type="time" name="waktu_selesai" id="waktu_selesai">
            </p>
            <p class="teal">
                <label for="catatan_konsultasi"><b>Catatan Konsultasi</b></label>
                <input type="text" name="catatan_konsultasi" id="catatan_konsultasi">
            </p>
            <p class="btn">
            <button class="btn first" type="submit" name="submit"> Tambah data konsultasi </button>

        </ul>
    </form>
</div>
</body>
</html>