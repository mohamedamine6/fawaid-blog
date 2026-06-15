<?php 
session_start();

// Détruire la session
$_SESSION = [];
session_destroy();

header("location: login.php");
exit();