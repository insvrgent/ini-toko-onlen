<?php
    function format($nilai){
        $hasil = "Rp " . number_format($nilai,2,',','.');
        return $hasil;
    }
?>