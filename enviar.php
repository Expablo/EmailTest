<?php
$dba = new  Dba();


$alluser = $dba->getUser();


$html = "";

if (count($alluser) > 0) {
    foreach ($alluser as $k => $v) {
        $html .= "<option value='{$v['id_user']}'>{$v['name']}</option>";
    }
}

 ?>
 <div class="form">
    <h3>Nova msg:</h3>
    <form action="index.php" method="post">
        <input type="hidden" name="from" value="<?php echo $id_ses; ?>">
        <input type="hidden" name="acao" value="newmsg">
            <select name="destino[]" id="" multiple>
                <?php echo $html; ?>
            </select>
        <p>
            <input type="text" name="subject" placeholder="Assunto">
        </p>
        <p>
            <textarea name="message" id="" cols="10" rows="5" placeholder="Sua Mensagem"></textarea>
        </p>
        <p>
            <input class="submit" type="Submit">
        </p>
    </form>
 </div>
