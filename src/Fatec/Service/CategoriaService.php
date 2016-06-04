<?php
require_once __DIR__."/../Entity/Categoria.php";
require_once __DIR__."/../Mapper/CategoriaMapper.php";
class CategoriaService
{
    private $categoria;
    private $categoriaMapper;

    public function __construct(Categoria $categoria,CategoriaMapper $categoriaMapper)
    {
        $this->categoria = $categoria;
        $this->categoriaMapper = $categoriaMapper;
    }

    public function fetchByName($nome)
    {
        if (trim($nome) != "") {
            $this->categoria->setCategoriaNome(strtoupper($nome));
            return $this->categoriaMapper->fetchByName($this->categoria);
        }
        return false;

    }

    public function fetch($id)
    {
        if ((int) $id > 0) {
            $this->categoria->setCategoriaId($id);
            return $this->categoriaMapper->fetch($this->categoria);
        }
        return false;

    }
    
    public function fetchAll()
    {
        return $this->categoriaMapper->fetchAll();
    }

}