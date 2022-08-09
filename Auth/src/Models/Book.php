<?php
namespace Carlos\Auth\Models;
class Book extends Model{
    protected $title;
     public function __construct($title) {
        $this->title=$title;
     }

     public function save() {
        $statement = self::$conexao->prepare ("INSERT INTO books(title) VALUES (:t)");
        $statement->bindValue(':t', $this->title, SQLITE3_TEXT);
        return ($statement->execute());
    }
    static function exists ($title) {
        $sttm = self::$conexao->prepare("SELECT * FROM books WHERE title = :title;");
        $sttm->bindValue(':title', $title, SQLITE3_TEXT);
        $result = $sttm->execute();
        $row = $result->fetchArray();
        if (isset($row['title'])) {
            if($title=== $row['title']){
                return true;
            }else{
                return false;
            }
           
        }
        return false;
 


    }
}