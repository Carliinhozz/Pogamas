<?php
	use Carlos\Auth\Models\User;
	if(isset($_POST['user'],$_POST['password'])&&$_SERVER['REQUEST_METHOD']==='POST'){
		$user=new User($_POST['user'],$_POST['password']);
		if (!User::exists($_POST['user'],$_POST['password'])) {
			$user->save();
			session_start();
			$_SESSION['user']=$_POST['user'];
            $_SESSION['id']=session_id() . $_POST['user'];
			header('Location: /showpage');
		}

	}else if(!($_SERVER['REQUEST_METHOD']==='GET')){
		header('Location: /');
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Registrar-se</title>
	</head>
	<body>
		<form action="register" method="POST">
			<input type="text" name="user" placeholder="Usuário">
			<input type="password" name="password" placeholder="Senha">
			<button>Enviar</button>
		</form>
	</body>
</html>