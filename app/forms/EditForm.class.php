<?php

namespace app\forms;

class EditForm {

    public $title;
    public $summary;
    public $author;
    public $genre;
    
    
    function checkIsNull() {
        foreach ($this as $key => $value) {
            if (!isset($value))
                return false;
            else
                return true;
        }
    }
}
