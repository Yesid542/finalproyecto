<?php
session_start();  // Inicia una nueva sesión o reanuda la existente. 
                  // Esto es necesario para poder acceder a las variables de sesión existentes 
                  // y para poder destruirlas adecuadamente.

session_destroy();  // Destruye toda la información registrada de una sesión.
                    // Esto elimina todos los datos de la sesión almacenados en el servidor, 
                    // lo cual efectivamente "cierra la sesión" del usuario, asegurando que 
                    // ninguna información de la sesión persista más allá de este punto.

header('Location: ./login.php');   // Redirecciona al usuario a 'index.html'.
                                 // Esta es una página típicamente utilizada para el inicio 
                                 // o entrada del sitio, donde el usuario puede iniciar sesión de nuevo.
                                 // El uso de 'header' para redireccionar debe ser precedido por 
                                 // la destrucción de la sesión o cualquier manejo de datos de sesión
                                 // para asegurar que la página a la que el usuario es redirigido
                                 // no acceda a datos de sesión ya invalidados.
?>
