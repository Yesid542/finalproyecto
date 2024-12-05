<?php

$error = false;
$config = include "../../data/config.php";

try{
  $dsn = "mysql:host=" . $config["db"]["host"] . ";dbname=" . $config["db"]["name"];
  $conexion = new PDO($dsn, $config["db"]["user"], $config["db"]["pass"], $config["db"]["options"]);

  //Codigo que obtendra la lista de marcas

  $consultaExtraerMarca = "SELECT * FROM marca";
  $sentenciaM = $conexion -> prepare($consultaExtraerMarca);
  $sentenciaM -> execute();

  $listaMarca = $sentenciaM -> fetchAll();
  

  // Codigo para lista de tipos de calzado
  $consultaExtraerTipoCalzado = "SELECT * FROM tipoCalzado";
  $sentenciaTC = $conexion -> prepare($consultaExtraerTipoCalzado);
  $sentenciaTC -> execute();

  $listaTipoCalzado = $sentenciaTC -> fetchAll();

} catch(PDOException $error){
  $error = $error -> getMessage();
}

if (isset($_POST['submit'])) {
  $resultado = [
    'error' => false,
    'mensaje' => 'El producto ha sido agregado con éxito'
  ];

  $config = include '../../data/config.php';

  try {
    $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
    $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

    $calzados = [
      "tipoCalzado"   => $_POST['tipoCalzado'],
      "marca" => $_POST['marca'],
      "genero"=> $_POST['genero'],
      "descripcion"=> $_POST['descripcion']
    ];


    //Creacion de producto
    $consultaSQL = "INSERT INTO calzado (IdTipoCalzado, IdMarca, Genero, Descripcion) values (:" . implode(", :", array_keys($calzados)) . ")";

    $sentencia = $conexion->prepare($consultaSQL);
    $sentencia->execute($calzados);

  } catch(PDOException $error) {
    $resultado['error'] = true;
    $resultado['mensaje'] = $error->getMessage();
  }
}
?>




<?php include '../templates/header.php'?>
<?php include '../templates/navegador.php'?>

<div class="d-flex align-items-center justify-content-center pt-5 mt-5 ">
    <div class="container rounded overflow-hidden d-flex" style="max-width: 900px; height: 500px;">
        <!-- Lado izquierdo -->
        <div class="left-side flex-fill">
            <img src="../../img/zapatoMarca.png" alt="Zapatos" class="img-fluid">
        </div>
        <!-- Lado derecho -->
        <div class="right-side flex-fill d-flex flex-column justify-content-center align-items-center p-4">

               <?php
                if (isset($resultado)) {
                  ?>
                  <div class="container mt-3">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="alert alert-<?= $resultado['error'] ? 'danger' : 'success' ?>" role="alert">
                          <?= $resultado['mensaje'] ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php
                }
                ?> 


            <h1 class="text-center mb-4">Crear producto</h1>

            <a href="./consultarProducto.php" class="btn mt-4" id="atras">Atras</a>
            <form class="w-100" style="max-width: 300px;" method="post">
                <div class="mb-3">
                    <label for="tipoCalzado" class="col-12 form-label">Tipo de calzado:</label>
                    <select name="tipoCalzado" id="tipoCalzado" class="form-select" aria-label="Default select example">
                      <option value="">Selecciona una opcion...</option>
                        <?php
                          if ($listaTipoCalzado && $sentenciaTC->rowCount() > 0) {
                            foreach ($listaTipoCalzado as $fila){
                        ?>
                        <option value="<?php echo $fila["IdTipoCalzado"];?>"><?php echo $fila["Nombre"]; ?></option>
                        <?php
                            }
                          }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="marca" class="col-12 form-label">Marca:</label>
                    <select name="marca" id="marca" class="form-select" aria-label="Default select example">
                      <option value="">Selecciona una opcion...</option>
                      <?php
                        if ($listaMarca && $sentenciaM->rowCount() > 0) {
                          foreach ($listaMarca as $fila){
                        ?>
                        <option value="<?php echo $fila["IdMarca"];?>"><?php echo $fila["Nombre"]; ?></option>
                        <?php
                          }
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                  <label for="genero" class="col-12 form-label">Genero:</label>
                    <select name="genero" id="genero" class="form-select" aria-label="Default select example">
                      <option value="">Selecciona una opcion...</option>
                      <option value="M">Hombre</option>
                      <option value="F">Mujer</option>
                      <option value="U">Unisex</option>
                    </select>
                </div>

                <div class="mb-3">
                  <label for="descripcion" class="col-12 form-label">Descripcion:</label>
                  <textarea class="form-control" name="descripcion" id="descripcion"></textarea>
                </div>

                <button type="submit" name="submit"  class="btn btn-custom w-100">Crear</button>
            </form>
            <a href="#" class="mt-3">¿Ya existe la que necesitas...?</a>
        </div>
    </div>

</div>

<!-- Footer -->
<?php include '../templates/footer.php'; ?>