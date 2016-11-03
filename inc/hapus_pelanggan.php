<?php 
$kdmobil = @$_GET['kdpelanggan'];

mysql_query("delete from tb_pelanggan where kode_pelanggan = '$kdpelanggan'") or die(mysql_error());
 ?>

 <script type="text/javascript">
 	window.location.href="?page=pelanggan";
 </script>