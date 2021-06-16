<?php
require '../functions.php';

$id = $_GET["id"];

if( hapuskonsultasi($id) > 0 ) {
    echo "
    <script> 
        alert('Berhasil menghapus data!');
        document.location.href = 'daftar_konsultasi.php';
    </script>
    ";
} else {
    echo "<script> 
    alert('Gagal menghapus data');
    document.location.href = 'daftar_konsultasi.php';
</script>
";
}



?>