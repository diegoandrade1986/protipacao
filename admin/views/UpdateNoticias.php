<?php
require_once __DIR__."/../../src/Fatec/Entity/Categoria.php";
require_once __DIR__."/../../src/Fatec/Mapper/CategoriaMapper.php";
require_once __DIR__."/../../src/Fatec/Service/CategoriaService.php";
require_once __DIR__."/../../src/Fatec/Entity/Noticia.php";
require_once __DIR__."/../../src/Fatec/Mapper/NoticiaMapper.php";
require_once __DIR__ . "/../../src/Fatec/Service/NoticiaService.php";
$div = "";
$name = '';
if (isset($_POST['alterarNoticia'])){
    $titulo = isset($_POST['titulo'])?$_POST['titulo']:'';
    $categoriaid = isset($_POST['categoria'])?$_POST['categoria']:'';
    $noticiaid = isset($_POST['update'])?$_POST['update']:'';
    $noticia = isset($_POST['noticia'])?$_POST['noticia']:'';
    if ($titulo != "") {
        /*$foto = $_FILES['img-noticia']['name'];
        $temp = $_FILES['img-noticia']['tmp_name'];
        */
        $categoriaService = new CategoriaService(new Categoria(), new CategoriaMapper());
        $resultCategoria = $categoriaService->fetch($categoriaid);
        if ($resultCategoria){
            $noticiaService = new NoticiaService(new Noticia(),new NoticiaMapper());
            $dados = $noticiaService->update([
                'noticiaid' => $noticiaid,
                'titulo' => $titulo,
                'categoriaid' => $resultCategoria->categoria_id,
                'descricao' => $noticia,
                'img' => $_FILES,
                'dir' => strtolower($resultCategoria->categoria_nome)
            ]);
            //var_dump($dados);
            if ($dados) {
                $noticiaService = new NoticiaService(new Noticia(),new NoticiaMapper());
                $dados = $noticiaService->fetch($noticiaid);
                if ($dados){
                    $titulo = $dados->titulo;
                    $categoriaid = $dados->categoria_id;
                    $noticia = $dados->descricao;
                    $imagem = $dados->thumbnail;
                }
                $div = '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Notícia Alterada Com Sucesso!</h4>
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
 }else{
    $noticiaid = isset($_GET['noticia'])?$_GET['noticia']:'';
    $noticiaService = new NoticiaService(new Noticia(),new NoticiaMapper());
    $dados = $noticiaService->fetch($noticiaid);
    if ($dados){
        $titulo = $dados->titulo;
        $categoriaid = $dados->categoria_id;
        $noticia = $dados->descricao;
        $imagem = $dados->thumbnail;
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
            <li class="active">Alterando Notícia: <b><?php echo $titulo ?></b></li>
        </ol>
    </div>
    <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
        <input type="hidden" name="update" id="update" value="<?php echo $noticiaid ?>" >
        <div class="row">
        <div class="col-sm-12">
            <label for="titulo"><b><span class="text-danger">*</span></b> Titulo </label>
            <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Título" value="<?php echo $titulo ?>" required>
        </div>
    </div>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <label for="img-noticia">Nova Imagem<!--: <small>* não fazer upload da imagem caso não queira trocar</small>--></label>
                    <small>* Caso nao escolha outra imagem, a imagem continuará sendo a mesma da imagem atual</small>
                    <input type="file" class="form-control filestyle" data-input="false" data-buttonText="Escolha a Imagem" name="img-noticia" id="img-noticia">
                </div>
                <div class="row">
                    <label for="categoria"><b><span class="text-danger">*</span></b> Categoria da Notícia </label>
                    <select class="form-control" id="categoria" name="categoria" required>
                        <option value="">Escolha a categoria</option>
                        <?php
                        foreach ($resultCategoria as $categoria){
                            $selected = "";
                            if ($categoria->categoria_id == $categoriaid) $selected = "selected";
                            echo "<option value='$categoria->categoria_id' $selected>" . ucfirst($categoria->categoria_nome) . "</option>";
                        }
                        ?>

                    </select>
                </div>
            </div>
            <div class="col-md-offset-1 col-md-4 col-md-offset-1">
                <label for="noticia-imagem">Imagem Atual</label>
                <img src="../<?= $imagem ?>" name="noticia-imagem" class="img-responsive"/>
            </div>
        </div>
   </div>
    <div class="row">
        <div class="col-md-12">
            <hr>
            <label for="noticia"><b><span class="text-danger">*</span></b> Notícia </label>
            <textarea class="textarea " id="noticia" name="noticia" placeholder="Texto da notícia" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required><?php echo $noticia ?></textarea> 
        </div>
    </div>
        <div class="col-md-12 btn-final">
            <p class="col-md-12 btn-final">
            <p>Obs:. <b><span class="text-danger">*</span></b> Campos Obrigatórios</p>
            </p>
            <p class="col-md-12">
            <div class="col-xs-6 col-sm-6 btn-group-sm">
                <button type="submit" id="alterarNoticia" name="alterarNoticia" class="btn btn-default btn-primary">Salvar</button>
                <a href="index.php?pg=8" class="btn btn-default btn-danger">Cancelar</a>
            </div>
            </p>
        </div>

    <!--<div class="col-md-12">
        <button type="submit" id="alterarNoticia" name="alterarNoticia" class="btn btn-default btn-primary pull-right">Salvar</button>
    </div>-->
        <div class="col-sm-12">
            <?php echo $div; ?>
        </div>
</form>
    
</section>
    </div>