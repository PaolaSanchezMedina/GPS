<?php
$con = mysqli_connect('localhost','root','','siceibd');
if(mysqli_connect_errno())
{
    echo "Fallo al conectar a la base de datos";
    exit;
}