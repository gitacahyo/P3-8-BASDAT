<?php
require '../functions.php';

$id = $_GET["id"];

if( hapususer($id) > 0 ) {
    echo "
    <script> 
        alert('Berhasil menghapus data!');
        document.location.href = 'daftar_user.php';
    </script>
    ";
} else {
    echo "<script> 
    alert('Gagal menghapus data');
    document.location.href = 'daftar_user.php';
</script>
";
}



?>