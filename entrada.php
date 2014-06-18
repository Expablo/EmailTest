<?php
$res = $dba->entrada($id_ses);
$html = "";
if (count($res) > 0) {
    foreach ($res as $k => $v) {
        $msg = substr($v['msg'], 0 , 100);
        $html .="
            <div class='lista-mensagem'>
                <div class='avatar'>
                    <img src='css/ericf-avatar.png' alt=''>
                </div>
                <div class='dados-msg'>
                    <a href='index.php?p=entrada&m={$v['id_msg']}'>
                         <h2>{$v['name']}</h2>
                    <p>{$v['subject']}</p>
                    <span>{$msg}</span>
                    </a>
                </div>
             </div>
        ";
    }
}
$get = isset($_GET['m'])?$_GET['m']:false;
if ($get == !false) {
    $msg = $dba->pegaMensagem($get);
    $msg_mostra = "
    <div class='header-msg'>
        <h1 class='mostra-mensagem-titulo'>{$msg[0]}</h1>
        <p>From <span class='blue'>{$msg[3]} </span>At <span class='date-color'> {$msg[2]}</span></p>
    </div>
     <p class='corpo-da-mensagem'>
        {$msg[1]}
     </p>
    ";
}


 ?>
 <div class="listagem">
        <?php echo $html; ?>
 </div>
 <div class="mostra-mensagem">
    <?php if(isset($msg_mostra)){echo $msg_mostra;} ?>
 </div>
