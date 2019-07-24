<?php 
	include "assets/php/import.php";
	if (!isset($_COOKIE['hash'])) {
	header("location: ./");
}else{
		$hash = $_COOKIE['hash'];
	$query = mysqli_query($conn, "SELECT * FROM users WHERE hash = '$hash'");
	$arr = mysqli_fetch_array($query);
			if ($arr['adm'] == 0) {
				header("location: ./");
			}else{
			$id = $_GET['id'] OR header("location: ./");
			mysqli_query($conn, "DELETE FROM news WHERE id = '$id'");
			header("location: ./news.php");
		}

}

 ?>