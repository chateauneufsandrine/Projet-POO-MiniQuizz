<?php
session_start();
unset($_SESSION['joueur']);
header("Location: ../public/index.php");
exit();
?>