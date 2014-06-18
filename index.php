<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
require 'dba.class.php';
require 'user.class.php';
$user = new User();
$dba = new Dba();

$p = isset($_GET['p'])?$_GET['p']:'entrada';
if($p == 'logoff'){
    $user->logoff();
}

$new = isset($_POST['acao'])? $_POST: false;

if ($new !== false) {
    if(isset($new['from']) && !empty($new['destino']) && !empty($new['subject']) && !empty($new['message']) ){
        $resp = $dba->enviaMsg($new);
        if ($resp == true) {
            header('location:index.php');
        }
    }else{
        header('location:index.php?p=enviar');
    }
}

$verificacao = $user->verifica();

if ($verificacao == false) {
    header('location:login.php');
}else{
    $user->sessionStart();
    $id_ses = $_SESSION['myapp']['id'];
    $name_ses = $_SESSION['myapp']['nome'];
}

// echo $name_ses;

 ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <title>mail</title>
</head>
<body>
    <div class="container">
        <div class="left-menu">
            <ul class="ul-menu">
                <li class="titulo-menu"><a href="index.php?p=enviar">Nova Msg</a></li>
                <li class="ul-menu-li"><a href="index.php?p=entrada">Entrada</a></li>
                <li class="ul-menu-li"><a href="index.php?p=saida">Saida</a></li>
                <li class="ul-menu-li"><a href="index.php?p=logoff">Logoff</a></li>
            </ul>
        </div>
        <div class="right-menu">
            <?php include_once(''.$p.'.php') ?>
        </div>
    </div>
</body>
</html>
