<?php

class Flash{
    public static function setFlash($pesan, $aksi, $tipe) {
        $_SESSION['flash'] = array(
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe
        );
    }
}

?>