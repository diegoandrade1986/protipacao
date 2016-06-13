<?php
include "pag-html-abre.php";
include "header.php";
include "nav.php";
//include "verifica_noticia.php";
require_once __DIR__.'/src/Fatec/Entity/Noticia.php';
require_once __DIR__.'/src/Fatec/Mapper/NoticiaMapper.php';
require_once __DIR__.'/src/Fatec/Service/NoticiaService.php';
require_once __DIR__.'/src/Fatec/Entity/Categoria.php';
require_once __DIR__.'/src/Fatec/Mapper/CategoriaMapper.php';
require_once __DIR__.'/src/Fatec/Service/CategoriaService.php';
/*$arquivo = explode("/",$_SERVER['SCRIPT_NAME']);
$nomearquivo = str_replace(".php","",$arquivo[count($arquivo)-1]);*/

$categoriaService = new CategoriaService(new Categoria(),new CategoriaMapper());
$noticiaService = new NoticiaService(new Noticia(),new NoticiaMapper());

$categoria = $categoriaService->fetchByName("Educacao");
$educacao = $noticiaService->fetchIndex($categoria->categoria_id);

$categoria = $categoriaService->fetchByName("Entretenimento");
$entretenimento = $noticiaService->fetchIndex($categoria->categoria_id);

$categoria = $categoriaService->fetchByName("Politica");
$politica = $noticiaService->fetchIndex($categoria->categoria_id);

$categoria = $categoriaService->fetchByName("Saude");
$saude = $noticiaService->fetchIndex($categoria->categoria_id);

$categoria = $categoriaService->fetchByName("Esporte");
$esporte = $noticiaService->fetchIndex($categoria->categoria_id);


include "conteudo/contem_index.php";
include "pag-html-fecha.php";
