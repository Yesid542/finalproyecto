<nav class="navbar navbar-expand-lg p-4" style="background-color: #252323;" >
<style>
        .dropdown-menu {
            background-color: #252323; /* Mismo color que el navbar */
            color: #ffffff; /* Texto visible */
        }
        .dropdown-menu a {
            color: #ffffff; /* Enlaces visibles */
        }
        .dropdown-menu a:hover {
            background-color: #961B71; /* Fondo para hover */
            color: #ffffff; /* Texto en hover */
        }
</style>


        <div class="container-fluid ">
          <a style="color: #961B71;" class="navbar-brand " href="../../index.php"><strong>Wiigo Sport</strong></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="../../index.php">Principal</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Vendedores
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item text-white" href="">Consultar Empleado</a></li>
                  <li><a class="dropdown-item text-white" href="../../html/Rol/crearEmpleado.php">Crear Empleado</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Productos
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item text-white" href="">Consultar Producto</a></li>
                  <li><a class="dropdown-item text-white" href="../../html/Producto/crearProducto.php">Crear Producto</a></li>
                </ul>
              </li>

              <li class="nav-item dropdown" style="background-color: #252323;">
                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Otros..
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item text-white" href="../../html/Marcas/consultarMarca.php">Consultar Marca</a></li>
                  <li><a class="dropdown-item text-white" href="../../html/TipoCalzado/consultarTipoCalzado.php">Consultar Tipo de calzado</a></li>
                  <li><a class="dropdown-item text-white" href="../../html/Rol/consultarRol.php">Consultar Rol</a></li>
                </ul>
              </li>

              <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="../../html/InicioDeSesion/cerrar_sesion.php"><strong>Cerrar Sesion</strong></a>
              </li>
            </ul>
          </div>
        </div>
</nav>