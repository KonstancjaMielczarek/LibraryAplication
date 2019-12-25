<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use app\forms\RegisterForm;
use core\Validator;
use core\ParamUtils;
use core\SessionUtils;

class RegisterCtrl {

    public $form;

    public function __construct() {
        $this->form = new RegisterForm();
    }

    public function validate() {

        if(!empty(SessionUtils::load("id", true))) return true;

        if(!$this->form->checkIsNull()) return false;

        $val = new Validator();

        $this->form->name = $val->validateFromRequest("name", [
            'max_length' => 30,
            'validator_message' => 'Imie max 30',
            'required' => true,
            'required_message' => 'Złe imie']);

        $this->form->surname = $val->validateFromRequest("surname", [
            'max_length' => 30,
            'validator_message' => 'Nazwisko max 30',
            'required' => true,
            'required_message' => 'Złe nazwisko']);

        $this->form->login = $val->validateFromRequest("login", [
            'max_length' => 20,
            'validator_message' => 'Login max 20',
            'required' => true,
            'required_message' => 'Zły login']);

        $this->form->password = $val->validateFromRequest("password", [
            'max_length' => 20,
            'validator_message' => 'Haslo max 20',
            'required' => true,
            'required_message' => 'Złe hasło']);

        $this->form->password_repeat = $val->validateFromRequest("password_repeat", [
            'required' => true,
            'required_message' => 'Źle powtórzone hasło']);
			
        $val->validate($this->form->email,[
            'email' => true,
            'trim' => true,
            'required' => true,
            'min_length' => 4,
            'max_length' => 128,
            'required_message' => 'Adres email jest wymagany',
            'validator_message' => "Nieprawidłowy adres email"
        ]);
		
        if ($this->form->password != $this->form->password_repeat) {
            Utils::addErrorMessage("Hasła się nie zgadzają");
        }
        $this->checkDuplicate();
		
        if(!App::getMessages()->isError()) return true;
        else return false;
    }
/*
    public function process() {

        $a = App::getDB()->count($user, [
            'login' => $this->form->login,
        ]);

        $b = App::getDB()->count($user, [
            'email' => $this->form->email,
        ]);
        try {

            if ($a > 0) {
                Utils::addErrorMessage("Login zajęty");
            }
            if ($b > 0) {
                Utils::addErrorMessage("Email zajęty");
            }
        } catch (Exception $ex) {
            Utils::addErrorMessage("Wystąpił problem podczas rejestracji");
        }
    }*/
    public function checkDuplicate(){
        try{
            $loginCount = App::getDB()->has("users", [
                'login' => $this->form->login
            ]);

            $emailCount = App::getDB()->has("users",[
                'email' => $this->form->email
            ]);

            if($loginCount){
                Utils::addErrorMessage("Podany login jest już zajęty");
            }

            if($emailCount){
                Utils::addErrorMessage("Podany email jest już zajęty");
            }

        }catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych");
        }
    }

    public function insertDb() {
        try {
            $userRole_id = App::getDB()->get("role", "id_role", [
                'role' => 'user'
            ]);
			            
            $userId = App::getDB()->id();

            App::getDB()->insert("users",[
                'id_user' => $id_user,
                'login' => $this->form->login,
                'name' => $this->form->name,
                'surname' => $this->form->surname,
                'password_repeat' => md5($this->form->password_repeat),
                'password' => md5($this->form->password),
                'email' => $this->form->email,
                'id_role' => $userRole_id
            ]);
			Utils::addInfoMessage("Konto zostało utworzone");
			
        } catch (\PDOException $ex) {
            Utils::addErrorMessage("Błąd połączenia z bazą danych");
        }
    }
    public function action_register(){
        if($this->validate()){
            $this->insertDb();
            Utils::addInfoMessage("Pomyślnie zarejestrowano");
            //header("Location: ".App::getConf()->app_url."/login");
			SessionUtils::storeMessages();
            App::getRouter()->redirectTo("login");
        }
        else{
			App::getSmarty()->assign('form',$this->form);
            App::getSmarty()->display('Register.tpl');
        }
    }

}
