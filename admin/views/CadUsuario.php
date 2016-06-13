<?php

$div = "";
if (isset($_POST['cadastrarUsuario'])){
    require_once __DIR__."/../../src/Fatec/Entity/Usuario.php";
    require_once __DIR__."/../../src/Fatec/Mapper/UsuarioMapper.php";
    require_once __DIR__."/../../src/Fatec/Service/UsuarioService.php";

    $dados = [
        "nome" => $_POST['nome'],
        "email" => $_POST['email'],
        "username" => $_POST['username'],
        "senha" => $_POST['senha'],
        "nivel" => $_POST['nivel']
    ];


    $usuarioService = new UsuarioService(new Usuario(), new UsuarioMapper());
    $result = $usuarioService->insert($dados);
    if ($result){
        $div = '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Usuário Cadastrado Com Sucesso!</h4>
                    </div>';
    }else{
        $div = '<div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-ban"></i> Erro ao Cadastrar!</h4>
                            Dados Incorretos
                            </div>';
    }
}
?>
<section class="col-sm-8">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active">Cadastrar Usuário</li>
        </ol>
    </div>
    <form class="form-horizontal" method="POST" action="">
        <div class="col-sm-12">
            <label for="nome"><b><span class="text-danger">*</span></b> Nome </label>
            <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" value="" required>
        </div>
        <div class="col-sm-12">
            <label for="email"><b><span class="text-danger">*</span></b> E-mail </label>
            <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" value="" required>
        </div>
        <div class="col-sm-12">
            <label for="username"><b><span class="text-danger">*</span></b> Usuário </label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Usuário" value="" required>
        </div>
        <div class="col-sm-12">
            <label for="senha"><b><span class="text-danger">*</span></b> Senha </label>
            <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha" value="" required>
        </div>
        <div class="col-sm-6">
            <label for="nivel"><b><span class="text-danger">*</span></b> Nivel </label>
            <select class="form-control" id="nivel" name="nivel" required>
                <option value="">Escolha o nível</option>
                <option value="1">Usuário Comum</option>
                <option value="2">Funcionário</option>
                <option value="3">Administrador</option>
            </select>
        </div>
        <div class="col-sm-12"></div>
        <div class="col-md-12 btn-final">
            <p class="col-md-12 btn-final">
            <p>Obs:. <b><span class="text-danger">*</span></b> Campos Obrigatórios</p>
            </p>
            <p class="col-md-12">
            <div class="col-md-2">
                <button type="submit" name="cadastrarUsuario" class="btn btn-default btn-primary pull-right">Cadastrar</button>
            </div>
            <div class="col-md-2">
                <a href="index.php?pg=8" class="btn btn-default btn-danger pull-right">Cancelar</a>
            </div>
            </p>
        </div>
        <div class="col-sm-12">
            <?php echo $div; ?>
        </div>
    </form>

</section>