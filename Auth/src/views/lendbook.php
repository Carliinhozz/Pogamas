<?php
    use Carlos\Auth\Models\Book;
    use Carlos\Auth\Models\Loan;
    session_start();
    if(!isset($_SESSION['user'])){
        session_destroy();
        header('Location: /');
    }
    if($_SERVER['REQUEST_METHOD']==='POST'&&isset($_POST['title'])){
        $book=new Book($_POST['title']);
        if(Book::exists($_POST['title'])){
            $loan= new Loan($_SESSION['user'],$_POST['title']);
            $loan->save();
            echo (
                "<script>
                    alert ('o livro: ".$_POST['title']." foi adicionado');
                </script>"
            );
            
        }else{
            echo (
                "<script>
                    alert ('o livro: ".$_POST['title']." não existe no banco');
                </script>"
            );
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Emprestar livro</title>
    </head>
    <body>
        <h1>User: <?php echo $_SESSION['user']?></h1>
        <form action="lendbook" method="POST">
            <input type="text" placeholder="Título" name="title">
            <button>Emprestar</button>
            <div>
                <?php
                    /*mostrar livros*/
                    use Carlos\Auth\Models\Model;
                    $result=Model::$conexao->query('SELECT * FROM books;');
                    while($row=$result->fetchArray()){
                        echo $row['title']."<br>";
                    }
                ?>
            </div>
        </form>
    </body>
</html>
