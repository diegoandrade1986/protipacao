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
                                     <a href="index.php">Home</a><span class="active">&nbsp;&raquo;&nbsp;&nbsp;Educação</span>
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
                        
                        <!-- Conteudo Titulo -->
                        <div class="col-sm-12 col-md-12 acima-titulo">
                            <h3 class="titulo-col-a">Educação</h3>
                                      
                       <!-- conteudo noticias ===============================  !-->

                            <?php
                            foreach ($noticia['dados'] as $d) {
                                $data  = new DateTime($d['data'])
                                ?>
                                <hr>
                                <section class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="col-xs-12 col-md-3">
                                        <a href="noticias.php?noticia=<?php echo $d['noticia_id'] ?>">
                                            <img src="<?php echo $d['thumbnail'] ?>" class="hover-img img-responsive" alt="" />
                                        </a>
                                        <p>
                                            Postada em:
                                            <strong>
                                                <?php echo date_format($data,'d') ?>
                                                /
                                            </strong>
                                    <span>
                                        <?php echo ucfirst(strftime('%B ',strtotime($d['data']))) . date_format($data,'Y') ?>
                                    </span>
                                        </p>
                                    </div>
                                    <div class="col-md-offset-1 col-xs-12 col-sm-12 col-md-8">
                                        <h6 class="titulo-noticia-col-a">
                                            <a href="noticias.php?noticia=<?php echo $d['noticia_id'] ?>">
                                                <?php echo $d['titulo'] ?>
                                            </a>
                                        </h6>
                                        <p><?php echo $noticiaService->limitaString($d['descricao'],380)?></p>
                                        <a class="btn btn-default btn-sm" href="noticias.php?noticia=<?php echo $d['noticia_id'] ?>">
                                            Leia mais...
                                        </a>
                                    </div>
                                    <div class="col-md-12">
                                        <hr>
                                    </div>
                                </section><!--featured-widget-->


                            <?php } ?>
                            <section class="col-xs-12 col-sm-12 col-md-12">
                                <center>   
                                    <?php
                                        //var_dump($noticia['links']['all']);
                                        echo $noticia['links']['all'];
                                    ?>
                                </center>
                            </section>
                        </div>
                        <!-- Fim ROW conteudo ========================================  !-->
                        
                        <!-- Final do Conteudo da página******************************** -->
                    </article><!-- FIM DO CONTEUDO DA PÁGINA -->
                </div>
            </div>
        </div>    

        <!-- ======================================================================== -->
        <!-- FIM DO CONTEUDO DA PÁGINA ============================================== -->
        <!-- ======================================================================== -->