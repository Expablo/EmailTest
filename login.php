<?php
require 'dba.class.php';
require 'user.class.php';
$user = new User();
$post = isset($_POST)?$_POST:false;

if (isset($post['user']) && !empty($post['user']) and isset($post['pass']) && !empty($post['pass'])) {
    $res = $user->login($post['user'] , $post['pass']);
    if($res == true){
        header('location:index.php');
    }
}

 ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <div class="login">
        <h1>Login</h1>
        <form action="login.php" method="post">
            <p><input type="text" name="user" placeholder="User"></p>
            <p><input type="password" name="pass" placeholder="Pass"></p>
            <input class="submit" type="submit" value="Logar">
        </form>
        <p><a href="index.php">Minha pagina</a></p>
        <p><a href="adm.php">Pagina Administrativa</a></p>
    </div>
</body>
</html>
