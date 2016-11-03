<?php
@session_start();
include	"inc/koneksi.php";

if(@$_SESSION['admin'] || @$_SESSION['operator']) {
?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Utama</title>
<style type="text/css">

body {

	font-family: arial;
	font-size: 14px;
}

#canvas{
	width: 960px;
	margin: 0 auto;
	border: 1px solid silver;
}
	
#header{
	font-size: 20px;
	padding: 20px;
}

#menu{
	background-color: #0066ff;
}

#menu ul{
	list-style: none;
	margin: 0;
	padding: 0;

}

#menu ul li.utama{
	display: inline-table;
}

#menu ul li:hover{
	background-color: #0033cc;
}

#menu ul li a{
	display: block;
	text-decoration: none;
	line-height: 40px;
	padding: 0 10px;
	color: #fff;
}

.utama ul{
	display: none;
	position: absolute;
	z-index: 2;

}

.utama:hover ul{
	display: block;
}

.utama ul li{
	display: block;
	background-color: #6cf;
	width: 140px;
}

.right{
	background-color: #f60;
	float: right;
}

#isi{
	min-height: 400px;
	padding: 20px;
	background-image: url("img/bg-isi.jpg");
	background-attachment: fixed;
}

#footer{
	text-align: center;
	padding: 20px;
	background-color: #ccc;
}

</style>
</head>
<body>

<div id="canvas">
	<div id="header">
		<img src="img/header.jpg" />
	</div>

	<div id="menu">
		<ul>
			<li class="utama"><a href="/webku">Beranda</a></li>
			<li class="utama"><a href="">Mobil</a>
				<ul>
					<li><a href="?page=mobil">Lihat Data</a></li>
					<li><a href="?page=mobil&action=tambah">Tambah Data</a></li>
				</ul>
			</li>
			<li class="utama"><a href="">Pelanggan</a>
				<ul>
					<li><a href="?page=pelanggan">Lihat Data</a></li>
					<li><a href="?page=pelanggan&action=tambah">Tambah Data</a></li>
				</ul>	
			</li>
			<li class="utama"><a href="">Paket Kredit</a>
				<ul>
					<li><a href="?page=paketkredit">Lihat Data</a></li>
					<li><a href="">Tambah Data</a></li>
				</ul>
			</li>
			<li class="utama" style="float:right;"><a href="inc/logout.php">Logout</a>
		</ul>
	</div>

	<div id="isi">
	<?php
	$page = @$_GET['page'];
	$action = @$_GET['action'];
	if($page == "mobil") {
		if($action == "") {
			include "inc/mobil.php";
		} else if($action == "tambah") {
			include "inc/tambah_mobil.php";
		} else if($action == "edit") {
			include "inc/edit_mobil.php";
		} else if($action == "hapus") {
			include "inc/hapus_mobil.php";
		}
	} else if ($page == "pelanggan") {
		if($action == "") {
			include "inc/pelanggan.php";
		} else if($action == "tambah") {
			include "inc/tambah_pelanggan.php";
		} else if($action == "edit") {
			include "inc/edit_pelanggan.php";
		} else if($action == "hapus") {
			include "inc/hapus_pelanggan.php";
		}
	} else if ($page == "paketkredit") {
		echo "Ini halaman paket kredit";
	} else if ($page == "") {
		echo "Selamat datang di halaman utama";
	} else {
		echo "404! Halaman tidak ditemukan";
	}
	?>
	</div>

	<div id="footer">
		Copyright 2016 - Arifin Supardan => http://arifinsupardan.com
	</div>

</div>
</body>
</html>

<?php
} else {
	header("location: login.php");
}
?>