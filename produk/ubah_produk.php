<?php
require '../functions.php';
$koneksi = mysqli_connect("localhost", "root", "", "joco");

//ambil data di URL
$id = $_GET["id"];

//query data konsultasi berdasarkan id
$produk = query("SELECT * FROM produk WHERE id = $id")[0];


//cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
//ambil data dari tiap elemen dalam form
        $nama_produk = $_POST["nama_produk"];
        $jenis_produk = $_POST["jenis_produk"];
        $no_bpom = $_POST["no_bpom"];
        $bahan_aktif = $_POST["bahan_aktif"];
        $keterangan = $_POST["keterangan"];
        $id_user = $_POST["id_user"];

//cek keberhasilan UBAH data
    if( ubahproduk($_POST) > 0) {
        echo "
            <script> 
                alert('Berhasil mengubah data!');
                document.location.href = 'daftar_produk.php';
            </script>
            ";
    } 
    else {
        echo "<script> 
        alert('Gagal mengubah data! Periksa kembali!');
        document.location.href = 'daftar_produk.php';
    </script>
    ";
    }
    
}



?>


<!DOCTYPE html>
<html>
<head>
    <title>Ubah Data Produk</title>
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
<h1 class="teal"> <center> Ubah Data Produk </center> </h1>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $produk["id"]; ?>">
        <ul>
            <p class="teal">
                <label for="nama_produk"><b>Nama Produk</b></label>
                <input type="text" name="nama_produk" id="nama_produk" required value="<?php echo $produk['nama_produk'] ?>" />
            </p>
            <p class="teal">
                <label for="jenis_produk"><b>Jenis Produk</b></label>
                <input type="text" name="jenis_produk" id="jenis_produk" required value="<?php echo $produk['jenis_produk'] ?>" />
            </p>
            <p class="teal">
                <label for="no_bpom"><b>Nomor BPOM</b></label>
                <input type="text" name="no_bpom" id="no_bpom" required value="<?php echo $produk['no_bpom'] ?>" />
            </p>
            <p class="teal">
                <label for="bahan_aktif"><b>Bahan Aktif</b></label>
                <input type="text" name="bahan_aktif" id="bahan_aktif" required value="<?php echo $produk['bahan_aktif'] ?>" />
            </p>
            <p class="teal">
                <label for="keterangan"><b>Keterangan</b></label>
                <input type="text" name="keterangan" id="keterangan" required value="<?php echo $produk['keterangan'] ?>" />
            </p>
            <p class="teal">
                <label for="id_user"><b>ID User</b></label>
                <input type="text" name="id_user" id="id_user" required value="<?= $produk["id_user"]; ?>"/>
            </p>
            <p class="btn">
            <button class="btn first" type="submit" name="submit"> Ubah data produk </button>

        </ul>
    </form>
</div>
</body>
</html>