<?php
namespace Controllers\PagesController;

class PagesController
{
    public function home()
    {
        require_once('Views/form_search.php');
    }


    public function error()
    {
        require_once('Views/error.php');
    }
}
