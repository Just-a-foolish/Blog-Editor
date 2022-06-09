<?php

require_once('../api/router.php');
require_once('../api/index.php');

/* Chamada de classes que executam querys */
require_once "../model/userRegister.php";
require_once "../model/userSession.php";

/* Chamada de classes que instanciam objetos */
require_once "../persistence/user.php";

class userController{
    
    public function register($params){
        $userRegister = new UserRegister();
        $user = new User();

        $user->setEmail($params['data']['0']);
        $user->setUsername($params['data']['1']);
        $user->setName($params['data']['2']);
        $user->setPassword($params['data']['3']);

        $this->validateCamps($user);
        $errors = $userRegister->register($user);
        if(!empty($errors)){
            return array('errors' => $errors);
        }

        //validação de dados junto ao banco
        $errors = $userRegister->register($user);

        if(!empty($erros)){
            return array('errors' => $errors);
        }
    }
    
    public function login($params){
        $userSession = new UserSession();
        $username = $params['data']['0'];
        $password = $params['data']['1'];

        $errors = $userSession->login($username, $password);

        return $errors;
    }

    public function checkLogin(){
        session_start();

        if(!($_SESSION['loggedin'] == TRUE)) {
            $redirect = "Location: ../view/login";
            return $redirect;
        } else {
            return null;
        }
    }

    public function logout(){
        $userSession = new UserSession();
        $userSession->destroy();
    }

    private function validateCamps(User $user){

    }

}

