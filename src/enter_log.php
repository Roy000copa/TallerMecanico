<?php
include("db.php");

if (isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Utilizar consultas preparadas para proteger contra inyección SQL
    // $query = "SELECT * FROM Usuarios WHERE Username = ? AND Contrasena = ?";
    // $stmt = mysqli_prepare($conn, $query);
    // mysqli_stmt_bind_param($stmt, "iss", $password, $username);
    // mysqli_stmt_execute($stmt);
    // $result = mysqli_stmt_get_result($stmt);

    $query = "SELECT * FROM Clientes WHERE ClienteID = '$password' AND Nombre = '$username'";
    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) > 0){ // verificando si el registro existe en le base de datos
        // Verificar el usuario 
        if ($username == 'Froilan' and $password == '12345' ) {
            // Redirigir a la página index.php
            header('Location: index.php');
            exit;
        } elseif ($username == 'miguel' and $password == '1234567890' ) {
            // Redirigir a la página index.php
            header('Location: index.php');
            exit;
        }
        else{
            header('Location: perfil.php');
            exit;
        }
    }else{
        $_SESSION['message'] = 'No se encontro ningun usuario';
    }
    header('Location: login.php');
    exit;
}
?>