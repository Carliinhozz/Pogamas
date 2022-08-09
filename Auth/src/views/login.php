<?php

use Carlos\Auth\Models\User;
    if ($_SERVER['REQUEST_METHOD'] === 'POST'&&isset($_POST['user'], $_POST['password'])){
           if(User::exists($_POST['user'], $_POST['password'])){
                session_start();
                $_SESSION['user'] = $_POST['user'];
                $_SESSION['id'] = session_id() . $_POST['user'];
                header("Location: /showpage");
                exit;
           }

    }else if($_SERVER['REQUEST_METHOD'] === 'GET'){

    }else {
        header("Location: /login");
        exit;
    }


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
    </head>
    <body>
        <form action="login" method="POST">
			<input type="text" name="user" placeholder="Usuário">
			<input type="password" name="password" placeholder="Senha">
			<button>Enviar</button>
		</form>
        <div>
            <?php
                /*mostrar users*/
                use Carlos\Auth\Models\Model;
                $result=Model::$conexao->query('SELECT * FROM users;');
                while($row=$result->fetchArray()){
                    echo $row['username']."<br>";
                }
            ?>
        </div>
    </body>
</html>