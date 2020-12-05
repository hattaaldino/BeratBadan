<?php
require_once APPATH .  "app/core/Controller.php";

class LoginController{
    
    public static function index(){
        Controller::loadView('layout/Header');
        Controller::loadView('layout/Alert');
        Controller::loadView('page/Login');
        Controller::loadView('layout/Footer');
    }

    public static function register(){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $model = Controller::loadModel('User');
        $all_user = $model->getAllUser();

        if(isset($all_user)){
            $existed = false;

            if(!empty($all_user)){
                foreach ($all_user as $user){
                    if($user['username'] == $username){
                        $existed = true;
                        break;
                    }
                }
            } 

            if($existed){
                Flash::setFlash(
                    "Username ini sudah dipakai",
                    "ganti username anda.",
                    "danger"
                );

                App::redirect("");
            }else{
                $newuser = $model->addUser($username, $password);
                if(isset($newuser)){
                    $_SESSION["user_id"] = $newuser;
                    App::redirect("dashboard");
                }
            }
        }
    }

    public static function login(){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $model = Controller::loadModel('User');
        $result = $model->getUser($username);
        if(isset($result) && !empty($result)){
            $user = $result[0];
            if($user['password'] == $password){
                $_SESSION["user_id"] = $user['user_id'];
                App::redirect("dashboard");
            }
            else{
                Flash::setFlash(
                    "Password salah",
                    "masukan password yang benar.",
                    "danger"
                );

                App::redirect("");
            }
        } else {
            Flash::setFlash(
                "Username tidak ada",
                "Sign up terlebih dahulu",
                "danger"
            );

            App::redirect("");
        }
    }

    public static function logout(){
        session_unset();
        App::redirect("");
    }
}
?>