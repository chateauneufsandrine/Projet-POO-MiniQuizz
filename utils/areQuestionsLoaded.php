<?php 
if (!isset($_SESSION['questions'])) {
    header("Location: ../public");
    exit();
}

if(empty($_SESSION['questions'])){
    header("Location: ../public");
    exit();
}

?>