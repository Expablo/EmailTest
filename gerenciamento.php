<?php
$dba = new Dba();

$del = isset($_POST['del'])?$_POST['id']:false;

if ($del !== false) {
    $dba->deleteUser($del);
}

$ger = $dba->getUser();
$html ="";
foreach ($ger as $key => $v) {
    $html .="
        <tr>
            <th>{$v['matricula']}</th>
            <th>{$v['name']}</th>
            <th>{$v['pass_user']}</th>
            <th>{$v['data_nasc']}</th>
            <th>
                <a href='admin.php?p=edit&id={$v['id_user']}' class='btn-primary'>Edit</a>
                <form action='admin.php?p=gerenciamento' method='post'>
                    <input type='hidden' name='id' value='{$v['id_user']}'>
                    <input type='hidden' name='del' value='del'>
                    <button type='submit' class='btn-danger btn-primary'>Delete</button>
                </form>
            </th>
        </tr>
    ";
}

 ?>
<div class="estatisticas">
    <div class="estatistica-tittle">
        <h1>Gerenciamento</h1>
        <span>Usuario Cadastrados</span>
    </div>
    <div class="estatistica-dados">
        <table>
            <thead>
                <tr>
                    <th>Matricula</th>
                    <th>Nome</th>
                    <th>Senha</th>
                    <th>Data Nascimento</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php echo $html; ?>
            </tbody>
        </table>
    </div>
</div>


