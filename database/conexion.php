<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'siceibd';

$con  = mysqli_connect($servername,$username,$password,$dbname);
if(mysqli_connect_errno())
{
    echo 'Error al conectar con la base de datos';
}