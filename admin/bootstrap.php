<?php
session_start();
ob_start();
//session_destroy();
if (!isset($_SESSION['logadoAdm']) && !$_SESSION['logadoAdm']){
    //header("refresh: 3; url=login.php");
    header("refresh:0;url=admin/login.php");
    exit();
}

