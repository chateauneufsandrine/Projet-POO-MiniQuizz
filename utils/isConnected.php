<?php 
if (!isset($_SESSION['joueur'])) {
    header("Location: ../public");
    exit();
}

if(empty($_SESSION['joueur'])){
    header("Location: ../public");
    exit();
}

?>