<?php
require_once __DIR__."/../Entity/Noticia.php";
require_once __DIR__."/../Db/Conexao.php";
class NoticiaMapper
{
    private $conexao;
    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    public function insert(Noticia $noticia)
    {
        try{
            $result = $this->conexao->prepare("INSERT INTO tb_noticia (categoria_id,titulo,data,imagem,thumbnail,descricao)
                                                VALUES (:id, :title, date(), :img, :thumb, :desc)");
            $result->bindValue(":id",$noticia->getCategoriaId(),PDO::PARAM_INT);
            $result->bindValue(":title",$noticia->getTitulo(),PDO::PARAM_STR);
            $result->bindValue(":img",$noticia->getImg(),PDO::PARAM_STR);
            $result->bindValue(":thumb",$noticia->getThumbnail(),PDO::PARAM_STR);
            $result->bindValue(":desc",$noticia->getDescricao(),PDO::PARAM_STR);
            $result->execute();
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

    public function update(Noticia $noticia)
    {
        try{
            $result = $this->conexao->prepare("UPDATE tb_noticia set categoria_id = :catid, titulo = :title, descricao = :desc
                                                Where noticia_id = :id");
            $result->bindValue(":id",$noticia->getNoticiaId(),PDO::PARAM_INT);
            $result->bindValue(":catid",$noticia->getCategoriaId(),PDO::PARAM_INT);
            $result->bindValue(":title",$noticia->getTitulo(),PDO::PARAM_STR);
            $result->bindValue(":desc",$noticia->getDescricao(),PDO::PARAM_STR);
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

    public function updateImage(Noticia $noticia)
    {
        try{
            $result = $this->conexao->prepare("UPDATE tb_noticia set imagem = :img, thumbnail = :thumb Where noticia_id = :id");
            $result->bindValue(":id",$noticia->getNoticiaId(),PDO::PARAM_INT);
            $result->bindValue(":img",$noticia->getImg(),PDO::PARAM_STR);
            $result->bindValue(":thumb",$noticia->getThumbnail(),PDO::PARAM_STR);
            $result->execute();
            if($result->rowCount() == 1) {
                return true;
            }else{
                return false;
            }
        }catch(PDOException $e){
            //var_dump($dados);
            echo "Erro ao Atualizar Imagem " . $e->getMessage();
        }
        return false;
    }

    public function fetchAll(){
        try {
            $result = $this->conexao->prepare("SELECT * FROM tb_noticia");
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo "Erro ao Todas Tabelas " . $e->getMessage();
            return false;
        }
    }

    public function fetch(Noticia $noticia){
        try {
            $result = $this->conexao->prepare("SELECT * FROM tb_noticia WHERE noticia_id = :id");
            $result->bindValue(":id", $noticia->getNoticiaId(), PDO::PARAM_INT);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo "Erro ao listar Noticia " . $e->getMessage();
            return false;
        }

    }

    public function fetchByCategoria(Noticia $noticia){
        try {
            $result = $this->conexao->prepare("SELECT * FROM tb_noticia WHERE categoria_id = :id ORDER BY noticia_id DESC ");
            $result->bindValue(":id", $noticia->getCategoriaId(), PDO::PARAM_INT);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo "Erro ao listar noticias por categoria " . $e->getMessage();
            return false;
        }

    }

    public function delete(Noticia $noticia){
        $id = $noticia->getNoticiaId();
        try {
            $result = $this->conexao->prepare("DELETE FROM tb_noticia WHERE noticia_id = :id");
            $result->bindValue(":id", $id, PDO::PARAM_INT);
            $result->execute();
            if($result->rowCount() == 1){
                return true;
            }
            return false;
        }catch(PDOException $e){
            echo "Erro ao deletar noticia  " . $e->getMessage();
            return false;
        }

    }
}