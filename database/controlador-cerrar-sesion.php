<?php 

session_start();
session_destroy();
header("location: ../models/login.php")

?>