<?php
    session_start();
    if(!isset($_SESSION['user'])){
        session_destroy();
        header('Location: /');
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Show Page</title>
    </head>
    <body>
        <h1>Olá, <?php echo $_SESSION['user']?></h1>
        <form action="addbook" method="GET">
            <button>Adicionar livros</button>
        </form>
        <form action="lendbook" method="GET">
            <button>Empréstimo de livros</button>
        </form>

    </body>
</html>