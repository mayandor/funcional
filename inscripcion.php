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
            <h2>INSCRIBIRSE</h2>

<?php 
include('includes/conexion.inc.php');
try {
    $sql1 = $conexion->prepare("SELECT * FROM materia m, horario h WHERE m.id_hor= h.id_hor");
    $sql1->execute(); 
?>

    <div class="main">
        <!-- Aqui va el contenido -->
        <h1>LISTA DE MATERIAS</h1>
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
        ?>
            <td><a href="controlls/alta_inscripcion.php?id_mat=<?php echo urlencode($fila[0]);?>">Inscribirme</a></td>
            <tr>
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