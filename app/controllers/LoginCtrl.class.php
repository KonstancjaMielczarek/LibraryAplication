<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\RoleUtils;
use core\ParamUtils;
use core\SessionUtils;
use app\forms\LoginForm;
use core\Validator;

class LoginCtrl {

    private $form;
    public $accountData;

    public function __construct() {
        $this->form = new LoginForm();
    }

    public function getParams() {
        $this->form->login = ParamUtils::getFromRequest("login");
        $this->form->password = ParamUtils::getFromRequest("password");
    }

    public function validate() {

        if (!empty(SessionUtils::load("id", true)))
            return true;

        if (!$this->form->checkIsNull())
            return false;

        $val = new Validator();

        $val->validate($this->form->login, [
            'trim' => true,
            'required' => true,
            'required_message' => 'Login jest wymagany',
            'min_length' => 4,
            'max_length' => 20,
            'validator_message' => 'Login powinien zawierać od 4 do 20 znaków'
        ]);

        $val->validate($this->form->password, [
            'required' => true,
            'required_message' => 'Hasło jest wymagane',
        ]);

        if (App::getMessages()->isError())
            return false;


        try {
            $this->accountData = App::getDB()->get("users", [
                "[>]role" => ["id_role" => "id_role"],
                    ], [
                'users.id_user',
                'users.login',
                'users.password',
                'role.role'
                    ], [
                'login' => $this->form->login,
                'password' => md5($this->form->password)
            ]);
            /*
              if(!empty($accountData[0]["password"])){
              $this->accountData = $accountData[0];
              }
              else{
              Utils::addErrorMessage("Nieprawidłowy login lub hasło");
              }
             */
            if (empty($this->accountData)) {
                Utils::addErrorMessage("Nieprawidłowy login lub hasło");
            }
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
        }

        //return !App::getMessages()->isError();
        if (!App::getMessages()->isError())
            return true;
        else
            return false;
    }

    public function action_loginShow() {
        $this->validate();
        $this->generateView();
    }

    public function generateView() {

        if ($this->validate()) {
            SessionUtils::store("id", $this->accountData["id_user"]);
            SessionUtils::store("login", $this->accountData["login"]);
            SessionUtils::store("role", $this->accountData["role"]);

            //..

            RoleUtils::addRole($this->accountData["role"]);
            RoleUtils::addRole("logged");
            //Utils::addInfoMessage("Logowanie udane");
            //App::getSmarty()->display('LoginView.tpl');
			App::getRouter()->redirectTo("home");
        } else {
            App::getSmarty()->assign('page_title', 'Zaloguj się');
            App::getSmarty()->assign('page_description', 'Logowanie do systemu');
            App::getSmarty()->display('LoginView.tpl');
        }
        /*
          App::getSmarty()->assign('form', $this->form); // dane formularza do widoku
          App::getSmarty()->display('LoginView.tpl'); */
    }

    public function action_login() {
        /*
          if ($this->validate()) {
          //zalogowany => przekieruj na główną akcję (z przekazaniem messages przez sesję)
          Utils::addErrorMessage('Poprawnie zalogowano do systemu');
          RoleUtils::addRole($this->accountData["role"]);
          SessionUtils::store("id", $this->accountData["id_user"]);
          App::getRouter()->redirectTo("home");
          } else {
          //niezalogowany => pozostań na stronie logowania
          $this->generateView();
          } */
        $this->getParams();			
        $this->generateView();
    }
	

    public function action_logout() {
        RoleUtils::removeRole("logged");
        RoleUtils::removeRole(SessionUtils::load("role"));
        SessionUtils::remove("id_user");
        SessionUtils::remove("login");
        SessionUtils::remove("role");
        header("Location: " . App::getConf()->app_url);
        // 1. zakończenie sesji
        session_destroy();
        // 2. idź na stronę główną - system automatycznie przekieruje do strony logowania
        App::getRouter()->redirectTo('home');
    }

}
