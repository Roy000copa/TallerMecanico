<?php
include("../db.php");

if (isset($_POST['insert_me'])){
    $mecanicoid = $_POST['mecanicoid'];
    $nombre = $_POST['name'];
    $paterno = $_POST['lastnameP'];
    $materno = $_POST['lastnameM'];
    $especialidad = $_POST['especialidad'];
    $telefono = $_POST['telefono'];
    $query = "INSERT INTO Mecanicos(MecanicoID, Nombre, ApellidoPaterno, ApellidoMaterno, Especialidad, NumeroTelefono) VALUES ('$mecanicoid', '$nombre', '$paterno', '$materno', '$especialidad', '$telefono')";
    $result = mysqli_query($conn, $query);
    if (!$result){
        die("query Failed");
    }

    $_SESSION['message'] = 'Mecanico satisfactoriamente';
    header("Location: ../index.php");
}
?>