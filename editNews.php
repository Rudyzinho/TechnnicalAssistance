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

			$id = $_GET['id'] OR header("location: ./");
			$query = mysqli_query($conn, "SELECT * FROM news WHERE id = '$id'");
			$arrN = mysqli_fetch_array($query);


			if (isset($_POST['editar'])) {
				$title = $_POST['title'];
				$content = $_POST['content'];
				$data = date("Y-m-d H:i:s");
				$author = $arr['nome'];

				mysqli_query($conn, "UPDATE news SET title='$title',content='$content',data='$data',author='$author' WHERE id = '$id'");
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
		<h1>Editar Notícia</h1>
		<form method="POST">
			<input type="name" placeholder="Titulo" name="title" value="<?php echo $arrN['title']; ?>"><br><br>
			<textarea placeholder="Conteudo" name="content" rows="10" cols="64"><?php echo $arrN['content']; ?></textarea><br><br><br>
			<input type="submit" name="editar" value="Editar" style="width: 50%; height: 20pt;">
		</form>
	</center>
</body>
</html>