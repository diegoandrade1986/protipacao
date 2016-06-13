<?php
session_start();
/*include_once 'functions/conexao/conexao.php';
include_once 'functions/login/login.php';*/
/*include_once 'functions/config/config.php';
try {
    carregaIncludes(array("conexao","login"),"login" );
} catch (Exception $e) {
    echo $e->getMessage();
}*/
require_once __DIR__."/../src/Fatec/Entity/Login.php";
require_once __DIR__."/../src/Fatec/Mapper/LoginMapper.php";
require_once __DIR__."/../src/Fatec/Service/LoginService.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (isset($_POST['logar']))
    {
        if ($_POST['login'] != "" && $_POST['senha'] != "") {
            $dados = [
                "login" => $_POST['login'],
                "senha" => $_POST['senha']
            ];
            $loginService = new LoginService(new Login(), new LoginMapper());
            $resultado = $loginService->logar($dados);
        }
    } // FIM POST LOGAR
} // FIM _SERVER

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Fatec | Administrativo</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Logue-se para continuar</h1>
            <div class="account-wall">
                <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                     alt="">
                <form class="form-signin" method="post">
                    <input type="text" class="form-control " name="login" placeholder="Usuário" required autofocus>
                    <input type="password" class="form-control" name="senha" placeholder="Senha" required>
                    <button class="btn btn-lg btn-primary btn-block" type="submit" name="logar" id="logar">
                        Logar</button>
                    <p><a href="/" class="pull-right need-help">Retornar ao site</a><span class="clearfix"></span></p>
                </form>
                <?php
                if (isset($_POST['logar'])){
                    if ($resultado && $_SESSION['logadoAdm']){
                        echo '<div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-check"></i> Logado Com Sucesso!</h4>
                            Redirecionando para o sistema
                            </div>';
                        header("Refresh:2,index.php");
                    }else{
                        echo '<div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-ban"></i> Erro ao Logar!</h4>
                            Dados Incorretos
                            </div>';
                    }
                }
                ?>
            </div>  <!-- ACCOUNT_WALL -->
        </div>  <!-- COL -->
    </div> <!-- ROW -->
</div> <!-- CONTAINER -->
<!-- REQUIRED JS SCRIPTS -->
<!-- Bootstrap 3.3.5 -->
<script src="../css/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
