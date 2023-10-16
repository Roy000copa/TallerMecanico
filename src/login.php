<?php include("db.php")?>
<?php include("includes/header_log.php")?>

<div style="display: flex;">
    <div><img src="https://th.bing.com/th/id/OIG.bE0yEGQhb8hW88iRo9I2?pid=ImgGn" style="width: 750px; height: 94vh"></div>
    <div class="row" style="margin: 0 auto;">
        <h1 class="text-center" style="margin-top: 70px">Taller Mecanico AutoTeam</h1>
        <div  style="max-width:600px; margin: 0 auto;">
            <div class="text-center" style="aling-items: center; margin-bottom: 70px "><h3>Ingrese su usuario</h3></div>
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?= $_SESSION['message']?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <?php session_unset(); } ?>
            <div class="card card-body">
                <!-- <form action="enter_log.php" method="POST"> -->
                <form action="enter_log.php" method="POST"> 
                    <!-- onsubmit="redirigirEnterLog(); redirigirPerfil(); return false;"> -->
                    <div class="form-group  container p-4">
                        <input type="text" name="username" class="form-control" placeholder="Username" autofocus>
                    </div>
                    <div class="form-group container p-4" >
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group  container p-4" style="display: flex; justify-content: space-between;">
                        <!-- <button type="submit" class="btn btn-success btn-block" onclick="funcion1(); funcion2();">Enviar</button>
                        <script>
                            function redirigirEnterLog() {
                                window.location.href = "enter_log.php";
                            }

                            function redirigirPerfil() {
                                window.location.href = "perfil.php";
                            }
                        </script> -->
                        <input type="submit" class="btn btn-success btn-block" name="login" value="Enviar">
                        <a href="registro.php" class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" style="margin-right: 1px;">No tengo una cuenta</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php")?>

