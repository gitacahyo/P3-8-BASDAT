<?php
$conn = mysqli_connect("localhost", "root", "", "joco");

//cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
    //ambil data dari tiap elemen dalam form
    $nama_produk = $_POST["nama_produk"];
    $jenis_produk = $_POST["jenis_produk"];
    $no_bpom = $_POST["no_bpom"];
    $bahan_aktif = $_POST["bahan_aktif"];
    $keterangan = $_POST["keterangan"];
    $id_user = $_POST["id_user"];

    //query insert data
    $query = "INSERT INTO produk VALUES
                    ('', 
                    '$nama_produk', 
                    '$jenis_produk', 
                    '$no_bpom', 
                    '$bahan_aktif', 
                    '$keterangan',
                    '$id_user')";
    mysqli_query($conn, $query);

    //cek keberhasilan input data
    if( mysqli_affected_rows($conn) > 0) {
        echo "
            <script> 
                alert('Berhasil menambahkan produk!');
                document.location.href = 'daftar_produk.php';
            </script>
            ";
    } else {
        echo "<script> 
        alert('Gagal menambahkan produk!');
        document.location.href = 'daftar_produk.php';
    </script>
    ";
    }
    
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Produk</title>
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
            margin: 100px auto;
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
    <h1 class="teal"> <center> Tambah Data Produk </center> </h1>
    <form action="" method="post">
        <ul>
            <p>
                <label for="nama_produk">Nama Produk</label> <br>
                <input type="text" name="nama_produk" id="nama_produk" placeholder="Masukkan nama produk" required>
            </p >
            <p>
                <label for="jenis_produk">Jenis Produk</label> <br>
                <input type="text" name="jenis_produk" id="jenis_produk" placeholder="Masukkan jenis produk" required>
            </p>
            <p>
                <label for="no_bpom">Nomor BPOM</label> <br>
                <input type="text" name="no_bpom" id="no_bpom" placeholder="Masukkan nomor BPOM" required> 
            </p>
            <p>
                <label for="bahan_aktif">Bahan Aktif</label> <br>
                <input type="text" name="bahan_aktif" id="bahan_aktif" placeholder="Masukkan bahan-bahan aktif yang terkandung" required>
            </p>
            <p>
                <label for="keterangan">Keterangan</label> <br>
                <input type="text" name="keterangan" id="keterangan" placeholder="Masukkan keterangan tambahan">
            </p>
            <p>
                <label for="id_user">ID User</label> <br>
                <input type="text" name="id_user" id="id_user" placeholder="Masukkan ID User/Pengguna Produk">
            </p>
            <p class="btn">
            <button class="btn first" type="submit" name="submit"> Tambah data produk </button>
                <!-- <button type="submit" name="submit">Tambah data produk</button> -->
            </p>
        </ul>

    </form>


</div>
</body>





</html>