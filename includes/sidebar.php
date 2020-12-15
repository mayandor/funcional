<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/sidebar.css">
    <title>Document</title>
</head>
<body>
    <div class="sidenav" style="background-color:<?php echo $_SESSION['color']; ?>">
        <a>SEA</a>
        <a href="#"><img src="./img/birrete.png" alt="" width="60"></a>
        <?php
            if($_SESSION['rol']=='e'){
        ?>
        <ul>
            <li><a href="#" class="menuDesplegable">Curso de Verano</a>
                <ul>
                    <li class="menuDesplegable"><a href="inscripcion.php">Inscripcion</a></li>
                    <li class="menuDesplegable"><a href="#">Materias inscritas</a></li>
                </ul>
            </li>    
        </ul>
            
        <?php
        }
            if($_SESSION['rol']=='d'){
        ?>
            <a href="#" class="menu">Listar Est</a>
            <a href="#">Reporte</a>
        <?php
        }
        ?>
    </div>