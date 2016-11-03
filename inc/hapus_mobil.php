<?php 
$kdmobil = @$_GET['kdmobil'];

mysql_query("delete from tb_mobil where kode_mobil = '$kdmobil'") or die(mysql_error());
 ?>

 <script type="text/javascript">
 	window.location.href="?page=mobil";
 </script>