<?php

require_once('router.php');
require_once('middleware.php');
require_once('../controller/userController.php');
require_once('../controller/publicationController.php');
require_once('../controller/themesController.php');
require_once('../controller/siteController.php');
require_once('../controller/socialController.php');
require_once('../controller/suggestionController.php');

Router::register('registerUser','userController','register');
Router::register('userLogin','userController','login');
Router::register('checkLogin','userController','checkLogin',['AuthMiddleware']);
Router::register('userLogout','userController','logout');

Router::register('createPublication', 'publicationController', 'create', ['AuthMiddleware']);
Router::register('listPublications', 'publicationController', 'list');
Router::register('deletePublications', 'publicationController', 'delete', ['AuthMiddleware']);

Router::register('getTheme', 'themesController', 'getTheme');
Router::register('updateBackground','themesController','updateBackground', ['AuthMiddleware']);
Router::register('updateFont','themesController','updateFont', ['AuthMiddleware']);

Router::register('getSiteInformations', 'siteController', 'getSite');
Router::register('updateBasicSettings', 'siteController', 'updateBasicSettings', ['AuthMiddleware']);

Router::register('updateSocialMedias', 'socialController', 'update', ['AuthMiddleware']);

Router::register('sendSuggestion', 'suggestionController', 'create', ['AuthMiddleware']);

Router::call($_REQUEST['action'], $_REQUEST);