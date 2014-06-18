<?php

    class User {

        var $meuapp;

        public function User(){
            $this->meuapp = 'myapp';
            $this->dba = new Dba();
        }

        function sessionStart(){
            if (!isset($_SESSION[$this->meuapp])) {
                @session_start();
            }
        }

        function login($user , $senha){
            $res = $this->dba->tentaLogar($user , $senha);
            if(count($res) > 0){
                $this->sessionStart();
                $_SESSION[$this->meuapp]['logado'] = true;
                $_SESSION[$this->meuapp]['nome'] = $res[0];
                $_SESSION[$this->meuapp]['id'] = $res[1];
                return true;
            }else{
                $this->logoff();
                return false;
            }
        }

        function logoff(){
            $this->sessionStart();
            unset($_SESSION[$this->meuapp]);

        }

        function verifica(){
            $this->sessionStart();
            if (isset($_SESSION[$this->meuapp]) && $_SESSION[$this->meuapp]['logado'] === true) {
                return true;
            }else{
                return false;
            }
        }



    }
