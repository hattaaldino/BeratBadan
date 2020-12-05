<?php 

class Controller {

	public static function loadView($view, $data=[]) {
        if(!empty($data)){
            $_POST['param_view'] = $data;
        }

		require_once(APPATH.'app/view/'. $view.'.php');
	}

    public static function loadModel($model){
        require_once APPATH.'app/model/'.$model.'.php';
        return new $model;
    }

    public static function testdulu(){
        echo "testdulu";
    }
}

?>