<!-- ======================================================================== -->
<!-- INICIO CONTEUDO DA PÁGINA ============================================== -->
<!-- ======================================================================== -->
<div id="main-content">
    <div id="main-content-inner">
        <div class="main-content-top clearfix">
            <div class="col-sm-12">
                <div class="breadcrumb clearfix">
                    <div class="alinha-texto">
                        <span>Você está na página:</span>
                                <span class="current-page">
                                    <a href="index.php" class="active">Home</a>
                                </span>
                    </div>
                    <div id="search-social" class="clearfix">
                        <!-- Aumentar e Diminuir Texto!.................. -->
                        <div class="aumenta-diminui">
                            <span><i>Tamanho Fonte:</i></span>
                            <span class="menuitem8 inc-font btn-sm" title="Aumentar fonte">A+</span>
                            <span class="menuitem9 res-font btn-sm" title="Tamanho normal da fonte">(-)</span>
                            <span class="menuitem10 dec-font btn-sm" title="Diminuir fonte">A-</span>
                        </div>
                    </div>
                </div><!--Fim Breadcrump-->
            </div>

            <article class="col-sm-12">
                <!-- INSIRA SEU CONTEUDO LOGO ABAIXO -->

                <!-- Coluna A -->
                <div class="col-sm-12 col-md-8 acima-titulo">
                    <!-- EDUCAÇAO -->
                    <div class="row">
                        <h3 class="titulo-col-a">Educação</h3>
                        <?php
                        foreach($educacao as $e) {
                            $data  = new DateTime($e->data)
                            ?>
                            <section class="col-xs-12 col-sm-6 col-md-6">
                                <div>
                                    <a href="noticias.php?noticia=<?php echo $e->noticia_id ?>">
                                        <img src="<?php echo $e->thumbnail ?>" class="img-responsive hover-img" alt="" /></a>
                                </div>
                                <h6>Data Postagem: <?php echo date_format($data,'d') ?>/<?php echo ucfirst(strftime('%B ',strtotime($e->data))) . date_format($data,'Y') ?></h6>
                                <h4 class="titulo-noticia-col-a"><a href="noticias.php?noticia=<?php echo $e->noticia_id ?>" ><?php echo $e->titulo ?></a></h4>
                                <p><?php echo $noticiaService->limitaString($e->descricao,200)?> ...</p>
                                <a href="noticias.php?noticia=<?php echo $e->noticia_id ?>" class="btn btn-default btn-sm">
                                    Leia mais...
                                </a>
                                <div class="separator"></div>
                            </section><!-- fim conteudo-index -->
                        <?php } ?>
                        <div class="col-md-12"><hr></div>
                    </div>
                    <!-- FIM EDUCAÇAO -->
                    <!-- ENTRETENIMENTO -->
                    <div class="row">
                        <h3 class="titulo-col-a">Entretenimento</h3>
                        <?php
                        foreach($entretenimento as $e) {
                            $data  = new DateTime($e->data)
                            ?>
                            <section class="col-xs-12 col-sm-6 col-md-6">
                                <div>
                                    <a href="noticias.php?noticia=<?php echo $e->noticia_id ?>">
                                        <img src="<?php echo $e->thumbnail ?>" class="img-responsive hover-img" alt="" /></a>
                                </div>
                                <h6>Data Postagem: <?php echo date_format($data,'d') ?>/<?php echo ucfirst(strftime('%B ',strtotime($e->data))) . date_format($data,'Y') ?></h6>
                                <h4 class="titulo-noticia-col-a"><a href="noticias.php?noticia=<?php echo $e->noticia_id ?>" ><?php echo $e->titulo ?></a></h4>
                                <p><?php echo $noticiaService->limitaString($e->descricao,200)?> ...</p>
                                <a href="noticias.php?noticia=<?php echo $e->noticia_id ?>" class="btn btn-default btn-sm">
                                    Leia mais...
                                </a>
                                <div class="separator"></div>
                            </section><!-- fim conteudo-index -->
                        <?php } ?>
                        <div class="col-md-12"><hr></div>
                    </div>
                    <!-- FIM ENTRETENIMENTO -->
                    <!-- ESPORTE -->
                    <div class="row">
                        <h3 class="titulo-col-a">Esporte</h3>
                        <?php
                        foreach($esporte as $e) {
                            $data  = new DateTime($e->data)
                            ?>
                            <section class="col-xs-12 col-sm-6 col-md-6">
                                <div class="imgtamanho">
                                    <a href="noticias.php?noticia=<?php echo $e->noticia_id ?>" >
                                        <img src="<?php echo $e->thumbnail ?>" class="img-responsive hover-img" alt="" /></a>
                                </div>
                                <h6>Data Postagem: <?php echo date_format($data,'d') ?>/<?php echo ucfirst(strftime('%B ',strtotime($e->data))) . date_format($data,'Y') ?></h6>
                                <h4 class="titulo-noticia-col-a"><a href="noticias.php?noticia=<?php echo $e->noticia_id ?>" ><?php echo $e->titulo ?></a></h4>
                                <p><?php echo $noticiaService->limitaString($e->descricao,200)?> ...</p>
                                <a href="noticias.php?noticia=<?php echo $e->noticia_id ?>" class="btn btn-default btn-sm">
                                    Leia mais...
                                </a>
                                <div class="separator"></div>
                            </section><!-- fim conteudo-index -->
                        <?php } ?>
                        <div class="col-md-12"><hr></div>
                    </div>
                    <!-- FIM ESPORTE -->
                    <!-- POLITICA -->
                    <div class="row">
                        <h3 class="titulo-col-a">Política</h3>
                        <?php
                        foreach($politica as $e) {
                            $data  = new DateTime($e->data)
                            ?>
                            <section class="col-xs-12 col-sm-6 col-md-6">
                                <div>
                                    <a href="noticias.php?noticia=<?php echo $e->noticia_id ?>">
                                        <img src="<?php echo $e->thumbnail ?>" class="img-responsive hover-img" alt="" /></a>
                                </div>
                                <h6>Data Postagem: <?php echo date_format($data,'d') ?>/<?php echo ucfirst(strftime('%B ',strtotime($e->data))) . date_format($data,'Y') ?></h6>
                                <h4 class="titulo-noticia-col-a"><a href="noticias.php?noticia=<?php echo $e->noticia_id ?>" ><?php echo $e->titulo ?></a></h4>
                                <p><?php echo $noticiaService->limitaString($e->descricao,200)?> ...</p>
                                <a href="noticias.php?noticia=<?php echo $e->noticia_id ?>" class="btn btn-default btn-sm">
                                    Leia mais...
                                </a>
                                <div class="separator"></div>
                            </section><!-- fim conteudo-index -->
                        <?php } ?>
                        <div class="col-md-12"><hr></div>
                    </div>
                    <!-- FIM POLITICA -->
                    <!-- SAUDE -->
                    <div class="row">
                        <h3 class="titulo-col-a">Saúde</h3>
                        <?php
                        foreach($saude as $e) {
                            $data  = new DateTime($e->data)
                            ?>
                            <section class="col-xs-12 col-sm-6 col-md-6">
                                <div>
                                    <a href="noticias.php?noticia=<?php echo $e->noticia_id ?>">
                                        <img src="<?php echo $e->thumbnail ?>" class="img-responsive hover-img" alt="" /></a>
                                </div>
                                <h6>Data Postagem: <?php echo date_format($data,'d') ?>/<?php echo ucfirst(strftime('%B ',strtotime($e->data))) . date_format($data,'Y') ?></h6>
                                <h4 class="titulo-noticia-col-a"><a href="noticias.php?noticia=<?php echo $e->noticia_id ?>" ><?php echo $e->titulo ?></a></h4>
                                <p><?php echo $noticiaService->limitaString($e->descricao,200)?> ...</p>
                                <a href="noticias.php?noticia=<?php echo $e->noticia_id ?>" class="btn btn-default btn-sm">
                                    Leia mais...
                                </a>
                                <div class="separator"></div>
                            </section><!-- fim conteudo-index -->
                        <?php } ?>
                        <div class="col-md-12"><hr></div>
                    </div>
                    <!-- FIM SAUDE -->

                </div>
                <!-- fim Coluna A -->

                <!-- Coluna B -->
                <div class="col-sm-12 col-md-4 publicidade">
                    <aside class="col-sm-12">
                        <section class="col-sm-12">
                            <h4 class="titulo-col-b">Publicidade</h4>
                        </section>
                        <section class="col-sm-12">
                            <img src="img/parceiros/banner_empre_8701_2314.bmp" class="img-responsive">
                        </section>
                        <section class="col-sm-12">

                            <img src="img/parceiros/Prova_02_Banner_Vinhos_TERRA1.jpg" class="img-responsive">
                        </section>

                        <section class="col-sm-12">
                            <h4 class="titulo-col-b">Parceiros</h4>
                            <div class="col-xs-5 divisao">
                                <img src="img/parceiros/unimed.jpg" class="img-responsive" alt="" />
                            </div><!-- <DIVISÂO> -->
                            <div class="col-xs-2"></div>
                            <div class="col-xs-5 divisao">
                                <img src="img/parceiros/fatec.jpg" class="img-responsive" alt="" />
                            </div><!-- <DIVISÂO> -->
                            <div class="col-xs-5 divisao">
                                <img src="img/parceiros/thumb_logo-ski-em-alta-3d.png" class="img-responsive" alt="" />
                            </div><!-- <DIVISÂO> -->
                            <div class="col-xs-2"></div>
                            <div class="col-xs-5 divisao">
                                <img src="img/parceiros/roqueville.jpg" class="img-responsive" alt="" />
                            </div><!-- <DIVISÂO> -->


                        </section>
                    </aside>
                </div>

                <!-- Final do Conteudo da página******************************** -->
            </article><!-- FIM DO CONTEUDO DA PÁGINA -->
        </div>
    </div>
</div>

<!-- ======================================================================== -->
<!-- FIM DO CONTEUDO DA PÁGINA ============================================== -->
<!-- ======================================================================== -->