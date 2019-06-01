<?php
require_once 'class/usuarios.php';
require_once 'class/peliculas.php';

include 'header.php';
$peli = new peliculas();

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

<div class="row" style="padding: 10%;">
<div class="container">

<div class="row">
        <div class="col-12 col-md-6 col-lg-3 mb-3 mb-lg-0" style="margin-right: 12%;">
        <div class="">
            <img class="card-img-top h-50" src=<?php echo $_GET["url"]; ?> alt="Imagen de pelicula">
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
        <div class="col-12 col-md-6 col-lg-3 mb-3 mb-lg-0">
        <h4> Seleccionar boletos </h4>
        <form class="">
        <div class="">
        <label>
        <span class="">Adulto</span>
        <span class="">|</span>
        <span class="">$52:00</span>
        </label>
        <input type="number" id="adulto" class="float-right" onClick="return CalcularBoletos()" value="0" max=10 min=0>
        </div class="">
        <div>
        <label>
        <span class="">Menor</span>
        <span class="">|</span>
        <span class="">$34:00</span>
        </label>
        <input type="number" id="menor" class="float-right" onClick="return CalcularBoletos()" value="0" max=10 min=0>
        </div>
        <div class="">
        <label >
        <span class="">Adulto Mayor</span>
        <span class="">|</span>
        <span class="">$45:00</span>
        </label>
        <input type="number"  id="mayor" class="float-right" onClick="return CalcularBoletos()" value="0" max=10 min=0>
        </div>
        <div>
        <label id="total"> <strong>Precio total de la compra:</strong> $0:00</label>
        <button class="btn btn-primary btn-md" type="submit" >Continuar</button>
        </form>
        </div>
        </div>
</div>
</div>
</div>
<?php
include 'footer.php';
?>