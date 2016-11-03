<fieldset>
	<legend>Tampil Data Pelanggan</legend>
	<table width="100%" border="1px" style="border-collapse:collapse;">
		<tr style="background-color:#fc0;">
			<th>Kode Pelanggan</th>
			<th>Nama Pelanggan</th>
			<th>Alamat</th>
			<th>No telp</th>
			<th>Foto</th>
			<th>Opsi</th>
		</tr>
		<?php
		$sql = mysql_query("select * from tb_pelanggan") or die (mysql_error());
		while($data = mysql_fetch_array($sql)){
		?>
			<tr>
				<td align="center"><?php echo $data['kode_pelanggan']; ?></td>
				<td align="center"><?php echo $data['nama_pelanggan']; ?></td>
				<td align="center"><?php echo $data['alamat']; ?></td>
				<td align="center"><?php echo $data['no_telp']; ?></td>
				<td align="center"><img src="img/<?php echo $data['foto']; ?>" width="120px" /></td>
				<td align="center">
					<a href="?page=pelanggan&action=edit&kdpelanggan=<?php echo $data['kode_pelanggan']; ?>"><button>Edit</button></a>
					<a onclick="return confirm('Yakin ingin menghapus data ?')" href="?page=pelanggan&action=hapus&kdpelanggan=<?php echo $data['kode_pelanggan']; ?>"><button>Hapus</button></a></td>
			</tr>
		<?php 
		} 
		?>
	</table>
</fieldset>