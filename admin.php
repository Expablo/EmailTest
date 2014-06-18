<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
require 'dba.class.php';
$dba = new Dba();
$post = isset($_POST['acao'])?$_POST:false;

if(!empty($post['acao'])){
    switch ($post['acao']) {
        case 'insert':
                if(!empty($post['senha']) && !empty($post['matricula']) && !empty($post['nome'])){
                    $res = $dba->insertUser($post);
                    if ($res == true) {
                        header('location:admin.php?p=gerenciamento');
                    }
                }else{
                    header('location:admin.php?p=adicionarUsuario');
                }

            break;

        case 'edit':
            $post = isset($_POST)?$_POST:false;
            if (count($post) > 0) {
                $req = $dba->updateUser($post);
                if ($req == true) {
                    header('location:admin.php?p=gerenciamento');
                }
            }
            break;
    }

}

$p = isset($_GET['p'])?$_GET['p']:'estatisticas';

$total_m = $dba->totalMessage();

$total_m_u = $dba->totalMessagePorUsuario();

$total_m_enviadas = $dba->totalMessageEnviadaPorUsuario();
 ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
        <div class="left-menu">
            <ul class="ul-menu">
                <li class="titulo-menu"><a href="admin.php?p=adicionarUsuario">Adicionar Usuario</a></li>
                <li class="ul-menu-li"><a href="admin.php?p=estatisticas">Estatisticas de envio</a></li>
                <li class="ul-menu-li"><a href="admin.php?p=gerenciamento">Gerenciamento</a></li>
                <li class="ul-menu-li"><a href="index.php">Logoff</a></li>
            </ul>
        </div>
        <div class="right-menu">
            <?php include_once(''.$p.'.php') ?>
        </div>
    </div>
</body>
</html>
