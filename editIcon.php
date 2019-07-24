<?php 
	include "assets/php/import.php";
	if (!isset($_COOKIE['hash'])) {
	header("location: ./");
	}
	else{
	$hash = $_COOKIE['hash'];
	$query = mysqli_query($conn, "SELECT * FROM users WHERE hash = '$hash'");
	$arr = mysqli_fetch_array($query);
	$arrN = mysqli_fetch_array($query);

	}
 ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<?php headImport(); ?>
</head>
<body>
	<header>
		<a class="link" href="index.php"><- Voltar</a>
	</header>
	<br><br><br>
	<center>
		<h1>EDITAR ICONE</h1>
		<br><br>
		<img  class="icon2" style=" background-color: transparent;
									 border-radius: 20%;
									 height: 180px;
									 object-fit: cover;
									 width: 15%;
									 margin-top: 0px; 
	  	" src="assets/img/<?php echo $arr['icon']; ?>"><br><br><br>
		<form method="POST" action="icon_upload.php" enctype="multipart/form-data">
			<input name="arquivo" type="file"><br><br><br>
			<input type="submit" name="editar" value="Editar" style="width: 10%; height: 20pt;">
		</form>
	</center>
</body>
</html>