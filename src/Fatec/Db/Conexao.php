<?php

class conexao
{
    /*private static $dsn = 'mysql:host=localhost;dbname=criasoft_financeiro';
    private static $user = 'root';
    private static $password = '';*/
    //private static $options = [\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8' ];

    private static function connection (){
        try {
            $file_db = new PDO('sqlite:' . __DIR__ . '/../../Bd/fatec.sqlite');
            //echo __DIR__ . '/../../../sqlite/cliente.sqlite';
            $file_db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $file_db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $file_db;
        }catch(PDOException $e){
            echo "Código: {$e->getCode()} <br> Mensagem: {$e->getMessage()} <br>  Arquivo: {$e->getFile()} <br> linha: {$e->getLine()}";
        }
    }

    public static function  getConexao(){
        return self::connection();
    }

}