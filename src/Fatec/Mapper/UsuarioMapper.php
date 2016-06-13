<?php
require_once __DIR__."/../Entity/Usuario.php";
require_once __DIR__."/../Db/Conexao.php";
class UsuarioMapper
{
    private $conexao;
    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    public function insert(Usuario $usuario)
    {
        try{
            $result = $this->conexao->prepare("INSERT INTO usuario (nome,email,username,senha,nivel)
                                                VALUES (?, ?, ?, ?, ?)");
            $result->execute([
                $usuario->getNome(),
                $usuario->getEmail(),
                $usuario->getUsername(),
                $usuario->getSenha(),
                $usuario->getNivel()
            ]);
            if($result->rowCount() == 1) {
                return true;
            }else{
                return false;
            }
        }catch(PDOException $e){
            //var_dump($dados);
            echo "Erro ao Inserir " . $e->getMessage();
        }
        return false;
    }

    public function update(Usuario $usuario)
    {
        try{
            $result = $this->conexao->prepare("UPDATE usuario set nome = :nome, senha = :senha, username = :username,
                                                email = :email , nivel = :nivel
                                                Where usuario_id = :id");
            $result->bindValue(":id",$usuario->getUsuarioid(),PDO::PARAM_INT);
            $result->bindValue(":nome",$usuario->getNome(),PDO::PARAM_STR);
            $result->bindValue(":senha",$usuario->getSenha(),PDO::PARAM_STR);
            $result->bindValue(":username",$usuario->getUsername(),PDO::PARAM_STR);
            $result->bindValue(":email",$usuario->getEmail(),PDO::PARAM_STR);
            $result->bindValue(":nivel",$usuario->getNivel(),PDO::PARAM_STR);
            $result->execute();
            if($result->rowCount() == 1) {
                return true;
            }else{
                return false;
            }
        }catch(PDOException $e){
            //var_dump($dados);
            echo "Erro ao Atualizar " . $e->getMessage();
        }
        return false;
    }

    public function updateSemSenha(Usuario $usuario)
    {
        try{
            $result = $this->conexao->prepare("UPDATE usuario set nome = :nome, username = :username,
                                                email = :email , nivel = :nivel
                                                Where usuario_id = :id");
            $result->bindValue(":id",$usuario->getUsuarioid(),PDO::PARAM_INT);
            $result->bindValue(":nome",$usuario->getNome(),PDO::PARAM_STR);
            $result->bindValue(":username",$usuario->getUsername(),PDO::PARAM_STR);
            $result->bindValue(":email",$usuario->getEmail(),PDO::PARAM_STR);
            $result->bindValue(":nivel",$usuario->getNivel(),PDO::PARAM_STR);
            $result->execute();
            if($result->rowCount() == 1) {
                return true;
            }else{
                return false;
            }
        }catch(PDOException $e){
            //var_dump($dados);
            echo "Erro ao Atualizar " . $e->getMessage();
        }
        return false;
    }

    public function fetchAll(){
        try {
            $result = $this->conexao->prepare("SELECT * FROM usuario");
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo "Erro ao Todas Tabelas " . $e->getMessage();
            return false;
        }
    }

    public function fetch($id){
        try {
            $result = $this->conexao->prepare("SELECT * FROM usuario WHERE usuario_id = :id");
            $result->bindValue(":id", $id, PDO::PARAM_INT);
            $result->execute();
            return $result->fetch(PDO::FETCH_OBJ);
        }catch(\PDOException $e){
            echo "Erro ao listar Usuário " . $e->getMessage();
            return false;
        }

    }

    public function delete($id){
        try {
            $result = $this->conexao->prepare("DELETE FROM usuario WHERE usuario_id = :id");
            $result->bindValue(":id", $id, PDO::PARAM_INT);
            $result->execute();
            if($result->rowCount() == 1){
                return true;
            }
            return false;
        }catch(PDOException $e){
            echo "Erro ao listar Tabela " . $e->getMessage();
            return false;
        }

    }
}