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

$noticiaId = filter_var($_GET['noticia'], FILTER_SANITIZE_NUMBER_INT);
$noticiaService = new NoticiaService(new Noticia(),new NoticiaMapper());
$dados = $noticiaService->fetch($noticiaId);
$noticiasRelacionadas = $noticiaService->noticiaRelacionada($noticiaId,$dados->categoria_id);
$categoriaService = new CategoriaService(new Categoria(),new CategoriaMapper());
$dadoscategoria = $categoriaService->fetch($dados->categoria_id);
?>
<!-- Conteudo -->

    
<!-- Inicio ROW 1 --===================================================================================  !-->    
<div class="container">
    <!-- Breadcrumb -->
    <div class="breadcrumb clearfix">
        <span>Você está na página:</span>
        <a href="<?php echo strtolower($dadoscategoria->categoria_nome); ?>.php" class="active"><?php echo ucfirst($dadoscategoria->categoria_nome); ?></a>
        <span class="current-page">&nbsp;&raquo;&nbsp;&nbsp;<?php echo $dados->titulo?></span>
    </div>
    <!-- Fim Breadcrumb -->
    <!-- Notícia -->
    <div class="col-sm-9">
    	<section class="body">
            <hr>
			<h2><?php echo $dados->titulo?></h2>
            <p>Noticia postada em: <?php echo date("d/m/Y",strtotime($dados->data))?></p>
            <hr>
            <img class="img-responsive" title="<?php echo $dados->titulo?>" src="<?php echo $dados->imagem?>" />
            <?php echo $dados->descricao ?>
        </section>
	</div>
	 <div class="col-sm-3">
        <h3>Outras Notícias</h3>
        <section>
            <?php foreach ($noticiasRelacionadas as $nr) { ?>
                <a href="noticias.php?noticia=<?php echo $nr->noticia_id ?>">
                    <h4><?php echo $nr->titulo ?></h4>
                    <p><?php echo $noticiaService->limitaString($nr->descricao,130)?></p>
                </a>
                <hr>
            <?php } ?>
        </section>
    </div>
</div>
<?php
    include 'inisite2.php';
?>