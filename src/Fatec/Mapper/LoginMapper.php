<?php
require_once __DIR__."/../Db/Conexao.php";
class LoginMapper
{
    private $conexao;
    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    public function logar(Login $login)
    {
        $dados[] = $login->getLogin();
        $dados[] = $login->getSenha();
        try{
            $result = $this->conexao->prepare("SELECT * FROM usuario WHERE username = ? AND senha = ?");
            $result->execute($dados);
            return $result->fetch(PDO::FETCH_OBJ);
        }catch(PDOException $e){
            echo "Erro ao Logar " . $e->getMessage();
        }
        return false;

    }
}