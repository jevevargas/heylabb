<?php
session_start();


if(!isset($_SESSION['idusuario'])){
   
    $url='../index.php';
    header("Location: $url");
    }else{
    $idusuario = $_SESSION['idusuario'];
    $nombre = $_SESSION['nombre'];
    $idtipousuario = $_SESSION['idtipousuario'];  //echo $tipo;
    $idcomercio = $_SESSION['idcomercio'];
    $nombrecompleto = $_SESSION['nombrecompleto'];
    //$modfecha = $_SESSION['fechamod'];
   // $nombrecompleto = $_SESSION['nombrecompleto'];
    }


    