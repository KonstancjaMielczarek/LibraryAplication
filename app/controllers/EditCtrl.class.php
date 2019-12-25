<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\EditForm;
use core\SessionUtils;
use core\Message;

class EditCtrl {

    public $form;
    public $record;
    public $id_genre;
    public $id_author;
    public $id_book;

    public function __construct() {
        $this->form = new EditForm();
    }
    public function start(){
        try {
            $this->record = App::getDB()->get("book", [
                "[>]genre" => ["id_genre" => "id_genre"],
                "[>]author" => ["id_author" => "id_author"]
                    ], [
                "book.id_book",
                "book.title",
                "book.summary",
                "genre.id_genre",
                "genre.genre",
                "author.id_author",
                "author.author"
                    ], [
                        "id_book" => ParamUtils::getFromCleanURL(1)
                    ]);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Błąd połączenia z bazą danych');
        }    
        
    }
    public function getParams() {
        $this->form->title = ParamUtils::getFromRequest("title");
        $this->form->summary = ParamUtils::getFromRequest("summary");
        $this->form->genre = ParamUtils::getFromRequest("genre");
        $this->form->author = ParamUtils::getFromRequest("author");
        $this->form->id_genre = ParamUtils::getFromRequest("id_genre");
        $this->form->id_author = ParamUtils::getFromRequest("id_author");
        $this->form->id_book = ParamUtils::getFromRequest("id_book");
    }

    public function validate() {

        if (empty(SessionUtils::load("id", true)))
            return false;

        if (!$this->form->checkIsNull())
            return false;

        $val = new Validator();

        $this->form->title = $val->validateFromRequest("title", [
            'max_length' => 20,
            'validator_message' => 'Maksymalna długość tytułu to 20 znaków',
            'required' => true,
            'required_message' => 'Zły tytuł']);

        $this->form->summary = $val->validateFromRequest("summary", [
            'max_length' => 500,
            'validator_message' => 'Maksymalna długość opisu to 500 znaków',
            'required' => true,
            'required_message' => 'Zły opis']);

        $this->form->genre = $val->validateFromRequest("genre", [
            'max_length' => 10,
            'validator_message' => 'Maksymalna długość gatunku to 10 znaków',
            'required' => true,
            'required_message' => 'Zły gatunek']);

        $this->form->author = $val->validateFromRequest("author", [
            'max_length' => 30,
            'validator_message' => 'Maksymalna długość imienia to 20 znaków',
            'required' => true,
            'required_message' => 'Złe imie']);

       // $this->checkDuplicate();

        if (!App::getMessages()->isError())
            return true;
        else
            return false;
    }
/*
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
    }*/

    public function updateDb() {
        try {

            App::getDB()->update("genre", [
                "genre"=> $this->form->genre
            ],[
                "id_genre"=> $this->form->id_genre
            ]);
                      
            App::getDB()->update("author", [
                "author"=> $this->form->author
            ],[
               "id_author"=> $this->form->id_author 
            ]);
                       
            App::getDB()->update("book", [
                "title"=> $this->form->title,
                "summary"=> $this->form->summary                   
            ],[
                "id_book"=> $this->form->id_book
            ]);
            Utils::addInfoMessage("Dane książki zostały uaktualnione");
        } catch (\PDOException $ex) {
            Utils::addErrorMessage("Błąd połączenia z bazą danych");
        }
    }
    public function generateView() {
        $this->start();
                $this->getParams();
                App::getSmarty()->assign('record', $this->record);
        if ($this->validate()) {
            $this->updateDb();
            Utils::addErrorMessage("Pomyślnie dodano książkę do bazy danych");
            header("Location: " . App::getConf()->app_url . "/home");
        } else {
            App::getSmarty()->assign('page_title', 'Edytuj dane książki');
            App::getSmarty()->display('Edit.tpl');
        }
    }

    public function action_edit() {
        $this->generateView();
    }

}
