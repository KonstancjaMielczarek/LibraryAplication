<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\NewGenreForm;
//use app\forms\GenreSearchForm;
use core\SessionUtils;
use core\Message;

class NewGenreCtrl {

    public $form;
	public $genre;
	public $genreRecords;

    public function __construct() {
        $this->form = new NewGenreForm();
    }

	public function genreList(){
/*		
		$this->form->genre = ParamUtils::getFromRequest('genre');

        return !App::getMessages()->isError();

        $search_params = []; 
        if (isset($this->form->genre) && strlen($this->form->genre) > 0) {
            $search_params['genre.genre[~]'] = $this->form->genre . '%'; 
        }

        $num_params = sizeof($search_params);
        if ($num_params > 1) {
            $where = ["AND" => &$search_params];
        } else {
            $where = &$search_params;
        }*/
		
        try {
            $this->genreRecords = App::getDB()->select("genre", [
                "genre"
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

        $this->form->genre = $val->validateFromRequest("genre", [
            'max_length' => 30,
            'validator_message' => 'Maksymalna długość gatunku to 30 znaków',
            'required' => true,
            'required_message' => 'Zły gatunek']);

        $this->checkDuplicate();

        if (!App::getMessages()->isError()) 
            return true;
        else
            return false;
    }    

    public function checkDuplicate() {
        try {
              $genreCount = App::getDB()->has("genre",[
              'genre' => $this->form->genre
              ]);

              if($genreCount){
              Utils::addErrorMessage("Podany gatunek już istnieje");
              }
        } catch (\PDOException $e) {
            Utils::addErrorMessage("Błąd połączenia z bazą danych");
        }
    }

    public function insertDb() {
        try {
			
            App::getDB()->insert("genre", [
                "genre"=> $this->form->genre
            ]);
                        
            Utils::addInfoMessage("Nowy gatunek został pomyślnie dodany do bazy danych");
        } catch (\PDOException $ex) {
            Utils::addErrorMessage("Błąd połączenia z bazą danych");
        }
    }
    public function action_newGenre() {
        if ($this->validate()) {
            $this->insertDb();
        } 

		$this->genreList();
					
		
		App::getSmarty()->assign('genreRecords', $this->genreRecords);
        App::getSmarty()->assign('form', $this->form);
		
        App::getSmarty()->display('NewGenre.tpl');
       
    }
	
    public function action_deleteGenre() {

            try {
                App::getDB()->delete("genre", [
                    "id_genre" => ParamUtils::getFromCleanURL(1)
                ]);
                Utils::addInfoMessage('Pomyślnie usunięto gatunek z bazy danych');
				SessionUtils::storeMessages();
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
            }
             App::getRouter()->forwardTo('newGenre');
    }
}
