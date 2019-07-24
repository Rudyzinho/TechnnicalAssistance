<?php
	include "assets/php/import.php";
	if (!isset($_COOKIE['hash'])) {
	header("location: ./");
}
	 ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<?php headImport(); ?>
</head>
<body>
	<?php headerImport(); ?>
	<br><br><br><br>
	<center>
		<?php 
		if (isset($_COOKIE['hash'])) {
			$hash = $_COOKIE['hash'];
	$query = mysqli_query($conn, "SELECT * FROM users WHERE hash = '$hash'");
	$arr = mysqli_fetch_array($query);
			if ($arr['adm'] == 1) {
				echo "<a style='float: right; padding-right: 25px' href='createNews.php'>Criar Notícia</a>";
			}
		}
		 ?><br>
		<h1>Noticias</h1>
		<?php
			$queryNews = mysqli_query($conn ,"SELECT * FROM news ORDER BY id DESC");
			while ($arrN = mysqli_fetch_array($queryNews)) {
				echo '<div class="noticia" align="left">
			<h1>'.$arrN['title'].'</h1>
			<h4>'.$arrN['content'].'</h4>
			<br>
			<p align="right">Feito por '.$arrN['author'].' as '.$arrN['data'].'</p>';
			if ($arr['adm'] == 1) {
				echo "<br><a href='editNews.php?id=".$arrN['id']."'>Editar Noticia</a><br>";
				echo "<a href='deleteNews.php?id=".$arrN['id']."'>Deletar Noticia</a><br>";
			}


		echo '</div><br>';
			}
		?>
	</center>
</body>
</html>