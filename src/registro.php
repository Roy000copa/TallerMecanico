<?php include("includes/header_log.php")?>
<?php include("db.php")?>

<div style="display: flex;">
    <div><img src="https://th.bing.com/th/id/OIG.mOBkaGXOLSyHS0uDP6Hs?pid=ImgGn" style="width: 750px; height: 94vh"></div>
    <div class="row" style="margin: 0 auto;">
        <h1 class="text-center" style="margin-top: 40px;">TALLER MECANICO AUTOTEAM</h1>
        <div  style="max-width:600px; margin: 0 auto;">
            <div class="text-center" style="aling-items: center; margin: 25px 0"><h2>Ingrese sus datos</h2></div>
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?= $_SESSION['message']?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <?php session_unset(); } ?>
            <div class="card card-body">
                <form action="registro/insert_reg.php" method="POST">
                    <div class="form-group container p-3">
                        <input type="text" name="name" class="form-control" placeholder="Nombre" autofocus>
                    </div>
                    <div class="form-group container p-3">
                        <input type="text" name="lastname" class="form-control" placeholder="Apellidos">
                    </div>
                    <div class="form-group container p-3">
                        <input type="number" name="phone" class="form-control" placeholder="Phone">
                    </div>
                    <div class="form-group container p-3">
                        <input type="text" name="address" class="form-control" placeholder="Address">
                    </div>
                    <div class="form-group container p-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group container p-3">
                        <input type="password" name="password" class="form-control" placeholder="CI">
                    </div>
                    <div class="container p-3" style="display: flex; justify-content: space-between;">
                        <input type="submit" class="btn btn-success btn-block" name="insert_reg" value="Guardar">
                        <a href="login.php" class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" style="margin-right: 1px;">Ya tengo una cuenta</a>
                    </div>  
                </form>
            </div>
        </div>
    </div>
</div>
<?php include("includes/footer.php")?>