<?php
require_once __DIR__."/bootstrap.php";
$pgIncluir = "";
if (isset($_GET['pg']))
{
    $pg = [
        1 => 'CadNoticias.php',
        2 => 'ListarNoticias.php',
        3 => 'ListarNoticias.php',
        4 => 'ListarNoticias.php',
        5 => 'ListarNoticias.php',
        6 => 'ListarNoticias.php',
        7 => 'CadUsuario.php',
        8 => 'ListarUsuario.php',
        9 => 'UpdateNoticias.php'
    ];
    if ((int)$_GET['pg'] > 0 && (int)$_GET['pg'] <= 9){
        foreach ($pg as $p => $value) {
            if ($p == $_GET['pg']) $pgIncluir = "views/".$value;
        }
        if (trim($pgIncluir) == "") $pgIncluir = "views/home.php";
    }else{
        $pgIncluir = __DIR__."/views/home.php";
    }
}
else
{
    $pgIncluir = __DIR__."/views/home.php";
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Fatec | Administrativo</title>

    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">

    <!-- MetisMenu CSS -->
    <link href="css/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/style2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    

    <?php if ($_GET['pg'] == 1 || $_GET['pg'] == 9) { ?>
        <!-- EDITOR DE TEXTO PARA CADASTRO E ALTERAÇÂO -->
        <link rel="stylesheet" href="js/wysihtml5/bootstrap3-wysihtml5.min.css">
    <?php } ?>
</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><i class="fa fa-home" aria-hidden="true"></i>  Fatec Administrativo</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Sair</a>
        </ul>
        <!-- /.navbar-top-links -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <!--<li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </li>-->
                    <li>
                        <a href="index.php?pg=1"><i class="fa fa-plus-square" aria-hidden="true"></i>  Cadastrar Notícias<span class="fa arrow"></span></a>
                    </li>
                    
                    <li>
                        <a href="#"><i class="fa fa-book" aria-hidden="true"></i>  Listagem de Notícias<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="index.php?pg=2">Educação</a>
                            </li>
                            <li>
                                <a href="index.php?pg=3">Entretenimento</a>
                            </li>
                            <li>
                                <a href="index.php?pg=4">Esporte</a>
                            </li>
                            <li>
                                <a href="index.php?pg=5">Política</a>
                            </li>
                            <li>
                                <a href="index.php?pg=6">Saúde</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-users" aria-hidden="true"></i>  Usuários<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="index.php?pg=7">Cadastrar</a>
                            </li>
                            <li>
                                <a href="index.php?pg=8">Listar</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <div id="page-wrapper">
        <!-- incluindo a pagina -->
        <?php
            include_once ($pgIncluir);
        ?>

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="js/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap 3.3.5 -->
<script src="css/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<!--<script src="css/metisMenu/dist/metisMenu.min.js"></script>-->
<script src="css/metisMenu/dist/metisMenu.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/custom.js"></script>

<?php if ($_GET['pg'] == 2 || $_GET['pg'] == 3 || $_GET['pg'] == 4 || $_GET['pg'] == 5 || $_GET['pg'] == 6) { ?>
    <script src="js/noticia.js"></script>
<?php } ?>

<?php if ($_GET['pg'] == 7 || $_GET['pg'] == 8) { ?>
<script src="js/usuario.js"></script>
<?php } ?>

<?php if ($_GET['pg'] == 1 || $_GET['pg'] == 9) { ?>
    <!-- EDITOR DE TEXTO PARA CADASTRO E ALTERAÇÂO -->
    <script src="js/wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script src="js/textarea.js"></script>
    <script src="js/category.js"></script>
    <script src="js/bootstrap-filestyle.min.js"></script>
<?php } ?>

</body>

</html>


