<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use core\ParamUtils;
use app\forms\HomeSearchForm;
use app\forms\PagesForm;
use core\Validator;

class HomeCtrl {

    private $form;
    private $pages;
    private $psize = 2;
    private $p;//offset
	private $books;
	private $records;

    public function __construct() {
        $this->form = new HomeSearchForm();
        $this->pages = new PagesForm();
    }

    public function action_info() {
        phpinfo();
    }

    public function validate() {
        // 1. sprawdzenie, czy parametry zostały przekazane
        // - nie trzeba sprawdzać
        $this->form->title = ParamUtils::getFromRequest('title'); //sf_title
        // 2. sprawdzenie poprawności przekazanych parametrów
        // - nie trzeba sprawdzać
        return !App::getMessages()->isError();
    }

    public function action_home() {

        // 1. Walidacja danych formularza (z pobraniem)
        // - W tej aplikacji walidacja nie jest potrzebna, ponieważ nie wystąpią błedy podczas podawania nazwiska.
        //   Jednak pozostawiono ją, ponieważ gdyby uzytkownik wprowadzał np. datę, lub wartość numeryczną, to trzeba
        //   odpowiednio zareagować wyświetlając odpowiednią informację (poprzez obiekt wiadomości Messages)
        $this->validate();
        // 2. Przygotowanie mapy z parametrami wyszukiwania (nazwa_kolumny => wartość)
        $search_params = []; //przygotowanie pustej struktury (aby była dostępna nawet gdy nie będzie zawierała wierszy)
        if (isset($this->form->title) && strlen($this->form->title) > 0) {
            $search_params['book.title[~]'] = $this->form->title . '%'; // dodanie symbolu % zastępuje dowolny ciąg znaków na końcu
        }

        // 3. Pobranie listy rekordów z bazy danych
        // W tym wypadku zawsze wyświetlamy listę osób bez względu na to, czy dane wprowadzone w formularzu wyszukiwania są poprawne.
        // Dlatego pobranie nie jest uwarunkowane poprawnością walidacji (jak miało to miejsce w kalkulatorze)
        //przygotowanie frazy where na wypadek większej liczby parametrów
        $num_params = sizeof($search_params);
        if ($num_params > 1) {
            $where = ["AND" => &$search_params];
        } else {
            $where = &$search_params;
        }
        //dodanie frazy sortującej po nazwisku
        $where ["ORDER"] = "book.title";
        //STRONNICOWANIE
        //$psize = 2; 
        $this->p = ParamUtils::getFromGET('page');
        if (empty($this->p)) {
            $this->p = 1;
        } else {
            if (!is_numeric($this->p)) {
                $this->p = 1;
            }
        }
        if ($this->p < 1) {
            $this->p = 1;
        }
        $offset = ($this->p - 1) * $this->psize;
        $where ["LIMIT"] = [$offset, $this->psize];
        //wykonanie zapytania
        try {
            $this->records = App::getDB()->select("book", [
                "[>]genre" => ["id_genre" => "id_genre"],
                "[>]author" => ["id_author" => "id_author"]
                    ], [
                "book.id_book",
                "book.title",
                "book.summary",
                "genre.genre",
                "author.author"
                    ], 
                //'LIMIT' => [(($this->p - 1) * $this->psize), $this->psize]
				$where
            );

        }catch (\PDOException $e) {
            Utils::addErrorMessage('Błąd połączenia z bazą danych');
            if (App::getConf()->debug) {
                Utils::addErrorMessage($e->getMessage());
                Utils::addInfoMessage(App::getDB()->last());
            }
        }

        $this->generateView();
        $this->p = $this->p + 1;
    }

    public function checkNextPage() {
        try {
            $isNext = App::getDB()->has("book", [
                'LIMIT' => [(($this->p) * $this->psize), $this->psize]
            ]);
        } catch (\PDOException $e) {
            Utils::addErrorMessage("Błąd połączenia z bazą danych");
        }
        return $isNext;
    }

    public function generateView() {
        App::getSmarty()->assign('p', $this->p);
        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->assign("isNextPage", $this->checkNextPage());
        App::getSmarty()->assign("next_page", $this->p + 1);
        App::getSmarty()->assign("previous_page", $this->p - 1);
        App::getSmarty()->assign('book', $this->records);
        App::getSmarty()->display('Home.tpl');
    }
    public function action_deleteBook() {

            try {
                App::getDB()->delete("book", [
                    "id_book" => ParamUtils::getFromCleanURL(1)
                ]);
                Utils::addInfoMessage('Pomyślnie usunięto książkę z bazy danych');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
            }
             App::getRouter()->forwardTo('home');
    }

}
