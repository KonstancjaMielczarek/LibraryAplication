<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\NewForm;
use core\SessionUtils;
use core\Message;

class NewBookCtrl {

    public $form;
	public $authorRec;
	public $genreRec;

    public function __construct() {
        $this->form = new NewForm();
    }

    public function validate() {
        

        $val = new Validator();
		
		$this->form->id_author = $val->validateFromRequest("author", [
            'required' => true,
            'required_message' => 'Wybór autora jest konieczny',
			'int'=>true,
			'validator_message'=>'Wybierz autora'
			]);
			
		$this->form->id_genre = $val->validateFromRequest("genre", [
            'required' => true,
            'required_message' => 'Wybór gatunku jest konieczny',
			'int'=>true,
			'validator_message'=>'Wybierz gatunek'
			]);

			

        $this->form->title = $val->validateFromRequest("title", [
            'max_length' => 50,
            'validator_message' => 'Maksymalna długość tytułu to 50 znaków',
            'required' => true,
            'required_message' => 'Zły tytuł']);

        $this->form->summary = $val->validateFromRequest("summary", [
            'max_length' => 60,
            'validator_message' => 'Maksymalna długość opisu to 20 znaków',
            'required' => true,
            'required_message' => 'Zły opis']);


        $this->checkDuplicate();
		
        if (!App::getMessages()->isError()) 
            return true;
        else
            return false;
    }    

    public function checkDuplicate() {
        try {
            $titleCount = App::getDB()->has("book", [
                'title' => $this->form->title
            ]);

            if ($titleCount) {
                Utils::addErrorMessage("Podany tytuł już istnieje");
            }
        } catch (\PDOException $e) {
            Utils::addErrorMessage("Błąd połączenia z bazą danych");
        }
    }

    public function insertDb() {
        try {           
            App::getDB()->insert("book", [
                "title"=> $this->form->title,
                "summary"=> $this->form->summary,
				"id_genre"=> $this->form->id_genre,
				"id_author"=> $this->form->id_author
                    
            ]);           
            Utils::addInfoMessage("Książka została dodana do bazy danych");
        } catch (\PDOException $ex) {
            Utils::addErrorMessage("Błąd przy wstawianiu rekordu");
			if (App::getConf()->debug){
                Utils::addErrorMessage($ex->getMessage());
                Utils::addInfoMessage(App::getDB()->last());			}
        }
    }

    public function action_new() {
				
        if ($this->validate()) {
				
            $this->insertDb();
			SessionUtils::storeMessages();
            App::getRouter()->redirectTo("home");

		} else {
			try {
				$this->authorRec = App::getDB()->select("author", "*");
				$this->genreRec = App::getDB()->select("genre", "*");
			}catch (\PDOException $e) {
				Utils::addErrorMessage('Błąd połączenia z bazą danych');
			}			
			App::getSmarty()->assign('authorRec', $this->authorRec);
			App::getSmarty()->assign('genreRec', $this->genreRec);
            App::getSmarty()->display('New.tpl');
        }
    }

}
