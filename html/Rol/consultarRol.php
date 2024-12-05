<?php
    $error = false;
    $config = include '../../data/config.php';

    try{
        $dsn = "mysql:host=" . $config["db"]["host"] . ";dbname=" . $config["db"]["name"];
        $conexion = new PDO($dsn, $config["db"]["user"], $config["db"]["pass"], $config["db"]["options"]);

        //Codigo que obtendra la lista de roles

        $consultaSQL = "SELECT * FROM rol";

        $sentencia = $conexion -> prepare($consultaSQL);
        $sentencia -> execute();

        $listaRoles = $sentencia -> fetchAll();

    } catch(PDOException $error){
        $error = $error -> getMessage();
    }

?>

<?php include('../templates/header.php');
      include '../templates/navegador.php'; ?>


<h1 class="text-center mt-5 display-4">Consultar Rol</h1>


<?php 
    if ($error){
    ?>
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger" role="alert">
                    <?= $error ?>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>

<div class="container">
<div class="row">
    <div class="col-md-12">
        <a href="./crearRol.php" class="btn mt-4" style="background-color:#961B71">Crear Rol</a>
        <hr>
    </div>
</div>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mt-3" style="color:#961B71">
                Lista de roles
            </h2>
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($listaRoles && $sentencia->rowCount() > 0) {
                        foreach ($listaRoles as $fila){
                            ?>
                            <tr>
                                <td><?php echo $fila["IdRol"]; ?></td>
                                <td><?php echo $fila["Nombre"]; ?></td>
                                <td>
                                <a class="btn btn-danger" href="<?= 'borrar.php?id='.$fila["IdRol"] ?> ">Borrar</a>
                                </td>
                                <!-- <td>
                                    
                                    <a class="btn btn-success" href="<?= 'editar.php?id='.$fila["id"] ?> ">Editar</a>
                                </td> -->
                            </tr>
                        <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include "../templates/footer.php"; ?>