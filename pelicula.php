<?php
require_once 'class/usuarios.php';
require_once 'class/peliculas.php';

$peli = new peliculas();
include 'header.php';
?>

<div class="container-fluid" id="main-content">
        <div class="container">
            <div class="row" style="padding: 10%;">
                <?php
                    $datos = $peli->MostrarPelicula($_GET["id"]);
                    foreach($datos as $i){
                        $datos["Nombre"] = $i["Nombre"];
                        $datos["Director"] = $i["Director"];
                        $datos["Año"]=$i["Año"];
                        $datos["Clasificacion"]=$i["Clasificacion"];
                        $datos["pais"]=$i["pais"];
                        $datos["Genero"]=$i["Genero"];
                        $datos["Sinposis"]=$i["Sinposis"];
                        $datos["Duracion"]=$i["Duracion"];
                        $datos["Actores"]=$i["Actores"];
                        $datos["enlace"]=$i["enlace"];
                    }
                ?>
                <div class="col-12 col-md-6 col-lg-3 mb-3 mb-lg-0">
                    <img class="card-img-top h-100" src=<?php echo $_GET["url"]; ?> alt="Imagen de pelicula">
                </div>
                <div class="col-12 col-md-6 col-lg-3 mb-3 mb-lg-0">
                    <h3 class="label label-default"><?php echo $i["Nombre"]; ?> </h3>
                    <label class="label label-default">Actores: <?php echo $i["Actores"]; ?>  </label>
                    <label class="label label-default">Director: <?php echo $i["Director"]; ?> </label>
                    <label class="label label-default">Pais: <?php echo $i["pais"]; ?> </label>
                    <label class="label label-default">Año: <?php echo $i["Año"]; ?> </label>
                    <label class="label label-default">Clasificación:  <?php echo $i["Clasificacion"]; ?></label>
                    <label class="label label-default">Duración: <?php echo $i["Duracion"]; ?> minutos</label>
                    <label class="label label-default">Género: <?php echo $i["Genero"]; ?><label>
                </div>
            </div>
            <div class="row" style="margin-left: 10%;">
                <div class="container">
                    <ul class="nav nav-tabs"> 
                        <li class="nav-item"> 
                            <a class="nav-link active" href="#trailer">Trailer</a>
                        </li>
                        <li class="nav-item"> 
                            <a class="nav-link" href="#sinopsis">Sinopsis</a>
                        </li>
                    </ul>
                    
                    <div class="tab-content"> 
                    <div  id="trailer" class ="tab-pane container active"> 
                    <iframe width="760" height="360" src="<?php echo $i["enlace"]?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
                    </iframe>
                    </div>

                    <div id="sinopsis" class ="tab-pane container fade" > 
                        <p> <?php echo $i["Sinposis"] ?> </p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

<?php
include 'footer.php';
?>