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
			}
			if (isset($_POST['criar'])) {
				$title = $_POST['title'];
				$content = $_POST['content'];
				$data = date("Y-m-d H:i:s");
				$author = $arr['nome'];

				mysqli_query($conn, "INSERT INTO news(title, content, data, author) VALUES ('$title','$content','$data','$author')");
				header("location: ./news.php");
			}
}

 ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<?php headImport(); ?>
</head>
<body>
	<center>
		<h1>Criar Notícia</h1>
		<form method="POST">
			<input type="name" placeholder="Titulo" name="title"><br><br>
			<textarea placeholder="Conteudo" name="content" rows="10" cols="64"></textarea><br><br><br>
			<input type="submit" name="criar" value="Criar" style="width: 50%; height: 20pt;">
		</form>
	</center>
</body>
</html>