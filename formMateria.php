<?php
    session_start();
    // si la session no existe entondes redirecciona añ index caso contrario deja pasar y se carga la pagina
    if (!isset($_SESSION['username'])){
        header("location: index.php");
    }
    include('includes/conexion.inc.php');
    include('includes/header.php');
    include('includes/sidebar.php');
?>
        <!-- Aqui va el contenido -->

    <div class="main">
        <!-- Aqui va el contenido -->
        <form class="" action="alta_materia.php" method="POST" novalidate >
            <div class="">
                <label class="" >Materia*</label>
                <div class="">
                      <input type="text" name="materia">
                </div>
            </div>
            <div class="">
                <label class="" >Sigla*</label>
                <div class="">
                      <input type="text" name="sigla">
                </div>
            </div>
            <div class="">
                <label class="" >Cupo minimo*</label>
                <div class="">
                      <input type="text" name="cupo_min">
                </div>
            </div>
            <div class="">
                <label class="">Docente*</label>
                <div class="">
                <select name="id_do">
                    <option>Seleccione</option>
                    <?php 
                        try {
                            $sql = $conexion->prepare("SELECT * FROM docente d, usuario u WHERE d.id_us = u.id_us");
                            $sql->execute(); 
                            while($fila = $sql->fetch())
                            {                        
                    ?>
                      <option value="<?php echo $fila[0];?>"><?php echo $fila[6]." ".$fila[7];?></option>
                        <?php } ?>
                </select>
                </div>
            </div>
        <?php
        }catch(PDOException $e){
          print "Error: ".$e->getMessage()."<br/>";
          die();
                  }  
        ?>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                        <button type="submit" class="btn btn-lg btn-primary">Adicionar</button>
                      </div>
                      </div>
                    </form>
    </div>
