<?php
session_start();
if ($_SESSION['logadoAdm'] && $_SESSION['nivel'] == '3') {
    $acao = isset($_POST['acao']) ? $_POST['acao'] : "";
    ###############
    # Deletar Usuario
    ###############
    if($acao == "usuario" && (int)$_POST['userid'] > 0){
        require_once __DIR__."/../src/Fatec/Entity/Usuario.php";
        require_once __DIR__."/../src/Fatec/Mapper/UsuarioMapper.php";
        require_once __DIR__."/../src/Fatec/Service/UsuarioService.php";
        $usuarioService = new UsuarioService(new Usuario(), new UsuarioMapper());
        $delete = $usuarioService->delete($_POST['userid']);
        echo $delete;
    }

    $del = isset($_POST['del']) ? $_POST['del'] : "";
    if ($del == "ntc" && (int)$_POST['noticia'] > 0){
        require_once __DIR__."/../src/Fatec/Entity/Noticia.php";
        require_once __DIR__."/../src/Fatec/Mapper/NoticiaMapper.php";
        require_once __DIR__."/../src/Fatec/Service/NoticiaService.php";
        $noticiaService = new NoticiaService(new Noticia(), new NoticiaMapper());
        $delete = $noticiaService->delete($_POST['noticia']);
        echo $delete;
    }
}else{
    echo json_encode([
      'success' => false
    ]);
}