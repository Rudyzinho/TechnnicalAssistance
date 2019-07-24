<?php 
	include "assets/php/import.php"; 
	if (isset($_POST['registrar'])) {
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		$cpass = $_POST['cpass'];
			if ($pass == $cpass) {
				$query = mysqli_query($conn ,"SELECT * FROM users WHERE email = '$email'");
				if (mysqli_num_rows($query) < 1) {
					$hash = generateHash();
					mysqli_query($conn, "INSERT INTO users(hash, nome, pass, email, adm, icon) VALUES ('$hash', '$nome', '$pass', '$email', '0', 'defauticon.png')");
					$success = "Sucesso ao criar sua conta!";
					$error = "";
				}
					else{
					$error = "Email já cadastrado";
					$success = "";
				}
			}else{
				$error = "Senha não confirmada!";
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
		<h1>Registrar:</h1><br>
		<span style="color: red"><?php echo $error ?></span>
		<span style="color: green"><?php echo $success ?></span>
		<form method="POST">
			<h4>Nome:</h4><input minlength="5" type="name" name="nome" required><br>
			<h4>Email:</h4><input minlength="8" type="email" name="email" required><br>
			<h4>Senha</h4><input minlength="8" type="password" name="pass" required><br>
			<h4>Confirmar Senha</h4><input minlength="8" type="password" name="cpass" required><br>
		<div style="padding-top: 20px"></div>
		<input type="submit" name="registrar" value="Registrar">
		</form>
	</div>
	<br><br><br>
	<a href="login.php">Já possui uma conta?</a>
	</center>

</body>
</html>