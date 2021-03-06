<?php
require_once __DIR__."/../../src/Fatec/Entity/Categoria.php";
require_once __DIR__."/../../src/Fatec/Mapper/CategoriaMapper.php";
require_once __DIR__."/../../src/Fatec/Service/CategoriaService.php";
require_once __DIR__."/../../src/Fatec/Entity/Noticia.php";
require_once __DIR__."/../../src/Fatec/Mapper/NoticiaMapper.php";
require_once __DIR__ . "/../../src/Fatec/Service/NoticiaService.php";
$div = "";
$titulo = isset($_POST['titulo'])?$_POST['titulo']:'';
$categoria = isset($_POST['categoria'])?$_POST['categoria']:'';
$noticia = isset($_POST['noticia'])?$_POST['noticia']:'';
if (isset($_POST['cadastrarNoticia'])){
    if ($titulo != "") {
        /*$foto = $_FILES['img-noticia']['name'];
        $temp = $_FILES['img-noticia']['tmp_name'];
        */
        $categoriaService = new CategoriaService(new Categoria(), new CategoriaMapper());
        $resultCategoria = $categoriaService->fetch($categoria);
        //var_dump($resultCategoria);
        if ($resultCategoria){
            $noticiaService = new NoticiaService(new Noticia(),new NoticiaMapper());
            $dados = $noticiaService->insert([
                'titulo' => $titulo,
                'categoriaid' => $resultCategoria->categoria_id,
                'descricao' => $noticia,
                'img' => $_FILES,
                'dir' => strtolower($resultCategoria->categoria_nome)
            ]);
            if ($dados){
                $div = '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Notícia Cadastrada Com Sucesso!</h4>
                    </div>';
            }
        }else{
            $div = '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Categoria Não Encontrada!</h4>
                </div>';
        }


    }else{
        $div = '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Preencha Todos os Campos!</h4>
                </div>';
    }
 }
$categoriaService = new CategoriaService(new Categoria(), new CategoriaMapper());
$resultCategoria = $categoriaService->fetchAll();
?>
<div class="container-fluid">
    <section class="col-sm-12">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active">Cadastrar Notícias</li>
        </ol>
    </div>
    <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
    <div class="col-sm-12">
        <label for="titulo"><b><span class="text-danger">*</span></b> Titulo </label>
        <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Título" value="" required>
    </div>
    <div class="col-sm-12">
        <label for="img-noticia"><b><span class="text-danger">*</span></b> Imagem da notícia: </label>
        <input type="file" class="form-control filestyle" data-input="false" data-buttonText="Escolha a Imagem" name="img-noticia" id="img-noticia" required>
    </div>
    <div class="col-sm-6">
        <label for="categoria"><b><span class="text-danger">*</span></b> Categoria da Notícia </label>
        <select class="form-control" id="categoria" name="categoria" required>
            <option value="">Escolha a categoria</option>
            <?php foreach ($resultCategoria as $categoria){
                $selected = "";
                if ($categoria->categoria_nome == $categoria) $selected = "selected";
                echo "<option value='$categoria->categoria_id' $selected>" . ucfirst($categoria->categoria_nome) . "</option>";
            }?>
            
        </select>
    </div>
    <div class="col-md-12">
        <hr>    
        <label for="noticia"><b><span class="text-danger">*</span></b> Notícia </label>
        <textarea class="textarea " id="noticia" name="noticia" placeholder="Texto da notícia" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea> 
    </div>
        <div class="col-md-12 btn-final">
            <p class="col-md-12 btn-final">
            <p>Obs:. <b><span class="text-danger">*</span></b> Campos Obrigatórios</p>
            </p>
            <p class="col-md-12">
            <div class="col-xs-6 col-sm-6">
                <button type="submit" id="cadastrarNoticia" name="cadastrarNoticia" class="btn btn-default btn-primary ">Cadastrar</button>
                <a href="index.php" class="btn btn-default btn-danger">Cancelar</a>
            </div>
            </p>
        </div>
    <!--<div class="col-md-12">
        <button type="submit" id="cadastrarNoticia" name="cadastrarNoticia" class="btn btn-default btn-primary pull-right">Cadastrar</button>
    </div>-->
        <div class="col-sm-12">
            <?php echo $div; ?>
        </div>
</form>
    
</section>
    </div>