<?php 
@session_start();

session_destroy();

header("location: /webku/login.php");
?>