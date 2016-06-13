<?php
if (!isset($_SESSION['logado'])){
    ob_start();
    //header("refresh: 3; url=login.php");
    header("location:login.php");
    exit();
}

