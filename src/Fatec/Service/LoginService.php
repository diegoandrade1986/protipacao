<?php
/**
 * Created by PhpStorm.
 * User: diego
 * Date: 28/03/16
 * Time: 12:50
 */

/*namespace Criasoft\Financeiro\Service;
use Criasoft\Financeiro\Entity\Login;
use Criasoft\Financeiro\Mapper\LoginMapper;*/
require_once __DIR__."/../Entity/Login.php";
require_once __DIR__."/../Mapper/LoginMapper.php";
class LoginService
{
    private $login;
    private $loginMapper;

    public function __construct(Login $login,LoginMapper $loginMapper)
    {
        $this->login = $login;
        $this->loginMapper = $loginMapper;
    }

    public function logar(array $dados)
    {
        $login = $dados['login'];
        $senha = $dados['senha'];
        if (trim($login) != "" && trim($senha) != "") {
            $this->login->setLogin($login);
            $this->login->setSenha(md5($senha));
            $result = $this->loginMapper->logar($this->login);
            if ($result) {
                $_SESSION['logadoAdm'] = true;
                $_SESSION['nivel'] = $result->nivel;
                $_SESSION['nome'] = $result->nome;
                return $result;
            }
        }
        return false;

    }

}