<?php
include("../db.php");

if (isset($_POST['insert_pro'])){
    $mecanicoid = $_POST['id'];
    $nombre = $_POST['name'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['address'];
    $query = "INSERT INTO Proveedores(Nombre, NumeroTelefono, Direccion) VALUES ('$nombre', '$telefono', '$direccion')";
    $result = mysqli_query($conn, $query);
    if (!$result){
        die("query Failed");
    }

    $_SESSION['message'] = 'Proveedor guardado';
    header("Location: ../index.php");
}
?>