<fieldset>
	<legend>Tampil Data Mobil</legend>
	<table width="100%" border="1px" style="border-collapse:collapse;">
		<tr style="background-color:#fc0;">
			<th>Kode Mobil</th>
			<th>Merk</th>
			<th>Type</th>
			<th>Warna</th>
			<th>Harga</th>
			<th>Gambar</th>
			<th>Opsi</th>
		</tr>
		<?php
		$sql = mysql_query("select * from tb_mobil") or die (mysql_error());
		while($data = mysql_fetch_array($sql)){
		?>
			<tr>
				<td align="center"><?php echo $data['kode_mobil']; ?></td>
				<td align="center"><?php echo $data['merk']; ?></td>
				<td align="center"><?php echo $data['type']; ?></td>
				<td align="center"><?php echo $data['warna']; ?></td>
				<td align="center"><?php echo $data['harga']; ?></td>
				<td align="center"><img src="img/<?php echo $data['gambar']; ?>" width="120px" /></td>
				<td align="center">
					<a href="?page=mobil&action=edit&kdmobil=<?php echo $data['kode_mobil']; ?>"><button>Edit</button></a>
					<a onclick="return confirm('Yakin ingin menghapus data ?')" href="?page=mobil&action=hapus&kdmobil=<?php echo $data['kode_mobil']; ?>"><button>Hapus</button></a></td>
			</tr>
		<?php 
		} 
		?>
	</table>
</fieldset>