<?php 
	include "assets/php/import.php"; 
	if (isset($_POST['Logar'])) {
		$email = $_POST['email'];
		$pass = $_POST['pass'];

		$query = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
		if (mysqli_num_rows($query) > 0) {
			$arr = mysqli_fetch_array($query);
		if ($pass == $arr['pass']) {
			setcookie("hash",$arr['hash']);
			header("location: ./");
		}else{
			$error = "Senha errada!";
			$success = "";
		}
	}else{
		$error = "Email não encontrado";
		$success = "";
		}
	}else{
					$error = "";
					$success = "";
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
	<center><img class="icon" src="assets/img/logo.png" width="10%"><br><br>
	<div class="panel" style="width: 75%; height: 275px">
		<h1>Login:</h1><br>
		<span style="color: red"><?php echo $error ?></span>
		<span style="color: green"><?php echo $success ?></span>
		<form method="POST">
			<h4>Email:</h4><input minlength="8" type="email" name="email" required><br>
			<h4>Senha</h4><input minlength="8" type="password" name="pass" required><br><br>
		<input type="submit" name="Logar" value="Logar">
		</form>
	</div>
	<br><br>
	<a href="register.php">Criar uma conta?</a>
	</center>

</body>
</html>