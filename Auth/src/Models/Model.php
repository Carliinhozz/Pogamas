<?php
namespace Carlos\Auth\Models;

class Model{
    static $conexao;
    static function blindConnection($conexao){
        self::$conexao=$conexao;
    }
    static function create_table($create){
        self::$conexao->exec($create);
    }
}