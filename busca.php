<?php
include "pag-html-abre.php";
include "header.php";
include "nav.php";
require_once __DIR__.'/src/Fatec/Entity/Noticia.php';
require_once __DIR__.'/src/Fatec/Mapper/NoticiaMapper.php';
require_once __DIR__.'/src/Fatec/Service/NoticiaService.php';
require_once __DIR__.'/src/Fatec/Entity/Categoria.php';
require_once __DIR__.'/src/Fatec/Mapper/CategoriaMapper.php';
require_once __DIR__.'/src/Fatec/Service/CategoriaService.php';
$search = isset($_POST['search'])?$_POST['search']:"";
$noticiaService = new NoticiaService(new Noticia(),new NoticiaMapper());
$dadosbusca = $noticiaService->fetchSearch($search);

//var_dump($dadosbusca);
?>
    <div class="container">
    <div class="wrapper clearfix">
    <div id="main-content">
    <div id="main-content-inner">
    <div class="main-content-top clearfix">
        <div class="breadcrumb clearfix">
            <span>Você está na página:</span>
            <span class="current-page">&nbsp;&raquo;&nbsp;&nbsp;Busca</span>
        </div><!--breadcrumb-->

        <!-- Insira abaixo dentro de "conteudo" o assunto de sua página -->
        <!-- Conteudo -->

        <div class="container col-sm-12">

            <section class="widget featured-widget">
                <h3 class="widget-title"><span>Busca</span></h3>
                <?php if ($dadosbusca) { ?>
                <?php foreach ($dadosbusca as $d) {
                    ?>
                    <div class="col-sm-12 row">
                        <article class="entry-item">
                            <header class="clearfix">
                                <a href="noticias.php?noticia=<?php echo $d->noticia_id ?>">
                                    <strong><?php echo $d->titulo ?> </strong></a>
                                    <!--<p><?php /*echo substr($d->descricao,0,300) */?></p>-->
                                    <p><?php echo $noticiaService->limitaString($d->descricao,300) ?></p>
                            <hr>
                            </header>
                        </article><!--entry-item-->
                    </div>
                <?php } ?>
                <div class="clear"></div>
        </div><!--end:list-carousel-->
        <?php } else {?>
            <h3>Desculpe, Nada encontrado! Tente Novamente.</h3>
        <?php }?>
        </section><!--featured-widget-->
        <div class="row btn btn-block font-link">
            <?php echo $dadosbusca['links']['all'];?>
        </div>
    </div>
    <!-- Fim ROW conteudo =============================================================================  !-->
<?php
include "pag-html-fecha.php";
?>