<?php

class Noticia
{
    private $noticiaId;
    private $titulo;
    private $categoriaId;
    private $img;
    private $thumbnail;
    private $descricao;
    public $dir;

    /**
     * @return mixed
     */
    public function getNoticiaId()
    {
        return $this->noticiaId;
    }

    /**
     * @param mixed $noticiaId
     */
    public function setNoticiaId($noticiaId)
    {
        $this->noticiaId = $noticiaId;
    }

    /**
     * @return mixed
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @param mixed $titulo
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    /**
     * @return mixed
     */
    public function getCategoriaId()
    {
        return $this->categoriaId;
    }

    /**
     * @param mixed $categoriaId
     */
    public function setCategoriaId($categoriaId)
    {
        $this->categoriaId = $categoriaId;
    }

    /**
     * @return mixed
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @param mixed $img
     */
    public function setImg($img)
    {
        $this->img = $img;
    }

    /**
     * @return mixed
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * @param mixed $thumbnail
     */
    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;
    }

    /**
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param mixed $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }





}