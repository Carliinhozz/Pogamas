<?php
namespace Carlos\Auth\Models;
class Loan extends Model{
    protected $username;
    protected $book;
    function __construct($user, $title){
        $this->username=$user;
        $this->book=$title;
    }
    public function save() {
        $statement = self::$conexao->prepare ("INSERT INTO loans(user, book) VALUES (:u, :b)");
        $statement->bindValue(':u', $this->username, SQLITE3_TEXT);
        $statement->bindValue(':b', $this->book, SQLITE3_TEXT);
        return ($statement->execute());
    }
}