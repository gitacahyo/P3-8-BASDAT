<?php
require '../functions.php';

$id = $_GET["id"];

if( hapusproduk($id) > 0 ) {
    echo "
    <script> 
        alert('Berhasil menghapus data!');
        document.location.href = 'daftar_produk.php';
    </script>
    ";
} else {
    echo "<script> 
    alert('Gagal menghapus data');
    document.location.href = 'daftar_produk.php';
</script>
";
}



?>