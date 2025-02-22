<?php require "..//templates/header.php"; ?>

<?php

$config = include '../data/config.php';



$resultado = [
    'error' => false,
    'mensaje' => ''
];

try{
    $dsn = 'mysql:host=' . $config['db']['host'].';dbname=' . $config['db']['name'];
    $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

    $id = $_GET['id'];
    $consultaSQL = "DELETE FROM marca WHERE idMarca=" . $id;

    $sentencia = $conexion -> prepare($consultaSQL);
    $sentencia->execute();

    header('Location: .//consultarMarca.php');

}catch(PDOException $error) {
    $resultado['error'] = true;
    $resultado['mensaje'] = $error->getMessage();
}
?>

<div class="container mt-2">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger" role="alert">
                <?= $resultado['mensaje'] ?>
            </div>
        </div>
    </div>
</div>


<?php require "..//templates/footer.php"; ?>