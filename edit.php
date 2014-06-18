<?php




$get = isset($_GET['id'])?$_GET['id']:false;
$res = $dba->getUmUser($get);



  ?>
 <div class="form">
    <h3>Editar:</h3>
    <form action="admin.php" method="post">
        <p>
            <input type="hidden" name="id" value="<?php echo $get; ?>">
            <input type="hidden" name="acao" value="edit">
            <input type="text" name="matricula" placeholder="Matricula" value="<?php echo $res['matricula'] ?>">
        </p>
        <p>
            <input type="text" name="nome" placeholder="Nome" value="<?php echo $res['name'] ?>">
        </p>
            <input type="text" name="senha" placeholder="Senha" value="<?php echo $res['pass_user'] ?>">
        <p>
            <input type="text" name="data" placeholder="Data de Nascimento" value="<?php echo $res['data_nasc'] ?>">
        </p>
        <p>
            <input class="submit" type="Submit" value="Salvar">
        </p>
    </form>
 </div>
