<?php
require_once __DIR__."/../Entity/Usuario.php";
require_once __DIR__."/../Mapper/UsuarioMapper.php";
class UsuarioService
{
    private $usuario;
    private $usuarioMapper;

    public function __construct(Usuario $usuario,UsuarioMapper $usuarioMapper)
    {
        $this->usuario = $usuario;
        $this->usuarioMapper = $usuarioMapper;
    }

    public function insert($dados)
    {
        $usuarioEntity = $this->usuario;
        //$this->tabela->setArray($dados);
        $usuarioEntity->setNome($dados['nome']);
        $usuarioEntity->setEmail($dados['email']);
        $usuarioEntity->setUsername($dados['username']);
        $usuarioEntity->setSenha(md5($dados['senha']));
        $usuarioEntity->setNivel($dados['nivel']);
        $result = $this->usuarioMapper->insert($usuarioEntity);
        /*if ($result) {
            $_SESSION['logado'] = true;
            $_SESSION['adm'] = $result->adm;
            $_SESSION['login'] = $result->login;*/
            return $result;
//        }
//        return false;

    }

    public function fetchAll()
    {
        return $this->usuarioMapper->fetchAll();
    }

    public function delete($id)
    {
        if ((int)$id > 0) {
            if ($this->usuarioMapper->delete($id)) {
                return json_encode([
                    'success' => true
                ]);
            }
            return json_encode([
                'success' => false
            ]);
        }
        return json_encode([
            'success' => false
        ]);
    }
    public function fetch($id)
    {
        if ((int)$id) {
            $result = $this->tabelaMapper->fetch($id);
            return $result;
        }
        return [
            "success" => false
        ];

    }

}