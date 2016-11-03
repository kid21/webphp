<fieldset>
	<legend>Tambah Data Pelanggan</legend>
	
	<?php
	$carikode = mysql_query("select max(kode_pelanggan) from tb_pelanggan") or die (mysql_error());
	$datakode = mysql_fetch_array($carikode);
	if($datakode) {
		$nilaikode = substr($datakode[0], 1);
		$kode = (int) $nilaikode;
		$kode = $kode + 1;
		$hasilkode = "P".str_pad($kode, 3, "0", STR_PAD_LEFT);
	} else {
		$hasilkode = "P001";
	}
	?>

		<form action="" method="post" enctype="multipart/form-data">
			<table>
				<tr>
					<td>Kode Pelanggan</td>
					<td>:</td>
					<td><input type="text" name="kode_pelanggan" value="<?php echo $hasilkode; ?>" /></td>
				</tr>
				<tr>
					<td>Nama Pelanggan</td>
					<td>:</td>
					<td><input type="text" name="nama_pelanggan" /></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td><input type="text" name="alamat" /></td>
				</tr>
				<tr>
					<td>No telp</td>
					<td>:</td>
					<td><input type="text" name="no_telp" /></td>
				</tr>
				<tr>
					<td>Foto</td>
					<td>:</td>
					<td><input type="file" name="foto" /></td>
				</tr>
				<tr>
					<td></td>
					<td></td>	
					<td><input type="submit" name="tambah" value="Tambah" /><input type="reset" value="Batal" /></td>
				</tr>
			</table>
		</form>
	<?php
	$kode_pelanggan = @$_POST['kode_pelanggan'];
	$nama_pelanggan = @$_POST['nama_pelanggan'];
	$alamat = @$_POST['alamat'];
	$no_telp = @$_POST['no_telp'];

	$sumber = @$_FILES['foto']['tmp_name'];
	$target = 'img/';
	$nama_foto = @$_FILES['foto']['name'];

	$tambah_pelanggan = @$_POST['tambah'];

	if($tambah_pelanggan) {
		if($kode_pelanggan== "" || $nama_pelanggan == "" || $alamat == "" || $no_telp == "" || $nama_foto == ""){
			?> 
			<script type="text/javascript">
			alert("Inputan tidak boleh ada yang kosong");	
			</script>
			<?php
		} else {
			$pindah = move_uploaded_file($sumber, $target.$nama_foto);
			if($pindah){
				mysql_query("insert into tb_pelanggan values('$kode_pelanggan', '$nama_pelanggan', '$alamat', '$no_telp', '$nama_foto')") or die (mysql_error());
				?> 
				<script type="text/javascript">
				alert("Tambah data pelanggan baru berhasil");
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
	?>
</fieldset>