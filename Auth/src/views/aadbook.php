<?php
    use Carlos\Auth\Models\Book;
    session_start();
    if(!isset($_SESSION['user'])){
        session_destroy();
        header('Location: /');
    }
    if($_SERVER['REQUEST_METHOD']==='POST'&&isset($_POST['title'])){
        $book=new Book($_POST['title']);
        $book->save();
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Adicionar livros</title>
    </head>
    <body>
        <h1>User: <?php echo ($_SESSION['user']);?></h1>
        <form action="addbook" method="POST">
            <input type="text" name="title" placeholder="Título">
            <button>Adicionar</button>
        </form>
    </body>
</html>