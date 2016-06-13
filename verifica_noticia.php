<?php
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