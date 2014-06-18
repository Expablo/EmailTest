<?php

 class Dba{

    var $id;
    public function Dba(){
        $this->id = mysql_connect('localhost' , 'root' , '') or die (mysql_error());
        mysql_select_db('message') or die (mysql_error());
    }

    function query($sql){
        $res = mysql_query($sql);
        return $res;
    }

    function row($res){
        $row = mysql_num_rows($res);
        return $row;
    }

    function result($res , $row , $col){
        $ret = mysql_result($res, $row , $col);
        return $ret;
    }

    function tentaLogar($user , $pass){
        $sql="
        SELECT * FROM user WHERE nome = '{$user}' and pass_user = '{$pass}'
        ";
        $res = $this->query($sql);
        $row = $this->row($res);
        $vet = array();
        if($row > 0){
            $vet[] = $this->result($res , 0 , 'nome');
            $vet[] = $this->result($res , 0 , 'id_user');
            return $vet;
        }else{
            return $vet;
        }

    }

    function entrada($id){
        $sql="SELECT
                    user.*,
                    message.*,
                    user_message.*
                FROM
                    user_message
                inner join
                    message
                on
                    user_message.fk_message = message.id_message
                inner join
                    user
                on
                    message.fk_user = user.id_user
                WHERE
                    user_message.fk_user = {$id} ORDER BY dh_message desc";
            $res = $this->query($sql);
            $row = $this->row($res);
            $vet = array();
            if($row > 0){
                for ($i=0; $i < $row; $i++) {
                    $vet[$i]['name'] = $this->result($res , $i , 'nome');
                    $vet[$i]['subject'] = $this->result($res , $i , 'su_message');
                    $vet[$i]['date'] = $this->result($res , $i , 'dh_message');
                    $vet[$i]['id_msg'] = $this->result($res , $i , 'id_message');
                    $vet[$i]['msg'] = $this->result($res , $i , 'me_message');
                }
            }
                return $vet;
            }

            function pegaMensagem($get){
                $ret = array();
                $sql = "SELECT message.* , user.* FROM message INNER JOIN user ON message.fk_user = user.id_user WHERE id_message = {$get}";
                $res = $this->query($sql);
                $ret[] = $this->result($res , 0 , 'su_message');
                $ret[] = $this->result($res , 0 , 'me_message');
                $ret[] = $this->result($res , 0 , 'dh_message');
                $ret[] = $this->result($res , 0 , 'nome');

                return $ret;

            }

            function saida($id){
                $sql="
                SELECT
                     *
                FROM
                    message
                WHERE
                    fk_user = {$id}
                    ORDER BY dh_message desc
                ";

                $res = $this->query($sql);
                $row = $this->row($res);
                $vet = array();
                if($row > 0){
                    for ($i=0; $i < $row ; $i++) {
                        $vet[$i]['subject'] = $this->result($res , $i , 'su_message');
                        $vet[$i]['date'] = $this->result($res , $i , 'dh_message');
                        $vet[$i]['id_msg'] = $this->result($res , $i , 'id_message');
                        $vet[$i]['msg'] = $this->result($res , $i , 'me_message');
                        $vet[$i]['name'] = $this->achanomes($this->result($res , $i , 'id_message'));
                    }
                }

                return $vet;

            }

            function achanomes($id){
                $sql="SELECT
                         user.*,
                        user_message.*
                        FROM
                            user_message
                        INNER JOIN
                            user
                        ON
                            user_message.fk_user = user.id_user
                        WHERE
                            user_message.fk_message = {$id}";
                $res = $this->query($sql);
                $row = $this->row($res);
                $vet = array();
                if($row > 0){
                    for ($i=0; $i < $row; $i++) {
                        $vet[] = $this->result($res , $i , 'nome');
                    }
                }
                return join(' , ' , $vet);
            }


            function getUser(){
                $sql="
                SELECT * FROM user ORDER BY nome
                ";

                $res = $this->query($sql);
                $row = $this->row($res);
                $vet = array();
                if ($res > 0) {
                    for ($i=0; $i < $row; $i++) {
                        $vet[$i]['name'] = $this->result($res , $i , 'nome');
                        $vet[$i]['id_user'] = $this->result($res , $i , 'id_user');
                        $vet[$i]['matricula'] = $this->result($res , $i , 'matricula');
                        $vet[$i]['pass_user'] = $this->result($res , $i , 'pass_user');
                        $vet[$i]['data_nasc'] = $this->result($res , $i , 'data_nasc');
                    }
                }
                return $vet;

            }

            function insertUser($post){
                $sql ="
                INSERT INTO user (nome , pass_user , matricula ,data_nasc) VALUES ('{$post['nome']}' , '{$post['senha']}' , '{$post['matricula']}' , '{$post['data']}')
                ";
                $this->query($sql);
                return true;
            }

            function updateUser($post){
                $sql="
                UPDATE user
                SET matricula = '{$post['matricula']}' , nome = '{$post['nome']}' , pass_user = '{$post['senha']}' , data_nasc = '{$post['data']}'
                WHERE id_user = {$post['id']}
                ";
                $res = $this->query($sql);
                return true;
            }

            function getUmUser($id){
                $sql = "
                SELECT * FROM user WHERE id_user = {$id}
                ";
                $res = $this->query($sql);
                $ret['matricula'] = $this->result($res , 0 ,'matricula');
                $ret['pass_user'] = $this->result($res , 0 ,'pass_user');
                $ret['name'] = $this->result($res , 0 ,'nome');
                $ret['data_nasc'] = $this->result($res , 0 ,'data_nasc');

                return $ret;

            }

            function ultimoId(){
                $sql = "SELECT MAX(id_message) FROM message";
                $res = $this->query($sql);
                $res = $this->result($res , 0 , 'MAX(id_message)');
                return $res;
            }

            function enviaMsg($post){
                $sql = "INSERT INTO message (fk_user , su_message , me_message) VALUES ('{$post['from']}' , '{$post['subject']}' , '{$post['message']}')";
                $this->query($sql);
                $ultimoId = $this->ultimoId();

                foreach ($post['destino'] as $k => $v) {
                    $sql1 = "INSERT INTO user_message (fk_user , fk_message) VALUES ('{$v}' , {$ultimoId})";
                    $this->query($sql1);
                }
                return true;
            }

            function totalMessage(){
                $sql="SELECT count(id_user_message) FROM user_message WHERE id_user_message > 0";
                $res = $this->query($sql);
                $total = $this->result($res , 0 , 'count(id_user_message)');
                return $total;
            }

            function totalMessagePorUsuario(){
                $sql = "SELECT * FROM user ORDER BY nome";
                $res = $this->query($sql);
                $row = $this->row($res);
                $html = "";
                if ($row > 0) {
                    for ($i=0; $i < $row ; $i++) {
                        $id = $this->result($res , $i , 'id_user');
                        $name = $this->result($res , $i , 'nome');
                        $sql1 = "SELECT count(id_user_message) FROM user_message WHERE fk_user = {$id}";
                        $res1 = $this->query($sql1);
                        $total_u = $this->result($res1 , 0 , 'count(id_user_message)');
                        $total_m = $this->totalMessage();
                        $porcentagem = 0;
                        if ($total_u > 0) {
                            $porcent = ($total_u/$total_m)*100;
                            $porcentagem = substr($porcent,0,strpos($porcent,'.')+2);
                        }

                        $html .="
                                        <tr>
                                            <th>{$name}</th>
                                            <th>{$total_u}</th>
                                            <th>{$porcentagem}%</th>
                                        </tr>
                        ";
                    }
                }
                return $html;
            }

            function gerenciamento(){

            }

            function totalMessageEnviadaPorUsuario(){
                $html ="";
                $sql = "SELECT * FROM user ORDER BY nome";
                $res = $this->query($sql);
                $row = $this->row($res);
                if($row > 0){
                    for ($i=0; $i < $row ; $i++) {
                        $id = $this->result($res , $i , 'id_user');
                        $name = $this->result($res , $i , 'nome');
                        $sql1 = "select id_message from message where fk_user = {$id}";
                        $res1 = $this->query($sql1);
                        $row1 = $this->row($res1);
                        $total = 0;
                        if ($row1 > 0) {
                            for ($i1=0; $i1 < $row1 ; $i1++) {
                                $id_message = $this->result($res1 , $i1 , 'id_message');
                                $sql2 = "SELECT count(id_user_message) FROM `user_message` WHERE fk_message = {$id_message}";
                                $res2 = $this->query($sql2);
                                $total = $total + $this->result($res2 , 0 , 'count(id_user_message)');
                            }
                        }
                        $porcentagem = 0;
                        if ($total > 0) {
                        $porcent = ($total/$this->totalMessage())*100;
                        $porcentagem = substr($porcent,0,strpos($porcent,'.')+2);


                        }

                        $html .="
                                        <tr>
                                            <th>{$name}</th>
                                            <th>{$total}</th>
                                            <th>{$porcentagem}%</th>
                                        </tr>
                        ";
                    }
                }
                        return $html;
            }

            function deleteUser($id){
                $sql= "
                DELETE FROM user WHERE id_user = {$id}
                ";
                $this->query($sql);
            }


 }
