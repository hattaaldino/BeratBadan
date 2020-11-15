<?php
require_once(base_url('app/core/Controller.php'));

MainCon::executeAction();

class MainCon extends Controller{

    public function showView() {        
        $data = $this->ambilAllData();

        $this->loadView('template/Header');
        $this->loadView('template/Modal');
        $this->loadView('page/Main', $data);
    }

    public static function executeAction(){
        if(isset($_POST['action'])){  
            $action = $_POST['action'];

            if($action == 'tambah-data'){
                MainCon::tambahData();
            }
            else if($action == 'ambil-data'){
                MainCon::ambilData();
            }
        }
    }
    
    public static function tambahData(){
        $tanggal = $_POST['tanggal'];
        $max = $_POST['max'];
        $min = $_POST['min'];

        $model = $this->loadModel('BeratModel');
        $model->addBBHarian($tanggal, $max, $min);

        $catatanBB = $this->ambilAllData();

        return json_encode($catatanBB);
    }

    public function ambilAllData(){
        $model = $this->loadModel('BeratModel');
        $dataBB = $model->getAllBB();
        $totalMax = 0;
        $totalMin = 0;
        $totalPerbedaan = 0;

        for($i = 0; $i <= count($dataBB); $i++){
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

        return $catatanHarian;
    }

    public static function ambilData(){
        $tanggal = $_POST['tanggal'];

        $model = $this->loadModel('BeratModel');
        $data = $model->getBBbyTanggal($tanggal);

        return json_encode($data);
    }
}
?>