<?php
session_start();

$joueur = $_SESSION['joueur'];

session_destroy();

session_start();
$_SESSION['joueur'] = $joueur;

header("Location: ../public/index.php");
exit();
 ?>