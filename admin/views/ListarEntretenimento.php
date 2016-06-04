<?php

require_once __DIR__.'/../../libs/Pager-2.4.9/Pager.php';
require_once __DIR__.'/../../libs/Pager-2.4.9/Pager/Jumping.php';
require_once __DIR__."/../../src/Fatec/Entity/Noticia.php";
require_once __DIR__."/../../src/Fatec/Mapper/NoticiaMapper.php";
require_once __DIR__."/../../src/Fatec/Service/NoticiaService.php";
require_once __DIR__."/../../src/Fatec/Entity/Categoria.php";
require_once __DIR__."/../../src/Fatec/Mapper/CategoriaMapper.php";
require_once __DIR__."/../../src/Fatec/Service/CategoriaService.php";

/*Buscando o id da categoria no banco pela pagina que estamos no caso o nome da categoria*/
$categoriaService = new CategoriaService(new Categoria(), new CategoriaMapper());
$dadosCategoria = $categoriaService->fetchByName("entretenimento");
$nomeCategoria = $dadosCategoria->categoria_nome;

/*Buscando as noticias pela categoria*/
$noticiaService = new NoticiaService(new Noticia(), new NoticiaMapper());
$dadosNoticia = $noticiaService->fetchByCategoria($dadosCategoria->categoria_id);
?>
<input type="hidden" id="pg" value="<?php echo $_GET['pg']  ?>" />
    <div class="container-fluid">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active">Notícias Entretenimento</li>
        </ol>
    </div>


        <div class="box box-info">
            <h3 class="box-title">Listando Noticias: <b>Entretenimento</b></h3>
            <hr>
            <form class="form-horizontal" action="" method="POST" id="">

            <?php
            $params = array(
                "mode" => 'Jumping', // MODO DAS PÁGINAS
                "perPage" => 5, // REGISTROS POR PÁGINA
                "delta" =>5, // NUMEROS DE LINKS
                'itemData' => $dadosNoticia
            );
            $pager = & Pager::factory($params); // faz a fabrica com o array - params
            $data = $pager->getPageData(); //Contem todos os dados a consulta listar()
            //print_r($data);
            foreach ($data as $d) {
            ?>
                    <div class="form-group">
                        <div class="col-md-offset-1 col-md-2"><img src='../<?php echo $d['thumbnail'] ?>' class="img-responsive"/></div>
                        <div class="col-md-7"><?php echo $d['titulo'] ?> </div>
                        <div class="col-md-2">
                            <a href="" class="btn btn-success btn-sm">Editar</a>
                            <a href="<?php echo $d['noticia_id']?>" name="not-exc" class="btn btn-danger btn-sm">Excluir</a>
                        </div>
                    </div>
                <hr>
                <?php
            }
            ?>
            </form>
            <?php
            $links = $pager->getLinks(); // PEGANDO TODOS OS LINKS
            echo $links['all']; // MOSTRANDO OS LINKS, PAGINACAO
            ?>
        </div><!-- box box-info -->
    </div><!-- CONTAINER FLUID-->
