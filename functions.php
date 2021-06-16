<?php 
//Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "joco");


function query($query) {
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}

function registrasi($data) {
    global $koneksi;

    $nama_lengkap = $data["nama_lengkap"];
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($koneksi, $data["password"]);
    $password2 = mysqli_real_escape_string($koneksi, $data["password2"]);
    $jenis_kelamin =$data["jenis_kelamin"];
    $jenis_kulit = $data["jenis_kulit"];



    //cek konfirmasi password
    if( $password !== $password2) {
        echo "<script>
                alert('Konfirmasi password tidak sesuai!')
            </script>";
        return false;
    }

    return 1;

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
    
    //tambahkan username ke database
    mysqli_query($koneksi, "INSERT INTO user(nama_lengkap, username, password, jenis_kelamin, jenis_kulit) 
                        VALUES ('$nama_lengkap', '$username', '$password', '$jenis_kelamin', '$jenis_kulit' )"); 
    return mysqli_affected_rows($koneksi);
}

function hapuskonsultasi($id) {
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM konsultasi where id = $id");
    return mysqli_affected_rows($koneksi);
}

function hapusdokter($id) {
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM dokter_spkk where id = $id");
    return mysqli_affected_rows($koneksi);
}

function hapusproduk($id) {
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM produk where id = $id");
    return mysqli_affected_rows($koneksi);
}

function hapususer($id) {
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM user where id = $id");
    return mysqli_affected_rows($koneksi);
}

function ubahkonsultasi($data) {
    global $koneksi;
    $id = $data["id"];
    $jenis_konsultasi = htmlspecialchars($data["jenis_konsultasi"]);
    $tanggal_konsultasi = $data["tanggal_konsultasi"];
    $dokter_pj = htmlspecialchars($data["dokter_pj"]);
    $waktu_mulai = $data["waktu_mulai"];
    $waktu_selesai = $data["waktu_selesai"];
    $catatan_konsultasi = htmlspecialchars($data["catatan_konsultasi"]);

    $query = "UPDATE konsultasi SET
                jenis_konsultasi = '$jenis_konsultasi', 
                tanggal_konsultasi = '$tanggal_konsultasi', 
                dokter_pj = '$dokter_pj', 
                waktu_mulai = '$waktu_mulai', 
                waktu_selesai = '$waktu_selesai'
                WHERE id = $id";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function ubahproduk($data) {
    global $koneksi;
    $id = $data["id"];
    $nama_produk = htmlspecialchars($data["nama_produk"]);
    $jenis_produk = $data["jenis_produk"];
    $no_bpom = htmlspecialchars($data["no_bpom"]);
    $bahan_aktif = $data["bahan_aktif"];
    $keterangan = $data["keterangan"];
    $id_user = htmlspecialchars($data["id_user"]);

    $query = "UPDATE produk SET
                nama_produk = '$nama_produk', 
                jenis_produk = '$jenis_produk', 
                no_bpom = '$no_bpom', 
                bahan_aktif = '$bahan_aktif', 
                keterangan = '$keterangan'
                id_user = '$id_user'
                WHERE id = $id";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function ubahdokter($data) {
    global $koneksi;
    $id = $data["id"];
    $nama_dokter = htmlspecialchars($data["nama_dokter"]);
    $email = $data["email"];
    $biaya_konsultasi = htmlspecialchars($data["biaya_konsultasi"]);

    $query = "UPDATE dokter_spkk SET
                nama_dokter = '$nama_dokter', 
                email = '$email', 
                biaya_konsultasi = '$biaya_konsultasi',
                WHERE id = $id";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function ubahuser($data) {
    global $koneksi;
    $id = $data["id"];
    $nama_lengkap = htmlspecialchars($data["nama_lengkap"]);
    $username = $data["username"];
    $password = htmlspecialchars($data["password"]);
    $jenis_kelamin = $data["jenis_kelamin"];
    $jenis_kulit = $data["jenis_kulit"];

    $query = "UPDATE user SET
                nama_lengkap = '$nama_lengkap', 
                usernam = '$username', 
                password = '$password', 
                jenis_kelamin = '$jenis_kelamin', 
                jenis_kulit = '$jenis_kulit'
                WHERE id = $id";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}


?>

