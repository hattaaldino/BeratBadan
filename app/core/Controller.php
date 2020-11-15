<?php 

class Controller {

	public function loadView($view, $data=[]) {
        if(empty($data)){
            $_POST['param_view'] = $data;
        }

		require_once base_url('app/view/' . $view . '.php');
	}

    public function loadModel($model){
        require_once base_url('app/model/' . $model . '.php');
        return new $model;
    }
}

?>