<?php
$con  = mysqli_connect('localhost','root','','siceibd');
if(mysqli_connect_errno())
{
    echo 'Error al conectar con la base de datos';
}