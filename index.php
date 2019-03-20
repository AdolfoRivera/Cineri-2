<?php
require_once 'class/usuarios.php';
require_once 'class/peliculas.php';

$peli = new peliculas();
include 'header.php';
?>

<style>
  
* {box-sizing: border-box;}
body {
  font-family: Verdana, sans-serif;
  background:white;
  background-repeat: no-repeat;
 background-image: url('https://s3.amazonaws.com/statics3.cinemex.com/uploads/cms/bgs/bg-1920.jpg?1552651803');
 
}
.mySlides {
  display: none;

}
img {
  vertical-align: middle;
  width:100%;
  height:250PX;
  
}


/* Slideshow container */
.slideshow-container {
  max-width: 60%;
  
  position: relative;
  margin: auto;
}

/* Caption text s*/
/*.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}*/

/* Number text (1/3 etc) */
/*.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}*/

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 10.8s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 9.5s;
  animation-name: fade;
  animation-duration: 9.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
  </style>
</head>
<body>
<!--SLIDER  XD-->
<BR>
<HR>
  <div>
    <div class="slideshow-container">

      <div class="mySlides fade">
       <!-- <div class="numbertext">1 / 3</div>-->
        <img src="img/promo1.jpg" style="width:100% ">
        <!--<div class="text">Caption Text</div>-->
      </div>
      
      <div class="mySlides fade">
        <!--<div class="numbertext">2 / 3</div>-->
        <img src="img/promo2.jpg" style="width:100% ">
       <!-- <div class="text">Caption Two</div>-->
      </div>
      
      <!--<div class="mySlides fade">-->
       <!-- <div class="numbertext">3 / 3</div>-->
        <!--<img src="img/promocion4.jpg" style="width:90%">-->
       <!-- <div class="text">Caption Three</div>-->
      <!--</div>-->
      
      </div>
      <br>
      
      <div style="text-align:center">
        <span class="dot"></span> 
        <span class="dot"></span> 
        <span class="dot"></span> 
      </div>
      <script src="js/funciones">
      showSlides()
      </script>
      </div>

<!--<section class="filosofia py-4 bg-primary text-center text-white">

  <div class="container">
    <div class="row">
      <div class="col-12">
        <img src="images/logocine.jpg" width="auto" height="auto" alt="Avatar de Tomas Mendez" class="img-fluid rounded-circle mb-4">
       <!--<p class="h2"></p>
        <p class="h4 font-italic">-</p> 
      </div>
    </div>
  </div>
</section>-->

<!-- SECCION PROYECTOS -->
<section class="proyectos py-4">
  <div class="container">
    <h1 class="display-4 font-weight-bold text-center pb-4"><strong>Cartelera</strong></h1>
    <div class="row text-md-center">  
      <?php
      $datos = $peli->ListarPeliulas();
      foreach($datos as $i){
          $datos["idPeliculas"] =$i["idPeliculas"];
          $datos["Nombre"] = $i["Nombre"];
          $datos["Archivo"] = $i["Archivo"];
      ?>
      <article class="col-12 col-md-6 col-lg-3 mb-3 mb-lg-0">
        <div class="card">
          <img class="card-img-top h-100" src=<?php echo $i["Archivo"];?> alt="Proyecto 1">
          <div class="card-body">
            <h5 class="card-title"><?php echo $i["Nombre"]; ?></h5>
            <a href="pelicula.php?id=<?php echo $i["idPeliculas"]."&url=".$i["Archivo"];?>" class="btn btn-primary">Consultar</a>
            
          </div>
          
        </div>
        <br>
        </article> 
        <?php }?>
       
    </div>
      
  </div>
</section>

<?php
include 'footer.php';
?>

