<?php 
session_start(); // Inicia una nueva sesión o reanuda la existente

// Credenciales de acceso a la base de datos
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'wiigoinventario';

try {
    // Conexión a la base de datos usando PDO
    $conexion = new PDO("mysql:host=$DATABASE_HOST;dbname=$DATABASE_NAME;charset=utf8", $DATABASE_USER, $DATABASE_PASS);
    // Configurar PDO para lanzar excepciones en caso de error
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Si la conexión falla, se muestra un mensaje de error y se termina la ejecución
    exit('Fallo en la conexión de MySQL: ' . $e->getMessage());
}

// Verificar si se han enviado los datos del formulario
if (!isset($_POST['email'], $_POST['contrasena'])) {

    // Redirigir si no se envió la información esperada
    header('Location: ../../../../index.php');
    exit();
}

$username = $_POST['email'];
$password = $_POST['contrasena'];

try {
    // Preparar la consulta para evitar inyección SQL
    $stmt = $conexion->prepare('SELECT idPersona, contrasena FROM persona WHERE correo = :username');
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();

    // Verificar si se encontró el usuario
    if ($stmt->rowCount() > 0) {
        // Recuperar el ID y la contraseña almacenada
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Comparar la contraseña ingresada con la almacenada (sin hash en este caso)
        if ($password === $user['contrasena']) {
            // La conexión es exitosa, iniciar sesión
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $username;
            $_SESSION['id'] = $user['id'];
            header('Location: ../../../../index.php');
            exit();
        } else {
            // Contraseña incorrecta
            header('Location: ./login.php?contrasena');
            exit();
        }
    } else {
        // Usuario no encontrado
        
        header('Location: ./login.php?usuario');
        
        exit();
    }
} catch (PDOException $e) {
    // Manejo de errores en caso de fallas en la consulta
    exit('Error en la consulta: ' . $e->getMessage());
}

?>
