<?php
require_once APPATH .  "app/core/Controller.php";

class MainController{
    private static $model;

    public static function showView() {        
        $data = MainController::ambilAllData();

        Controller::loadView('layout/Header');
        Controller::loadView('layout/Alert');
        Controller::loadView('layout/Modal');
        Controller::loadView('page/Main', $data);
        Controller::loadView('layout/Footer');
    }
    
    public static function tambahData(){
        $id = $_SESSION["user_id"];
        $tanggal = $_POST['tanggal'];
        $max = $_POST['max'];
        $min = $_POST['min'];

        $model = Controller::loadModel('BeratBadan');
        $result = $model->addBBHarian($id, $tanggal, $max, $min);

        if($result){
            $catatanBB = MainController::ambilAllData();
            echo json_encode($catatanBB);
        } else {
            Flash::setFlash(
                "Data tidak berhasil dibuat",
                "Mohon coba lagi memasukan data",
                "warning"
            );

            App::redirect("dashboard");
        }
    }

    public function ambilAllData(){
        $id = $_SESSION["user_id"];
        $catatanHarian = [];
        $model = Controller::loadModel('BeratBadan');
        $dataBB = $model->getAllBB($id);

        if(isset($dataBB) && !empty($dataBB)){
            $totalMax = 0;
            $totalMin = 0;
            $totalPerbedaan = 0;

            for($i = 0; $i < count($dataBB); $i++){
                $totalMax += $dataBB[$i]['max'];
                $totalMin += $dataBB[$i]['min'];

                $dataBB[$i]['perbedaan'] = $dataBB[$i]['max'] - $dataBB[$i]['min'];
                $totalPerbedaan += $dataBB[$i]['perbedaan'];
            }

            $catatanHarian = array(
                'maxRerata' => ($totalMax / count($dataBB)),
                'minRerata' => ($totalMin / count($dataBB)),
                'perbedaanRerata' => ($totalPerbedaan / count($dataBB)),
                'berat_badan' => $dataBB
            );
        } 
        
        return $catatanHarian;
    }

    public static function ambilData(){
        $id = $_SESSION["user_id"];
        $tanggal = $_POST['tanggal'];

        $model = Controller::loadModel('BeratBadan');
        $data = $model->getBB($id, $tanggal);
        
        if(!isset($data) && empty($data)){
            Flash::setFlash(
                "Kesalahan pengambilan data",
                "refresh halaman ini",
                "danger"
            );

            App::redirect("dashboard");
        } 

        echo json_encode($data[0]);
    }
}
?>