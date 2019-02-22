<?php
include 'header.php';
?>
<body>
<!--SLIDER  XD-->
  <div>
    <div class="slideshow-container">

      <div class="mySlides fade">
       <!-- <div class="numbertext">1 / 3</div>-->
        <img src="images/img_nature_wide.jpg" style="width:100%">
        <!--<div class="text">Caption Text</div>-->
      </div>
      
      <div class="mySlides fade">
        <!--<div class="numbertext">2 / 3</div>-->
        <img src="images/img_snow_wide.jpg" style="width:100%">
       <!-- <div class="text">Caption Two</div>-->
      </div>
      
      <div class="mySlides fade">
       <!-- <div class="numbertext">3 / 3</div>-->
        <img src="images/img_mountains_wide.jpg" style="width:100%">
       <!-- <div class="text">Caption Three</div>-->
      </div>
      
      </div>
      <br>
      
      <div style="text-align:center">
        <span class="dot"></span> 
        <span class="dot"></span> 
        <span class="dot"></span> 
      </div>
      <script>
      var slideIndex = 0;
      showSlides();
      
      function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";  
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}    
        for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";  
        dots[slideIndex-1].className += " active";
        setTimeout(showSlides, 10000); // Change image every 2 seconds
      }
      </script>
      </div>
  
  <!-- SECCION NAVEGACIÓN-->
  <nav class="navbar navbar-dark bg-dark navbar-expand-md fixed-top">
    <div class="container">    
     
      <a style="color:yellow" href="#" class="navbar-brand">
        <strong >Cineri</strong> beta 1.0
      </a>
   
      <button type="button" class="navbar-toggler" data-toggle="collapse"
      data-target="#menu-principal" aria-controls="menu-principal" aria-expanded="false"
      aria-label="Desplegar menú de navegación">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="menu-principal" >
      <ul class="navbar-nav ml-auto" >
        <li class="nav-item"><a href="#" class="nav-link">Registro</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Promociones</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Estrenos</a></li>
      
      </ul>
    </div>
  </div>
</nav>

<section class="filosofia py-4 bg-primary text-center text-white">

  <div class="container">
    <div class="row">
      <div class="col-12">
        <img src="images/logocine.jpg" width="260" height="auto" alt="Avatar de Tomas Mendez" class="img-fluid rounded-circle mb-4">
       <!--<p class="h2"></p>
        <p class="h4 font-italic">-</p>--> 
      </div>
    </div>
  </div>
</section>

