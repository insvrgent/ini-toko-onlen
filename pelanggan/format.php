<?php
    function formatRp($nilai){
        $hasil = "Rp " . number_format($nilai,2,',','.');
        return $hasil;
    }
    function format($nilai){
        $hasil = number_format($nilai,2,',','.');
        return $hasil;
    }
?>