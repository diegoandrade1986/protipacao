<?php

require_once __DIR__.'/../../libs/Pager-2.4.9/Pager.php';
require_once __DIR__.'/../../libs/Pager-2.4.9/Pager/Jumping.php';
require_once __DIR__."/../../src/Fatec/Entity/Usuario.php";
require_once __DIR__."/../../src/Fatec/Mapper/UsuarioMapper.php";
require_once __DIR__."/../../src/Fatec/Service/UsuarioService.php";

if (isset($_POST['cadastrarUsuario'])){

    
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
$usuarioService = new UsuarioService(new Usuario(), new UsuarioMapper());
$dadosUsuario = $usuarioService->fetchAll();
?>
    <div class="container-fluid">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active">Listar Usuarios</li>
        </ol>
    </div>


        <div class="box box-info">
            <h3 class="box-title">Listar Usuarios</h3>
            <!-- ALTERAR TABELA POSTERIORMENTE PARA RESPONSIVA -->
            <?php
            $params = array(
                "mode" => 'Jumping', // MODO DAS PÁGINAS
                "perPage" => 10, // REGISTROS POR PÁGINA
                "delta" =>5, // NUMEROS DE LINKS
                'itemData' => $dadosUsuario
            );
            $pager = & Pager::factory($params); // faz a fabrica com o array - params
            $data = $pager->getPageData(); //Contem todos os dados a consulta listar()
            //print_r($data);
            foreach ($data as $d) {
                ?>
                <form class="form-horizontal" action="" method="POST" id="form_alterar">
                    <div class="form-group">
                        <label for="categoriaNome" class="col-sm-1 control-label">Nome: </label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $d['username']; ?>" disabled>
                        </div>
                        <label for="email" class="col-sm-1 control-label">E-mail: </label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="email" id="email" placeholder="E-mail" value="<?php echo $d['email']; ?>" disabled>
                        </div>
                        <div class="col-sm-3">
                            <a href="" class="btn btn-default">Editar</a>
                            <?php if ($_SESSION['nivel'] == '3'){?>
                                <a href="<?php echo $d['usuario_id']; ?>" class="btn btn-danger" name="conf-exc">Excluir</a>
                            <?php } ?>
                        </div>
                    </div>
                </form>
                <hr>
                <?php
            }
            ?>
            <?php
            $links = $pager->getLinks(); // PEGANDO TODOS OS LINKS
            echo $links['all']; // MOSTRANDO OS LINKS, PAGINACAO
            ?>
        </div><!-- box box-info -->
    </div><!-- CONTAINER FLUID-->
<?php
echo "<script>document.getElementById('adminNome').focus();</script>";
?>