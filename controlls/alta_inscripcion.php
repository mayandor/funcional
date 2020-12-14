<?php 
include('../includes/conexion.inc.php');
session_start();
try{
    $sql=$conexion->prepare("SELECT e.id_es FROM estudiante e, usuario u WHERE u.id_us = e.id_us and u.id_us= '{$_SESSION['id_us']}'");
    $sql->execute();
    $fila= $sql->fetch();
    $id_mat = $_GET['id_mat'];
    $id_es = $fila[0];
    $sql1=$conexion->prepare("INSERT INTO inscripcion(id_ins, id_mat, id_es) VALUES(NULL , '$id_mat', '$id_es'");
    $sql1->execute();
    echo $_GET['id_mat'];
    echo $fila[0];
}catch(PDOException $e){
    print "Error: ".$e->getMessage()."<br/>";
    die();
}
?>
