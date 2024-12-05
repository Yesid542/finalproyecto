<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/indexx.css">
    <link rel="stylesheet" href="/assets/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>

<?php include '../ProyectoSena/html/templates/navegador.php'; ?>

<body>

<div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel" style="" >
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner" style="border-radius: 10px;height:500px; width:75%;margin-left:12%;margin-top:10%;">
        <div class="carousel-item active carousel" style="background-image:url(/img/nike.jpg);background-size:cover;">
        <div class="overlay"></div>
            <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="none"/></svg>
                <div class="container">
                    <div class="carousel-caption text-start" style="opacity:none;">
                        <h1 >Garantes de su seguridad</h1>
                        <p class="opacity-75">Some representative placeholder content for the first slide of the carousel.</p>
                        <p><a class="btn btn-lg btn" style="background-color:rgb(200, 46, 231);"  href="/html/InicioDeSesion/login.php">Registrate</a></p>
                    </div>
                </div>  
        </div>
        <div class="carousel-item active carousel" style="background-image:url(/img/zapatoscarrusel.png);background-size:cover;">
            <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="none"/></svg>
            <div class="container">
            <div class="overlay"></div>
                <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="none"/></svg>
                
            
            <div class="carousel-caption">
                    <h1>Ofertas accesibles</h1>
                    <p>Some representative placeholder content for the second slide of the carousel.</p>
                    <p><a class="btn btn-lg btn" style="background-color:rgb(200, 46, 231);" href="#">Conoce Mas</a></p>
                </div>
            </div>
        </div>
        <div class="carousel-item active carousel" style="background-image:url(/img/personal.jpg);background-size:cover;">
            <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="none"/></svg>
                <div class="container">
                    <div class="overlay"></div>
                    <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="none"/></svg>
                
                    <div class="carousel-caption text-end">
                        <h1>Nosotros</h1>
                        <p>Some representative placeholder content for the third slide of this carousel.</p>
                        <p><a class="btn btn-lg btn" style="background-color:rgb(200, 46, 231);" href="#">Contactenos</a></p>
                    </div>
                </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
</div>

<h2 class="titulos">Descubre</h2>

<div id="contenedor">
    <div class="cajas" style="background-image:url(/img/1jpg.jpg);background-size:cover;"></div>
    <div class="cajas" style="background-image:url(/img/2.jpg);background-size:cover;"></div>
    <div class="cajas"style="background-image:url(/img/3.jpg);background-size:cover;"></div>
    <div class="cajas" style="background-image:url(/img/4.jpg);background-size:cover;"></div>
    <div class="cajas" style="background-image:url(/img/5.jpg);background-size:cover;"></div>

</div>
    
</body>
<?php include '../ProyectoSena/html/templates/footer.php'; ?>

</html>