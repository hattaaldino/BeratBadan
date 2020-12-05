<?php
include APPATH . "app/controller/LoginController.php";
include APPATH . "app/controller/MainController.php";

class App{

    public static function index(){
        $uri = App::parseUri();

        if(!isset($_SESSION["user_id"]) && strstr($uri, "dashboard") !== false){
            App::redirect("");
        }

        App::routes($uri);
    }

    public static function base_url($uri=''){
		return BASE_URL . $uri;
    }
    
    public static function redirect($uri=''){
        header("Location: " . App::base_url($uri), true, 301);
        exit;
    }

    public function routes($uri=''){
        global $route;
        call_user_func($route[$uri]);
    }

    public static function parseUri(){
        $uri = $_SERVER['REQUEST_URI'];
        $uri = filter_var($uri, FILTER_SANITIZE_URL);
        $uri = trim($uri, "/");

        return $uri;
    }
}
?>