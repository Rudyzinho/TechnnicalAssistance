<?php 
	include "assets/php/import.php";
	if (!isset($_COOKIE['hash'])) {
	header("location: ./");
}else{
	$hash = $_COOKIE['hash'];
	$query = mysqli_query($conn, "SELECT * FROM users WHERE hash = '$hash'");
	$arr = mysqli_fetch_array($query);

			$arrN = mysqli_fetch_array($query);




			if (isset($_POST['editar'])) {
				$name = $_POST['name'];

				mysqli_query($conn, "UPDATE users SET nome='$name' WHERE hash = '$hash'");
				header("location: ./");
			}
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
		<h1>Editar</h1>
		<form method="POST">
			<input type="name" placeholder="nome" name="name" value="<?php echo $arr['nome']; ?>"><br><br>
			<input type="submit" name="editar" value="Editar" style="width: 10%; height: 20pt;">

		</form>
	</center>
</body>
</html>