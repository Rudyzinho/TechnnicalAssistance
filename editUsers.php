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
		}
		if ($arr['adm'] == 0) {
			header("location: ./");
	}
		 ?><br>
		<h1>Editar Usuarios</h1>
		<?php
			$queryUsers = mysqli_query($conn ,"SELECT * FROM users ORDER BY id");
			while ($arrU = mysqli_fetch_array($queryUsers)) {
				$tipo;
				if($arrU['adm']){
					$v = "Verdadeiro";
					$f = "";
				}
				else{
					$f = "Falso";
					$v = "";
				}
				echo '<div class="noticia" align="left">
			<h1 style="color:turquoise">'.$arrU['nome'].'</h1><br><br>
			<h4>Email: '.$arrU['email'].'</h4>
			<h4>Administrador: <span style="color:green;">'.$v.'</span><span style="color:red">'.$f.'</span></h4><br>
			<h4> <img class="icon" style="max-height: 100px;" src="assets/img/'.$arrU['icon'].'"></h4>
			<br> <a href="deleteUsers.php?id="'.$arrN['id'].'"">Deletar</a>';
		echo '</div><br>';
			}
		?>
	</center>
</body>
</html>