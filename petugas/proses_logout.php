<?php
    session_start();
    unset($_SESSION['status_login_petugas']);

    header('location:index.php');
?>