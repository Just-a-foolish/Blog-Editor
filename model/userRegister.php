<?php

require_once "userQuery.php";
require_once "socialQuery.php";
require_once "siteQuery.php";
require_once "parameterQuery.php";
require_once "../helper/fileCopier.php";
require_once "../persistence/user.php";

class UserRegister{

    public function register(User $user){
        $userQuery = new UserQuery;
        $socialQuery = new SocialQuery;
        $siteQuery = new SiteQuery;
        $parameterQuery = new ParameterQuery;
        $fileCopier = new FileCopier;

        //TODO: inserir trim, validações de tamanho e tipo de informação


        if(empty($user->getEmail()) || empty($user->getUsername()) || empty($user->getName()) || empty($user->getPassword())){
            $error = "Algum dos campos do cadastro está vazio";
            return $error;
        }
        

        //testa se existem usuários com o mesmo username
        $result = $userQuery->getUserByUsername($user->getUsername());
        if($result){           
            $error = "Já existe um usuário com esse nome de usuário cadastrado";
            return $error;
        }
        
        //testa se existem usuários com o mesmo email
        $result = $userQuery->getUserByEmail($user->getEmail());
        if($result){
            $error = "Já existe um usuário com esse email cadastrado";
            return $error;
        }

        //criação do usuário no banco
        $hashPassword = $user->getPassword();
        $hashPassword = md5($hashPassword);
        $user->setPassword($hashPassword);
        $userQuery->insertUser($user);

        //obter id do usuário no banco
        $userDb = $userQuery->getUserByEmail($user->getEmail());

        //criação do social no banco
        $socialQuery->insertDefaultSocialFromUser($userDb);

        //criação do site no banco
        $siteQuery->insertDefaultSiteFromUser($userDb);
        $site = $siteQuery->getSiteByUserId($userDb->getId());

        //criação dos parâmetros padrões do site no banco
        $parameterQuery->createDefaultParameters($site);
        
        //TODO: inserir caminho que ficará o site
        @mkdir("../view/website/".$userDb->getUsername());

        //TODO: usar a classe FileCopier pra copiar arquivos de um local para outro
        $fileCopier->copyFiles("../view/website/template-website/","../view/website/".$userDb->getUsername());

        //retornar 0 se criação ocorreu e 1 se não ocorreu

    }

    public function delete(){
        
    }

}


?>