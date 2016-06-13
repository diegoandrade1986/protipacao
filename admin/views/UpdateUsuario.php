<?php
require_once __DIR__."/../../src/Fatec/Entity/Categoria.php";
require_once __DIR__."/../../src/Fatec/Mapper/CategoriaMapper.php";
require_once __DIR__."/../../src/Fatec/Service/CategoriaService.php";
require_once __DIR__."/../../src/Fatec/Entity/Usuario.php";
require_once __DIR__."/../../src/Fatec/Mapper/UsuarioMapper.php";
require_once __DIR__."/../../src/Fatec/Service/UsuarioService.php";
$div = "";
$name = '';
if (isset($_POST['alterarUsuario'])){
    $dados = [
        "nome" => $_POST['nome'],
        "email" => $_POST['email'],
        "username" => $_POST['username'],
        "senha" => $_POST['senha'],
        "nivel" => $_POST['nivel'],
        "usuarioid" => $_POST['update']
    ];
    //var_dump($dados);
    //exit();
    if ($dados['nome'] != "") {
        /*$foto = $_FILES['img-noticia']['name'];
        $temp = $_FILES['img-noticia']['tmp_name'];
        */
        $usuarioService = new UsuarioService(new Usuario(),new UsuarioMapper());
        $dadosResult = $usuarioService->update($dados);
        if ($dadosResult) {
            //$usuarioService = new NoticiaService(new Noticia(),new NoticiaMapper());
            $result = $usuarioService->fetch($dados['usuarioid']);
            if ($result){
                $nome = $result->nome;
                $email = $result->email;
                $username = $result->username;
                $senha = $result->senha;
                $nivel = $result->nivel;
                $usuarioid = $result->usuario_id;
            }
            $div = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Usuário Alterado Com Sucesso!</h4>
                </div>';
        }
    }else{
        $div = '<div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Erro ao Atualizar Usuário!</h4>
            </div>';
    }
}else{
    $usuarioid = isset($_GET['usuario'])?$_GET['usuario']:'';
    $usuarioService = new UsuarioService(new Usuario(),new UsuarioMapper());
    $dados = $usuarioService->fetch($usuarioid);
    if ($dados){
        $nome = $dados->nome;
        $email = $dados->email;
        $username = $dados->username;
        $senha = $dados->senha;
        $nivel = $dados->nivel;
        $usuarioid = $dados->usuario_id;
    }
}
//$categoriaService = new CategoriaService(new Categoria(), new CategoriaMapper());
//$resultCategoria = $categoriaService->fetchAll();
?>
<div class="box box-info">
    <h3 class="box-title">Editando Usuário: <?php echo $nome; ?></h3>
    <!-- ALTERAR TABELA POSTERIORMENTE PARA RESPONSIVA -->
    <form class="form-horizontal" action="" method="POST" id="form_alterar">
        <input type="hidden" name="update" id="update" value="<?php echo $usuarioid ?>" >
        <div class="col-sm-12">
            <label for="nome"><b><span class="text-danger">*</span></b> Nome </label>
            <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" value="<?php echo $nome; ?>" required>
        </div>
        <div class="col-sm-12">
            <label for="email"><b><span class="text-danger">*</span></b> E-mail </label>
            <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" value="<?php echo $email; ?>" required>
        </div>
        <div class="col-sm-12">
            <label for="username"><b><span class="text-danger">*</span></b> Usuário </label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Usuário" value="<?php echo $username; ?>" required>
        </div>
        <div class="col-sm-12">
            <label for="senha"><b><span class="text-danger">*</span></b> Senha </label>
            <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha" value="<?php echo $senha; ?>" required>
        </div>
        <div class="col-sm-6">
            <label for="nivel"><b><span class="text-danger">*</span></b> Nivel </label>
            <select class="form-control" id="nivel" name="nivel" required>
                <?php
                $selected_1 = '';
                $selected_2 = '';
                $selected_3 = '';
                if ($nivel == '1') $selected_1 = 'selected';
                if ($nivel == '2') $selected_2 = 'selected';
                if ($nivel == '3') $selected_3 = 'selected';
                ?>
                <option value="1" <?php echo $selected_1?>>Usuário Comum</option>
                <option value="2" <?php echo $selected_2?>>Funcionário</option>
                <option value="3" <?php echo $selected_3?>>Administrador</option>
            </select>
        </div>
        <div class="col-sm-12"></div>
        <div class="col-md-12 btn-final">
            <p class="col-md-12 btn-final">
                <p>Obs:. <b><span class="text-danger">*</span></b> Campos Obrigatórios</p>
            </p>
            <p class="col-md-12">
                <div class="col-md-1">
                    <button type="submit" id="alterarUsuario" name="alterarUsuario" class="btn btn-default btn-primary pull-right">Salvar</button>
                </div>
                <div class="col-md-1">
                    <a href="index.php?pg=8" class="btn btn-default btn-danger pull-right">Cancelar</a>
                </div>
            </p>
        </div>
        <div class="col-sm-12">
            <?php echo $div; ?>
        </div>
    </form>
</div>