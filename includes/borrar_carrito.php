<?php
session_start();
$id =  $_GET['id'];
$carro = $_SESSION['carro'];

unset($carro[$id]);

$_SESSION['carro'] = $carro;
header("Location:../ver_carrito.php");
?>