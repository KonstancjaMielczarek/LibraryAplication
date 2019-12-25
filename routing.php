<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('home'); #default action
App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

Utils::addRoute('info', 'HomeCtrl');
Utils::addRoute('home', 'HomeCtrl');
Utils::addRoute('homeList', 'HomeCtrl');
Utils::addRoute('loginShow', 'LoginCtrl');
Utils::addRoute('login', 'LoginCtrl');
Utils::addRoute('logout', 'LoginCtrl');
Utils::addRoute('register', 'RegisterCtrl');
Utils::addRoute('edit', 'EditCtrl', ['admin']);
Utils::addRoute('deleteBook', 'HomeCtrl', ['admin']);
Utils::addRoute('new', 'NewBookCtrl', ['admin']);
Utils::addRoute('newGenre', 'NewGenreCtrl', ['admin']);
Utils::addRoute('deleteGenre', 'NewGenreCtrl', ['admin']);
Utils::addRoute('newAuthor', 'NewAuthorCtrl', ['admin']);
Utils::addRoute('deleteAuthor', 'NewAuthorCtrl', ['admin']);
/*
Utils::addRoute('bookNew', 'EditCtrl');
Utils::addRoute('bookEdit', 'EditCtrl'); //uprawnienia
Utils::addRoute('bookDelete', 'EditCtrl', ['admin']);
Utils::addRoute('bookSave', 'EditCtrl');
 */
Utils::addRoute('basket', 'BasketCtrl', ['user','admin']);
Utils::addRoute('addToBasket', 'BasketCtrl', ['user','admin']);
Utils::addRoute('basketSave', 'BasketCtrl', ['user','admin']);
Utils::addRoute('addToBasket', 'BasketCtrl', ['user','admin']);
Utils::addRoute('basketDelete', 'BasketCtrl', ['user','admin']);
//Utils::addRoute('action_name', 'controller_class_name');