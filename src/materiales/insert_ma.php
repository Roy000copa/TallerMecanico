<?php
include("../db.php");

if (isset($_POST['insert_ma'])){
    $idtarea = $_POST['tarea'];
    $idproveedor = $_POST['proveedor'];
    $nombre = $_POST['nombre'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];
    $fecha = $_POST['fecha'];
    
    $query = "INSERT INTO MaterialReparacion(TareaID, ProveedorID, Nombre, Cantidad, Precio, FechaAdquisicion) VALUES ('$idtarea', '$idproveedor', '$nombre', '$cantidad', '$precio', '$fecha')";
    $result = mysqli_query($conn, $query);
    if (!$result){
        die("query Failed");
    }

    $_SESSION['message'] = 'Tarea Guardada satisfactoriamente';
    header("Location: ../index.php");
}
?>