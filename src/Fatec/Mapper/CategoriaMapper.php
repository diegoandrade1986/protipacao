<?php
require_once __DIR__."/../Db/Conexao.php";
class CategoriaMapper
{
    private $conexao;
    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    
    public function fetchByName(Categoria $categoria)
    {
        $nome = $categoria->getCategoriaNome();
        try{
            $result = $this->conexao->prepare("SELECT * FROM tb_categoria WHERE UPPER(categoria_nome) = :nome");
            $result->bindValue(":nome", $nome,PDO::PARAM_STR);
            $result->execute();
            return $result->fetch(PDO::FETCH_OBJ);
        }catch(PDOException $e){
            echo "Erro ao Listar Categoria Nome " . $e->getMessage();
        }
        return false;

    }

    public function fetch(Categoria $categoria)
    {
        $id = $categoria->getCategoriaId();
        try{
            $result = $this->conexao->prepare("SELECT * FROM tb_categoria WHERE categoria_id = :id");
            $result->bindValue(":id", $id,PDO::PARAM_INT);
            $result->execute();
            return $result->fetch(PDO::FETCH_OBJ);

        }catch(PDOException $e){
            echo "Erro ao listar Categoria " . $e->getMessage();
        }
        return false;

    }

    public function fetchAll(){
        try {
            $result = $this->conexao->prepare("SELECT * FROM tb_categoria");
            $result->execute();
            return $result->fetchAll(PDO::FETCH_OBJ);
        }catch(PDOException $e){
            echo "Erro ao Listar as Categorias " . $e->getMessage();
            return false;
        }
    }
}