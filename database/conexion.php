<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'sicei';

$con  = mysqli_connect($servername,$username,$password,$dbname);
$con->set_charset("utf8");
if(mysqli_connect_errno())
{
    echo 'Error al conectar con la base de datos';
}