<!-- SECCION PROYECTOS -->
<section class="proyectos py-4">
  <div class="container">
    <h1 class="display-4 font-weight-bold text-center pb-4">Cartelera</h1>
    <div class="row text-md-center">
      <article class="col-12 col-md-6 col-lg-3 mb-3 mb-lg-0">
        <div class="card">
          <img class="card-img-top h-100" src="images/peliculas1.jpg" alt="Proyecto 1">
          <div class="card-body">
            <h5 class="card-title">Pelicula 1</h5>
            <p class="card-text">
            Descripcion de la pelicula</p>
            <a href="#" class="btn btn-primary">Reservar En Desarollo</a>
          </div>
        </div>
        <br>
      </article>
      
      <article class="col-12 col-md-6 col-lg-3 mb-3 mb-lg-0">
        <div class="card">
          <img class="card-img-top h-100" src="images/pelicula2.jpg" alt="Proyecto 2">
          <div class="card-body">
            <h5 class="card-title">Pelicula 2</h5>
            <p class="card-text">
           Descripcion de la pelicula </p>
            <a href="#" class="btn btn-primary">Reservar en desarollo</a>
          </div>
        </div>
        <br>
      </article>

      <article class="col-12 col-md-6 col-lg-3 mb-3 mb-lg-0">
        <div class="card">
          <img class="card-img-top h-100" src="images/pelicula3.jpg" alt="Proyecto 3">
          <div class="card-body">
            <h5 class="card-title">Pelicula 3</h5>
            <p class="card-text">
           Descripcion de la pelicula</p>
            <a href="#" class="btn btn-primary">Reservar en desarollo</a>
          </div>
        </div>
        <br>
      </article>
      <article class="col-12 col-md-6 col-lg-3   mb-3 mb-lg-0">
        <div class="card">
          <img class="card-img-top h-100" src="images/peliculas1.jpg" alt="Proyecto 4">
          <div class="card-body">
            <h5 class="card-title">Pelicula 4</h5>
            <p class="card-text">
            Descripcion de la pelicula</p>
            <a href="#" class="btn btn-primary">Reservar en desarollo</a>
          </div>
        </div>
        <br>
      </article>
    
      <article class="col-12 col-md-6 col-lg-3 mb-3 mb-lg-0">
          <div class="card">
            <img class="card-img-top h-100" src="images/peliculas1.jpg" alt="Proyecto 1">
            <div class="card-body">
              <h5 class="card-title">Pelicula 1</h5>
              <p class="card-text">
              Descripcion de la pelicula</p>
              <a href="#" class="btn btn-primary">Reservar En Desarollo</a>
            </div>
          </div>
          <br>
        </article>
        <article class="col-12 col-md-6 col-lg-3 mb-3 mb-lg-0">
          <div class="card">
            <img class="card-img-top h-100" src="images/pelicula2.jpg" alt="Proyecto 2">
            <div class="card-body">
              <h5 class="card-title">Pelicula 2</h5>
              <p class="card-text">
             Descripcion de la pelicula </p>
              <a href="#" class="btn btn-primary">Reservar en desarollo</a>
            </div>
          </div>
          <br>
        </article>
  
        <article class="col-12 col-md-6 col-lg-3 mb-3 mb-lg-0">
          <div class="card">
            <img class="card-img-top h-100" src="images/pelicula3.jpg" alt="Proyecto 3">
            <div class="card-body">
              <h5 class="card-title">Pelicula 3</h5>
              <p class="card-text">
             Descripcion de la pelicula</p>
              <a href="#" class="btn btn-primary">Reservar en desarollo</a>
            </div>
          </div>
          <br>
        </article>
        <article class="col-12 col-md-6 col-lg-3   mb-3 mb-lg-0">
          <div class="card">
            <img class="card-img-top h-100" src="images/peliculas1.jpg" alt="Proyecto 4">
            <div class="card-body">
              <h5 class="card-title">Pelicula 4</h5>
              <p class="card-text">
              Descripcion de la pelicula</p>
              <a href="#" class="btn btn-primary">Reservar en desarollo</a>
            </div>
          </div>
          <br>
        </article>
        <article class="col-12 col-md-6 col-lg-3 mb-3 mb-lg-0">
            <div class="card">
              <img class="card-img-top h-100" src="images/peliculas1.jpg" alt="Proyecto 1">
              <div class="card-body">
                <h5 class="card-title">Pelicula 1</h5>
                <p class="card-text">
                Descripcion de la pelicula</p>
                <a href="#" class="btn btn-primary">Reservar En Desarollo</a>
              </div>
            </div>
            <br>
          </article>
          <article class="col-12 col-md-6 col-lg-3 mb-3 mb-lg-0">
            <div class="card">
              <img class="card-img-top h-100" src="images/pelicula2.jpg" alt="Proyecto 2">
              <div class="card-body">
                <h5 class="card-title">Pelicula 2</h5>
                <p class="card-text">
               Descripcion de la pelicula </p>
                <a href="#" class="btn btn-primary">Reservar en desarollo</a>
              </div>
            </div>
            <br>
          </article>
    
          <article class="col-12 col-md-6 col-lg-3 mb-3 mb-lg-0">
            <div class="card">
              <img class="card-img-top h-100" src="images/pelicula3.jpg" alt="Proyecto 3">
              <div class="card-body">
                <h5 class="card-title">Pelicula 3</h5>
                <p class="card-text">
               Descripcion de la pelicula</p>
                <a href="#" class="btn btn-primary">Reservar en desarollo</a>
              </div>
            </div>
            <br>
          </article>
          <article class="col-12 col-md-6 col-lg-3   mb-3 mb-lg-0">
            <div class="card">
              <img class="card-img-top h-100" src="images/peliculas1.jpg" alt="Proyecto 4">
              <div class="card-body">
                <h5 class="card-title">Pelicula 4</h5>
                <p class="card-text">
                Descripcion de la pelicula</p>
                <a href="#" class="btn btn-primary">Reservar en desarollo</a>
              </div>
            </div>
            <br>
          </article>
        
          <article class="col-12 col-md-6 col-lg-3 mb-3 mb-lg-0">
              <div class="card">
                <img class="card-img-top h-100" src="images/peliculas1.jpg" alt="Proyecto 1">
                <div class="card-body">
                  <h5 class="card-title">Pelicula 1</h5>
                  <p class="card-text">
                  Descripcion de la pelicula</p>
                  <a href="#" class="btn btn-primary">Reservar En Desarollo</a>
                </div>
              </div>
              <br>
            </article>
            <article class="col-12 col-md-6 col-lg-3 mb-3 mb-lg-0">
              <div class="card">
                <img class="card-img-top h-100" src="images/pelicula2.jpg" alt="Proyecto 2">
                <div class="card-body">
                  <h5 class="card-title">Pelicula 2</h5>
                  <p class="card-text">
                 Descripcion de la pelicula </p>
                  <a href="#" class="btn btn-primary">Reservar en desarollo</a>
                </div>
              </div>
              <br>
            </article>
      
            <article class="col-12 col-md-6 col-lg-3 mb-3 mb-lg-0">
              <div class="card">
                <img class="card-img-top h-100" src="images/pelicula3.jpg" alt="Proyecto 3">
                <div class="card-body">
                  <h5 class="card-title">Pelicula 3</h5>
                  <p class="card-text">
                 Descripcion de la pelicula</p>
                  <a href="#" class="btn btn-primary">Reservar en desarollo</a>
                </div>
              </div>
              <br>
            </article>
            <article class="col-12 col-md-6 col-lg-3   mb-3 mb-lg-0">
              <div class="card">
                <img class="card-img-top h-100" src="images/peliculas1.jpg" alt="Proyecto 4">
                <div class="card-body">
                  <h5 class="card-title">Pelicula 4</h5>
                  <p class="card-text">
                  Descripcion de la pelicula</p>
                  <a href="#" class="btn btn-primary">Reservar en desarollo</a>
                </div>
              </div>
              <br>
            </article>
    </div>
  </div>
</section>
<?php
include 'footer.php';
?>

