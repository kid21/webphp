<fieldset>
	<legend>Edit Data Pelanggan</legend>

	<?php 
	$kdpelanggan = @$_GET['kdpelanggan'];
	$sql = mysql_query("select * from tb_pelanggan where kode_pelanggan = '$kdpelanggan'") or die (mysql_error());
	$data = mysql_fetch_array($sql);

	 ?>

	<form action="" method="post" enctype="multipart/form-data">
			<table>
				<tr>
					<td>Kode Pelanggan</td>
					<td>:</td>
					<td><input type="text" name="kode_pelanggan" value="<?php echo $data['kode_pelanggan']; ?>" disabled="disabled" /></td>
				</tr>
				<tr>
					<td>Nama Pelanggan</td>
					<td>:</td>
					<td><input type="text" name="nama_pelanggan" value="<?php echo $data['nama_pelanggan']; ?>" /></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td><input type="text" name="alamat" value="<?php echo $data['alamat']; ?>" /></td>
				</tr>
				<tr>
					<td>No Telp</td>
					<td>:</td>
					<td><input type="text" name="no_telp" value="<?php echo $data['no_telp']; ?>" /></td>
				</tr>
				<tr>
					<td>Foto</td>
					<td>:</td>
					<td><input type="file" name="foto" /></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><input type="submit" name="edit" value="Edit" /><input type="reset" value="Batal" /></td>
				</tr>
			</table>
		</form>
		<?php 
		$nama_pelanggan = @$_POST['nama_pelanggan'];
		$alamat = @$_POST['alamat'];
		$no_telp = @$_POST['no_telp'];


		$sumber = @$_FILES['foto']['tmp_name'];
		$target = 'img/';
		$nama_foto = @$_FILES['foto']['name'];

		$edit_pelanggan = @$_POST['edit'];
		if($edit_pelanggan) {
		if($nama_pelanggan == "" || $alamat == "" || $no_telp == ""){
			?> 
			<script type="text/javascript">
			alert("Inputan tidak boleh ada yang kosong");	
			</script>
			<?php
		} else {
			if($nama_foto == ""){
				mysql_query ("update tb_pelanggan set nama_pelanggan = '$nama_pelanggan', alamat = '$alamat', no_telp = '$no_telp' where kode_pelanggan = '$kdpelanggan'") or die (mysql_error());
					?> 
					<script type="text/javascript">
					alert("Data berhasil diedit");
					window.location.href="?page=pelanggan";	
					</script>
					<?php
			} else {
				$pindah = move_uploaded_file($sumber, $target.$nama_foto);
				if($pindah){
					mysql_query ("update tb_pelanggan set nama_pelanggan = '$nama_pelanggan', alamat = '$alamat', no_telp = '$no_telp', foto = '$nama_foto' where kode_pelanggan = '$kdpelanggan'") or die (mysql_error());
					?> 
					<script type="text/javascript">
					alert("Data berhasil diedit");
					window.location.href="?page=pelanggan";	
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