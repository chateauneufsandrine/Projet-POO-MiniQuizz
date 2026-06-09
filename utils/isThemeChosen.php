<?php 
if (!isset($_SESSION['qcm'])) {
    header("Location: ../public");
    exit();
}

if(empty($_SESSION['qcm'])){
    header("Location: ../public");
    exit();
}

?>