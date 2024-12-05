<?php

$error = false;
$config = include "../../data/config.php";

try{
  $dsn = "mysql:host=" . $config["db"]["host"] . ";dbname=" . $config["db"]["name"];
  $conexion = new PDO($dsn, $config["db"]["user"], $config["db"]["pass"], $config["db"]["options"]);

  //Codigo que obtendra la lista de roles

  $consultaExtraerRol = "SELECT * FROM rol";
  $sentenciaR = $conexion -> prepare($consultaExtraerRol);
  $sentenciaR -> execute();

  $listaRoles = $sentenciaR -> fetchAll();

} catch(PDOException $error){
    $error = $error -> getMessage();
}

if (isset($_POST['submit'])) {
    $resultado = [
      'error' => false,
      'mensaje' => 'El empleado ha sido agregado con éxito'
    ];
  
    $config = include '../../data/config.php';
  
    try {
      $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
      $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);
  
      $empleado = [
        "Nombre"                => $_POST['Nombre'],
        "Apellido"              => $_POST['Apellido'],
        "Documento"             => $_POST['Documento'],
        "Telefono"              => $_POST['Telefono'],
        "Correo"                => $_POST['Correo'],
        "Rol"                   => $_POST['Rol'],
        "Sexo"                  => $_POST['Sexo'],
        "Salario"               => $_POST['Salario'],
        "PorcentajeComision"    => $_POST['PorcentajeComision'],
        "FechaVinculacion"      => $_POST['FechaVinculacion'],
        "FechaTerminacion"      => $_POST['FechaTerminacion']
        ];
  
  
      //Creacion de producto
      $consultaSQL = "INSERT INTO persona (Nombre, Apellido, Documento, Telefono, Correo, IdRol, Sexo, Salario, PorcentajeComision, FechaVinculacion, FechaTerminacion) 
                                  VALUES (:" . implode(", :", array_keys($empleado)) . ")";
    
      $sentencia = $conexion->prepare($consultaSQL);
      $sentencia->execute($empleado);
  
    } catch(PDOException $error) {
      $resultado['error'] = true;
      $resultado['mensaje'] = $error->getMessage();
    }
  }
  ?>

<?php include '../templates/header.php'?>
<?php include '../templates/navegador.php'?>


<div class="d-flex align-items-center justify-content-center pt-5 mt-5 ">
    <div class="container rounded overflow-hidden d-flex" style="max-width: 1100px; height: 900px;">
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


            <h1 class="text-center mb-4">Crear Empleado</h1>

            <a href="./consultarVendedor.php" class="btn mt-4" id="atras">Atras</a>
            <form class="w-100" style="max-width: 300px;" method="post">
                <div class="mb-3">
                    <label for="Nombre" class="col-12 form-label">Nombre:</label>
                    <input type="text" class="col-12 form-control" id="Nombre" placeholder="Ingresa el nombre" name="Nombre"> 
                </div>

                <div class="mb-3">
                    <label for="Apellido" class="col-12 form-label">Apellido:</label>
                    <input type="text" class="col-12 form-control" id="Apellido" placeholder="Ingresa el apellido" name="Apellido">
                </div>

                <div class="mb-3">
                    <label for="Documento" class="col-12 form-label">Numero de Documento:</label>
                    <input type="text" class="col-12 form-control" id="Documento" placeholder="Ingresa el numero de documento" name="Documento"> 
                </div>

                <div class="mb-3">
                    <label for="Telefono" class="col-12 form-label">Telefono:</label>
                    <input type="text" class="col-12 form-control" id="Telefono" placeholder="Ingresa el telefono" name="Telefono">
                </div>

                <div class="mb-3">
                    <label for="Correo" class="col-12 form-label">Correo Electronico:</label>
                    <input type="text" class="col-12 form-control" id="Correo" placeholder="Ingresa el correo" name="Correo"> 
                </div>

                <div class="mb-3">
                    <label for="Rol" class="col-12 form-label">Rol:</label>
                    <select name="Rol" id="Rol" class="form-select" aria-label="Default select example">
                        <option value="">Selecciona una opcion...</option>
                        <?php
                            if ($listaRoles && $sentenciaR->rowCount() > 0) {
                                foreach ($listaRoles as $fila){
                        ?>
                        <option value="<?php echo $fila["IdRol"];?>"><?php echo $fila["Nombre"]; ?></option>
                        <?php
                                }
                            }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="Sexo" class="col-12 form-label">Genero:</label>
                    <select name="Sexo" id="Sexo" class="form-select" aria-label="Default select example">
                      <option value="">Selecciona una opcion...</option>
                      <option value="M">Hombre</option>
                      <option value="F">Mujer</option>
                      <option value="U">Otro</option>
                    </select>
                </div>

                <div class="mb-3">
                  <label for="Salario" class="col-12 form-label">Salario:</label>
                  <input type="number" class="col-12 form-control" id="Salario" placeholder="Ingresa el salario" name="Salario"> 
                </div>

                <div class="mb-3">
                    <label for="PorcentajeComision" class="col-12 form-label">Porcentaje de Comision:</label>
                    <input type="decimal" class="col-12 form-control" id="PorcentajeComision" placeholder="Ingresa el porcentaje de la comision" name="PorcentajeComision">
                </div>

                <div class="mb-3">
                    <label for="FechaVinculacion" class="col-12 form-label">Fecha de vinculacion:</label>
                    <input type="date" class="col-12 form-control" id="FechaVinculacion" placeholder="Ingresa la fecha de vinculacion" name="FechaVinculacion">
                </div>

                <div class="mb-3">
                    <label for="FechaTerminacion" class="col-12 form-label">Fecha de terminacion:</label>
                    <input type="date" class="col-12 form-control" id="FechaTerminacion" placeholder="Ingresa la fecha de terminacion" name="FechaTerminacion"> 
                </div>

                <button type="submit" name="submit"  class="btn btn-custom w-100">Crear</button>
            </form>
            <a href="#" class="mt-3">¿Ya existe la que necesitas...?</a>
        </div>
    </div>

</div>

<!-- Footer -->
<?php include '../templates/footer.php'; ?>