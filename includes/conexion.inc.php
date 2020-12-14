<?php
// $conn = mysqli_connect("localhost", "root","123");
// mysqli_select_db($conn, "academico");
//$conn = new PDO('mysql:host=localhost;dbname=academico', "root", "");
try {
    $conexion = new PDO('mysql:host=localhost;dbname=academico', "root", "123");
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>