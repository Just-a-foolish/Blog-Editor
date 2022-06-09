<?php

require_once "../model/userRegister.php";
require_once "user.php";


$teste = new UserRegister;

$user = new User();
$user->setEmail("teste@testasdasdaasade.com");
$user->setUsername("aloahaapk");
$user->setName("jefinho");
$user->setPassword("teste");

$teste->register($user);

?>