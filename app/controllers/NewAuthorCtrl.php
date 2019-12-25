<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\NewAuthorForm;
use core\SessionUtils;
use core\Message;

class NewAuthorCtrl {

    public $form;
	public $authorRecords;

    public function __construct() {
        $this->form = new NewAuthorForm();
    }
	
	public function authorList(){		

        try {
            $this->authorRecords = App::getDB()->select("author", [
                "author"
                    ]);
        }catch (\PDOException $e) {
            Utils::addErrorMessage('Błąd połączenia z bazą danych');
        }					
	}
	
    public function validate() {

		$isForm = ParamUtils::getFromRequest("form");
		if (empty($isForm))
			return false;
        

        $val = new Validator();

        $this->form->author = $val->validateFromRequest("author", [
            'max_length' => 30,
            'validator_message' => 'Maksymalna długość imienia to 30 znaków',
            'required' => true,
            'required_message' => 'Złe imie']);

        $this->checkDuplicate();

        if (!App::getMessages()->isError()) 
            return true;
        else
            return false;
    }    

    public function checkDuplicate() {
        try {

              $authorCount = App::getDB()->has("author",[
              'author' => $this->form->author
              ]); 
			  
              if($authorCount){
              Utils::addErrorMessage("Podany autor już istnieje");
              }

        } catch (\PDOException $e) {
            Utils::addErrorMessage("Błąd połączenia z bazą danych");
        }
    }

    public function insertDb() {
        try {
			
			App::getDB()->insert("author", [
                "author"=> $this->form->author
            ]);

            Utils::addInfoMessage("Nowy autor został pomyślnie dodany do bazy danych");
        } catch (\PDOException $ex) {
            Utils::addErrorMessage("Błąd połączenia z bazą danych");
        }
    }

    public function action_newAuthor() {
		    if ($this->validate()) {
            $this->insertDb();
				}
		$this->authorList();
		
        App::getSmarty()->assign('form', $this->form);
		App::getSmarty()->assign('authorRecords', $this->authorRecords);


            App::getSmarty()->display('NewAuthor.tpl');
        
    }
	
    public function action_deleteAuthor() {

            try {
                App::getDB()->delete("author", [
                    "id_author" => ParamUtils::getFromCleanURL(1)
                ]);
                Utils::addInfoMessage('Pomyślnie usunięto autora z bazy danych');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
            }
             App::getRouter()->forwardTo('newAuthor');
    }
}
