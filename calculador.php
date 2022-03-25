<?php
session_start();
$numA=$_SESSION['numa'];
$numB=$_SESSION['numb'];
$res=$_POST['res'];
$calculo= $numA + $numB;
if($res==$calculo){
    $tiempoRespuesta= microtime($get_as_float = true);
    $tiempoInicial= $_SESSION['tiempoInicial'];
    $lapso= $tiempoRespuesta-$tiempoInicial;
    $tiempo =ceil($lapso);
    $_SESSION['mensaje']="Tu resultado es correcto y has tardado ".$tiempo." seg";
}else{
    $tiempoRespuesta= microtime($get_as_float = true);
    $tiempoInicial= $_SESSION['tiempoInicial'];
    $lapso= $tiempoRespuesta-$tiempoInicial;
    $tiempo =ceil($lapso);
    $_SESSION['mensaje']="Tu resultado esta mal y has tardado ".$tiempo." seg";
}
header('Location: index.php');
?>