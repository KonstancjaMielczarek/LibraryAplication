<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use core\SessionUtils;
use core\ParamUtils;
use app\forms\BasketForm;
use core\Validator;

class BasketCtrl {

    private $form;
    private $records;

    public function __construct() {
        $this->form = new BasketForm();
    }

    public function action_basket() {

        try {
            $this->books = App::getDB()->select("reservation", [
                "[>]book" => ["id_book" => "id_book"],
                "[>]author" => ["book.id_author" => "id_author"],
                "[>]genre" => ["book.id_genre" => "id_genre"]
                    ], [
                "reservation.id_reservation",
                "reservation.id_book",
                "book.title",
                "book.summary",
                "author.author",
                "genre.genre"
                    ], ["reservation.id_user" => SessionUtils::load("id", true)
            ]);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Błąd połączenia z bazą danych!');
        }

        App::getSmarty()->assign('searchForm', $this->form);
        App::getSmarty()->assign('book', $this->books);
        App::getSmarty()->display('Basket.tpl');
    }

    public function action_basketSave() {
        /*
            try {
                App::getDB()->insert("reservation", [
                    "id_user" => SessionUtils::load('id', true),
                    "id_book" => ParamUtils::getFromCleanURL(1)
                ]);
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisywania zamówienia');
            }*/
            try {
                $this->count=App::getDB()->count("reservation", [
                    "id_user" => "id_user"
                ]);
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zliczania zamówień');
            }  
        /*    
        if($this->count>0){
            Utils::addInfoMessage("Zamówienia zrealizowane"); 
        }
        else{
            Utils::addErrorMessage("Nie można zrealizować zamówienia"); 
        }*/
        Utils::addInfoMessage("Zamówienie zrealizowane, odbiór książki będzie możliwy w bibliotece po otrzymaniu od nas wiadomości mailowej");    
        
        
            App::getRouter()->forwardTo('basket');
    }
    
    public function action_addToBasket() {       
            try {
                App::getDB()->insert("reservation", [
                    "id_user" => SessionUtils::load('id', true),
                    "id_book" => ParamUtils::getFromCleanURL(1)
                ]);
            } catch (\PDOException $e) {
                //Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas dodawania do koszyka');
            }
                App::getRouter()->forwardTo('basket');
    }
    
    public function action_basketDelete() {

            try {
                /*
                App::getDB()->delete("reservation", [
                    "id_reservation" => $this->form->id_reservation
                ]);*/
                App::getDB()->delete("reservation", [
                    "id_user" => SessionUtils::load('id', true),
                    "id_book" => ParamUtils::getFromCleanURL(1)
                ]);
                Utils::addInfoMessage('Pomyślnie usunięto zawartość koszyka');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
            }
             App::getRouter()->forwardTo('basket');
    }
}
