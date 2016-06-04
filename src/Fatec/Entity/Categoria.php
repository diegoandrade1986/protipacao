<?php
class Categoria
{
    private $categoriaid;
    private $categorianome;

    /**
     * @return mixed
     */
    public function getCategoriaId()
    {
        return $this->categoriaid;
    }

    /**
     * @param mixed $categoriaid
     */
    public function setCategoriaId($categoriaid)
    {
        $this->categoriaid = $categoriaid;
    }

    /**
     * @return mixed
     */
    public function getCategoriaNome()
    {
        return $this->categorianome;
    }

    /**
     * @param mixed $nome
     */
    public function setCategoriaNome($nome)
    {
        $this->categorianome = $nome;
    }
}