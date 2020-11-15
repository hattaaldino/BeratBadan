<?php
require_once(base_url('app/controller/MainCon.php'));
class App{
    public $controller;

    public function __construct(){
        $this->$controller = new MainCon;

        $this->$controller->showView();
    }
}
?>