<?php
	session_start();
	session_destroy();
	echo "<script>alert('Anda telah keluar dari web. Kami tunggu kedatangan Anda lagi di lain hari!'); window.location = 'index.php'</script>";
?>
