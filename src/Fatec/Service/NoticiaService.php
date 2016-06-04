<?php
require_once __DIR__."/../Entity/Noticia.php";
require_once __DIR__."/../Mapper/NoticiaMapper.php";
require_once __DIR__."/UploadImage.php";

class NoticiaService
{
    private $noticia;
    private $noticiaMapper;

    public function __construct(Noticia $noticia,NoticiaMapper $noticiaMapper)
    {
        $this->noticia = $noticia;
        $this->noticiaMapper = $noticiaMapper;
    }

    public function fetchByName($nome)
    {
        if (trim($nome) != "") {
            $this->categoria->setCategoriaNome($nome);
            return $this->categoriaMapper->fetchByName($this->categoria);
        }
        return false;

    }

    public function fetch($id){
        if ((int)$id > 0){
            $this->noticia->setNoticiaId($id);
            return $this->noticiaMapper->fetch($this->noticia);
        }else{
            return false;
        }
    }

    public function fetchAll()
    {
        return $this->categoriaMapper->fetchAll();
    }

    public function insert(array $dados)
    {
        //var_dump($dados['img']);
        if (trim($dados['titulo']) != "" && trim($dados['descricao']) != "" && (int)$dados['categoriaid'] > 0 && trim($dados['dir']) != ""){
            //$nameImage = md5($dados['img']['img-noticia']['name'] . date('Ymdhis'));
            $image = self::upImage($dados['img']['img-noticia']['name'],$dados['img']['img-noticia']['tmp_name'],trim($dados['dir']));
            if (is_array($image)){
                $this->noticia->setCategoriaId((int)$dados['categoriaid']);
                $this->noticia->setTitulo($dados['titulo']);
                $this->noticia->setImg($image['img']);
                $this->noticia->setThumbnail($image['thumb']);
                $this->noticia->setDescricao($dados['descricao']);
                $this->noticiaMapper->insert($this->noticia);
                return true;
            }else{
                return false;
            }

        }else{
            return false;
        }
    }

    public function update(array $dados)
    {
        if (trim($dados['titulo']) != "" && trim($dados['descricao']) != "" && (int)$dados['noticiaid'] > 0 && (int)$dados['categoriaid'] > 0 && trim($dados['dir']) != ""){
            $this->noticia->setNoticiaId((int)$dados['noticiaid']);
            $this->noticia->setCategoriaId((int)$dados['categoriaid']);
            $this->noticia->setTitulo($dados['titulo']);
            $this->noticia->setDescricao($dados['descricao']);
            $update = $this->noticiaMapper->update($this->noticia);
            /* EM CASO DE TROCAR A IMAGEM */
            if ($dados['img']['img-noticia']['name'] != "") {
                $image = self::upImage($dados['img']['img-noticia']['name'], $dados['img']['img-noticia']['tmp_name'], trim($dados['dir']));
                if (is_array($image)) {
                    $this->noticia->setImg($image['img']);
                    $this->noticia->setThumbnail($image['thumb']);
                    $update = $this->noticiaMapper->updateImage($this->noticia);
                    //return true;
                }
            }
            return $update;
        }else{
            return false;
        }
    }

    public function upImage($name,$tempName,$dir)
    {
        return UploadImage::imagePrincipal($name,$tempName,$dir);
    }

    public function fetchByCategoria($categoriaid)
    {
        if ((int)$categoriaid > 0){
            $this->noticia->setCategoriaId($categoriaid);
            return $this->noticiaMapper->fetchByCategoria($this->noticia);
        }
    }

    public function delete($id)
    {
        if ((int) $id > 0){
            $this->noticia->setNoticiaId($id);
            $dados = $this->noticiaMapper->delete($this->noticia);
            if($dados){
                return json_encode([
                    'success' => true
                ]);
            }else{
                return json_encode([
                    'success' => false
                ]);
            }
        }
        return json_encode([
            'success' => false
        ]);
    }
}
