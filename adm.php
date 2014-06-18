<?php
$pass = 'admin';
$user = 'admin';

$post = isset($_POST)?$_POST:false;

if (count($post) > 0 && !empty($post['pass']) && !empty($post['user'])) {
    if ($pass == $post['pass'] && $user == $post['user']) {
        header('location:admin.php');
    }else{
        echo "Senha errada";
    }
}


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
    <div class="login">
        <h1>Area Administrativa</h1>
        <form action="adm.php" method="post">
            <p><input type="text" name="user" placeholder="User" value="admin"></p>
            <p><input type="password" name="pass" placeholder="Pass" value="admin"></p>
            <input class="submit" type="submit" value="Logar">
        </form>
        <a href="index.php">voltar para e-mail</a>
    </div>
    <br>
</body>
</html>
