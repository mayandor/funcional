<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/consulta.css"></link>
    <title>Inscripcion</title>
</head>
<?php
    session_start();
    // si la session no existe entondes redirecciona añ index caso contrario deja pasar y se carga la pagina
    if (!isset($_SESSION['username'])){
        header("location: index.php");
    }
?>
    <div>
        <?php include('includes/header.php')?>
        <?php include('includes/sidebar.php')?>
        <!-- Aqui va el contenido -->
        <div class="main">
<?php 
include('includes/conexion.inc.php');
try {
    $sql1 = $conexion->prepare("SELECT * FROM materia m, horario h WHERE m.id_hor= h.id_hor");
    $sql1->execute(); 
?>

    <div class="main">
        <!-- Aqui va el contenido -->
        <table>
            <thead>
                <td>MATERIA</td>
                <td>SIGLA</td>
                <td>CUPO MINIMO</td>
                <td>HORARIO</td>
                <td>DIAS</td>
                <td>Operaciones</td>
            </thead>
        <?php
        while($fila = $sql1->fetch())
        {
            echo "<tr>";
            echo "<td>".$fila[4]."</td>";
            echo "<td>".$fila[5]."</td>";
            echo "<td>".$fila[6]."</td>";
            echo "<td>".$fila[8]." - ".$fila[9]."</td>";
            echo "<td>".$fila[10]."</td>";
            $sql=$conexion->prepare("SELECT * FROM estudiante e, inscripcion i, materia m WHERE e.id_es=i.id_es and i.id_mat=$fila[0]");
            $sql->execute();
            $fila1= $sql->fetch();
            if($fila1[5]=$fila[0]){
                ?>
                <td><a href="controlls/alta_inscripcion.php?id_mat=<?php echo urlencode($fila[0]);?>" class="botonmat" id="disable">Inscribirme</a></td>
                <tr>
                <?php
            }else{?>
                <td><a href="controlls/alta_inscripcion.php?id_mat=<?php echo urlencode($fila[0]);?>" class="botonmat">Inscribirme</a></td>
                <tr>
        <?php
            }
        ?>
        <?php }
    }catch(PDOException $e){
          print "Error: ".$e->getMessage()."<br/>";
          die();
                  }  
        ?>
        </table>
        </div>
        </div>
    </div>
    <script>
        var boton= document.getElementById("disable");
        boton = true;
    </script>