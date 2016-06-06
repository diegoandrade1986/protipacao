<?php
include 'inisite1.php';
include 'header.php';
include 'nav.php';
require_once __DIR__.'/src/Fatec/Entity/Noticia.php';
require_once __DIR__.'/src/Fatec/Mapper/NoticiaMapper.php';
require_once __DIR__.'/src/Fatec/Service/NoticiaService.php';
require_once __DIR__.'/src/Fatec/Entity/Categoria.php';
require_once __DIR__.'/src/Fatec/Mapper/CategoriaMapper.php';
require_once __DIR__.'/src/Fatec/Service/CategoriaService.php';
$arquivo = explode("/",$_SERVER['SCRIPT_NAME']);
$nomearquivo = str_replace(".php","",$arquivo[count($arquivo)-1]);
$categoriaService = new CategoriaService(new Categoria(),new CategoriaMapper());
$categoria = $categoriaService->fetchByName($nomearquivo);
$noticiaService = new NoticiaService(new Noticia(),new NoticiaMapper());
$noticia = $noticiaService->fetchAllNoticia($categoria->categoria_id);
//var_dump($noticia);
?>
<div class="container">
    <div class="wrapper clearfix">
        <div id="main-content">
            <div id="main-content-inner">
                <div class="main-content-top clearfix">
                    <div class="breadcrumb clearfix">
                        <span>Você está na página:</span>
                        <a href="educacao.php" class="active">Educação</a><span class="current-page">&nbsp;&raquo;&nbsp;&nbsp;Educação</span>
                    </div><!--breadcrumb-->

                    <!-- Insira abaixo dentro de "conteudo" o assunto de sua página -->
                    <!-- Conteudo -->

                    <div class="container col-sm-12">

                        <section class="widget featured-widget">
                            <h3 class="widget-title"><span>Educação</span></h3>
                            <div class="list-carousel responsive">
                                <ul class="featured-news clearfix">
                                    <div class="col-sm-12 row">
                                        <?php foreach ($noticia['dados'] as $d) {
                                            $data  = new DateTime($d['data'])
                                        ?>
                                        <li>
                                            <article class="entry-item">
                                                <header class="clearfix">
                                                    <a href="noticias.php?noticia=<?php echo $d['noticia_id'] ?>"><img src=<?php echo $d['thumbnail'] ?> class="responsive-img hover-img" alt="" /></a>
                                                    <p><strong><?php echo date_format($data,'d') ?> /</strong><span><?php echo ucfirst(strftime('%B ',strtotime($d['data']))) . date_format($data,'Y') ?></span></p>
                                                    <!--<a href="#" class="entry-comments">16 Comments</a>-->
                                                </header>
                                                <div class="entry-content">
                                                    <h6 class="entry-title"><a href="noticias.php?noticia=<?php echo $d['noticia_id'] ?>"><?php echo $d['titulo'] ?></a></h6>
                                                    <p><?php echo $noticiaService->limitaString($d['descricao'],250)   ?></p>
                                                    <a class="more-link" href="noticias.php?noticia=<?php echo $d['noticia_id'] ?>">Saiba Mais</a>
                                                </div><!--entry-content-->
                                            </article><!--entry-item-->
                                        </li>
                                        <?php } ?>


                                    </div>
                                </ul><!--end:featured-news-->
                                <div class="clear"></div>
                            </div><!--end:list-carousel-->
                        </section><!--featured-widget-->
                        <div class="row btn btn-block font-link">
                            <?php echo $noticia['links']['all']?>
                        </div>
                    </div>
                    <!-- Fim ROW conteudo =============================================================================  !-->
<?php
include 'inisite2.php';
?>