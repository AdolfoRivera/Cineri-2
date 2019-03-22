<?php
require_once 'class/usuarios.php';
require_once 'class/peliculas.php';

$peli = new peliculas();
$pelis = new peliculas();


include 'header.php';
?>

<div class="row" style="padding: 10%;">
    <div class="container">
        <ul class="nav nav-tabs"> 
            <li class="nav-item"> 
                <a class="nav-link active" data-toggle="tab" href="#agregar">Agregar</a>
            </li>
            <li class="nav-item"> 
                <a class="nav-link " data-toggle="tab" href="#modificar">Modificar</a>
            </li>
            <li class="nav-item"> 
                <a class="nav-link" data-toggle="tab" href="#eliminar">Eliminar</a>
            </li>
        </ul>
                    
        <div class="tab-content"> 
            <div  id="agregar" class ="tab-pane container active"> 
            <form onSubmit="return validar(this)" action="registrarPelicula.php" name="reg" method="post">
            <div class="form-group">
            <label name="nombre" for="nombre">Nombre de la pelicula:</label>
            <input type="text"  name="nombre" class="form-control" id="nombre" required="required">
            </div>
            <div class="form-group">
            <label name="director" for="director">Director:</label>
            <input type="text" name="director" name="director" class="form-control" id="director" required="required">
            </div>
            <div class="form-group">
            <label name="año" for="año">Año:</label>
            <input type="number" name="año" class="form-control" id="año" required="required">
            </div>
            <div class="form-group">
            <label name="clasificacion" for="clasificacion">Clasificación:</label>
            <input type="text" name="clasificacion" class="form-control" id="clasificacion" required="required">
            </div>
            <div class="form-group">
            <label name="pais" for="pais">País:</label>
            <input type="text" name="pais" class="form-control" id="pais" required="required">
            </div>
            <div class="form-group">
            <label name="genero" for="pais">Genero:</label>
            <input type="text" name="genero" class="form-control" id="pais" required="required">
            </div>
            <div class="form-group">
            <label name="sinopsis" for="sinopsis">Sinopsis:</label>
            <textarea class="form-control" name="sinopsis"  rows="10" cols="20" id="sinopsis" required="required"> </textarea>
            </div>
            <div class="form-group">
            <label name="duracion" for="duracion">Duración:</label>
            <input type="text" name="duracion" class="form-control" id="duracion" required="required">
            </div>
            <div class="form-group">
            <label name="actores" for="actores">Actores:</label>
            <input type="text" name="actores" class="form-control" id="actores" required="required">
            </div>
            <div class="form-group">
            <label name="enlace" for="duracion">Enlace de video:</label>
            <input type="text" name="enlace" class="form-control" id="enlace" required="required">
            </div>
            
            <button type="submit" class="btn btn-primary">Agregar</button>
            </form>
            <form onSubmit="return validar(this)" action="insertarImagen.php?>" name="reg" method="post">
            <div class="form-group">
            <label name="pelicula" for="peli">Seleccionar pelicula</label>
            <select class="form-control"  id="origen" name="di">
            <?php
            $datos = $peli->llenarNombres();
            foreach($datos as $i){ 
                $datos["idPeliculas"]=$i["idPeliculas"];
                $datos["Nombre"] = $i["Nombre"];
            ?>
            <option  value="<?php echo $i["idPeliculas"];?>"><?php echo $i["Nombre"];?></option>
            <?php }?>
            </select>
            </div>
            <div class="form-group">
            <label name="enlace" for="enlace">Link de la imagen:</label>
            <input type="text"  name="enlace" class="form-control" id="enlace" required="required">
            </div>
            <button type="submit" class="btn btn-primary">Agregar</button>
            </form>
            </div>

            <!-- Fin agregar -->
            <div id="modificar" class ="tab-pane container fade" > 
            <form > 
            <div class="form-group" > 
            <label name="pelicula" for="peli"> <strong>Seleccionar Pelicula</strong></label>
            <form action="#" method="post">
            <div id="destino" name="peli"> </div>  
            </form>
            <?php
                    $data = $pelis->MostrarPelicula(2);
                    foreach($data as $i){
                        $data["Nombre"] = $i["Nombre"];
                        $data["Director"] = $i["Director"];
                        $data["Año"]=$i["Año"];
                        $data["Clasificacion"]=$i["Clasificacion"];
                        $data["pais"]=$i["pais"];
                        $data["Genero"]=$i["Genero"];
                        $data["Sinposis"]=$i["Sinposis"];
                        $data["Duracion"]=$i["Duracion"];
                        $data["Actores"]=$i["Actores"];
                        $data["enlace"]=$i["enlace"];
                    }
                ?>


            <div class="form-group">
            <label name="nombre" for="nombre">Nombre de la pelicula:</label>
            <input type="text"  name="nombre" class="form-control" value="<?php echo $i["Nombre"]; ?>" id="nombre" required="required">
            </div>
            <div class="form-group">
            <label name="director" for="director">Director:</label>
            <input type="text" name="director" name="director" class="form-control" value="<?php echo $i["Director"];?>" id="director" required="required">
            </div>
            <div class="form-group">
            <label name="año" for="año">Año:</label>
            <input type="number" name="año" class="form-control" value="<?php echo $i["Año"]; ?>" id="año" required="required">
            </div>
            <div class="form-group">
            <label name="clasificacion" for="clasificacion">Clasificación:</label>
            <input type="text" name="clasificacion" class="form-control" value="<?php echo  $i["Clasificacion"];?>" id="clasificacion" required="required">
            </div>
            <div class="form-group">
            <label name="pais" for="pais">País:</label>
            <input type="text" name="pais" class="form-control" value="<?php echo $i["pais"]; ?>" id="pais" required="required">
            </div>
            <div class="form-group">
            <label name="genero" for="pais">Genero:</label>
            <input type="text" name="genero" class="form-control" value="<?php echo $i["Genero"]; ?>" id="genero" required="required">
            </div>
            <div class="form-group">
            <label name="sinopsis" for="sinopsis">Sinopsis:</label>
            <textarea class="form-control" name="sinopsis"  rows="10" cols="20" id="sinopsis" required="required"> <?php echo $i["Sinposis"];?></textarea>
            </div>
            <div class="form-group">
            <label name="duracion" for="duracion">Duración:</label>
            <input type="text" name="duracion" class="form-control" value="<?php  echo $i["Duracion"];?>" id="duracion" required="required">
            </div>
            <div class="form-group">
            <label name="actores" for="actores">Actores:</label>
            <input type="text" name="actores" class="form-control" value="<?php echo $i["Actores"]; ?>" id="actores" required="required">
            </div>
            <div class="form-group">
            <label name="enlace" for="duracion">Enlace de video:</label>
            <input type="text" name="enlace" class="form-control" value="<?php echo $i["enlace"]; ?>" id="enlace" required="required">
            </div>
            <button type="submit" class="btn btn-primary">Modificar</button>
            </form> 
            </div>
            </div>
            <div id="eliminar" class = "tab-pane container fade">
                <h1> Eliminar <h1>
            </div>
        </div>
    </div>
</div>


<?php
include 'footer.php';
?>