<?php

require_once "userQuery.php";

class UserSession{

    function login($login, $password){
        $userQuery = new UserQuery();
        $user = new User();

        session_start();

        if(empty($login) || empty($password)){
            return ['erro' => true, 'msg' => 'Email ou senha vazios'];
        }

        $hashPassword = md5($password);

        $user = $userQuery->getUserByEmail($login);
        if($user==null){
            $user = $userQuery->getUserByUsername($login);
        }

        if($user==null){
            return ['erro' => true, 'msg' => 'Email ou senha incorretos'];
        }

        if($user->getPassword()==$hashPassword){
            $_SESSION["loggedin"] = TRUE;
            $_SESSION["username"] = $user->getUsername();
            $_SESSION["userid"] = $user->getId();
        } else {
            return ['erro' => true, 'msg' => 'Email ou senha incorretos'];
        }
    }

    function destroy(){
        session_start();
        session_destroy();
    }


    function loginCheck(){
        session_start();

        if(!($_SESSION['loggedin'] == TRUE)) {
        header("Location: ../view/");
        exit;
        }
    }

}