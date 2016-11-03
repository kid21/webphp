<fieldset>
	<legend>Edit Data Mobil</legend>

	<?php 
	$kdmobil = @$_GET['kdmobil'];
	$sql = mysql_query("select * from tb_mobil where kode_mobil = '$kdmobil'") or die (mysql_error());
	$data = mysql_fetch_array($sql);

	 ?>

	<form action="" method="post" enctype="multipart/form-data">
			<table>
				<tr>
					<td>Kode Mobil</td>
					<td>:</td>
					<td><input type="text" name="kode_mobil" value="<?php echo $data['kode_mobil']; ?>" disabled="disabled" /></td>
				</tr>
				<tr>
					<td>Merk</td>
					<td>:</td>
					<td><input type="text" name="merk" value="<?php echo $data['merk']; ?>" /></td>
				</tr>
				<tr>
					<td>Type</td>
					<td>:</td>
					<td><input type="text" name="type" value="<?php echo $data['type']; ?>" /></td>
				</tr>
				<tr>
					<td>Warna</td>
					<td>:</td>
					<td><input type="text" name="warna" value="<?php echo $data['warna']; ?>" /></td>
				</tr>
				<tr>
					<td>Harga</td>
					<td>:</td>
					<td><input type="text" name="harga" value="<?php echo $data['harga']; ?>" /></td>
				</tr>
				<tr>
					<td>Gambar</td>
					<td>:</td>
					<td><input type="file" name="gambar" /></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><input type="submit" name="edit" value="Edit" /><input type="reset" value="Batal" /></td>
				</tr>
			</table>
		</form>
		<?php 
		$merk = @$_POST['merk'];
		$type = @$_POST['type'];
		$warna = @$_POST['warna'];
		$harga = @$_POST['harga'];

		$sumber = @$_FILES['gambar']['tmp_name'];
		$target = 'img/';
		$nama_gambar = @$_FILES['gambar']['name'];

		$edit_mobil = @$_POST['edit'];
		if($edit_mobil) {
		if($merk == "" || $type == "" || $warna == "" || $harga == ""){
			?> 
			<script type="text/javascript">
			alert("Inputan tidak boleh ada yang kosong");	
			</script>
			<?php
		} else {
			if($nama_gambar == ""){
				mysql_query ("update tb_mobil set merk = '$merk', type = '$type', warna = '$warna', harga = '$harga' where kode_mobil = '$kdmobil'") or die (mysql_error());
					?> 
					<script type="text/javascript">
					alert("Data berhasil diedit");
					window.location.href="?page=mobil";	
					</script>
					<?php
			} else {
				$pindah = move_uploaded_file($sumber, $target.$nama_gambar);
				if($pindah){
					mysql_query ("update tb_mobil set merk = '$merk', type = '$type', warna = '$warna', harga = '$harga', gambar = '$nama_gambar' where kode_mobil = '$kdmobil'") or die (mysql_error());
					?> 
					<script type="text/javascript">
					alert("Data berhasil diedit");
					window.location.href="?page=mobil";	
					</script>
					<?php
				} else {
					?>
					<script type="text/javascript">
					alert("Gambar gagal di upload");
					</script>
					<?php
				}
			}
		}
	} 
	?>
</fieldset>