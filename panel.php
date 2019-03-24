<?php
require_once 'class/usuarios.php';
require_once 'class/peliculas.php';


$peli = new peliculas();
$pelis = new peliculas();
$pelic = new peliculas();


include 'header.php';
?>


<div class="row" style="padding: 10%;">
    <div class="container">
        <ul class="nav nav-tabs"> 
            <li class="nav-item"> 
                <a class="nav-link active" data-toggle="tab" href="#modificar">Modificar</a>
            </li>
            <li class="nav-item"> 
                <a class="nav-link " data-toggle="tab" href="#agregar">Agregar</a>
            </li>
            <li class="nav-item"> 
                <a class="nav-link" data-toggle="tab" href="#eliminar">Eliminar</a>
            </li>
        </ul>
                    
        <div class="tab-content"> 
            <div  id="agregar" class ="tab-pane container fade"> 
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
            <label name="valor" for="peli">Seleccionar pelicula</label>
            <select class="form-control"  id="peli" name="valor" >
            <?php
            $datos = $pelis->llenarNombres();
            foreach($datos as $i){ 
                $datos["idPeliculas"]=$i["idPeliculas"];
                $datos["Nombre"] = $i["Nombre"];
            ?>
            <option  name="id" value="<?php echo $i["idPeliculas"];?>"><?php echo $i["Nombre"];?></option>
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
            <div id="modificar" class ="tab-pane container active" > 
            <!--<label name="pelicula" for="peli"> <strong>Seleccionar Pelicula</strong></label>-->
            <select class="form-control" id="seleccion" name="peli" onchange="return Mostrar();">
            <option>Seleccionar Pelicula </option>
            <?php 
                $data = $peli->llenarNombres();
                foreach($data as $i){?>
                <option  value="<?php echo $i["idPeliculas"];?>"><?php echo $i["Nombre"];?></option>
             <?php   }?>   
             </select>
            <form onSubmit="return validar(this)" action="modificar.php" name="reg" method="post"> 
            
            <div class="form-group" > 
            
             <?php
                if(isset($_GET["id"])){
                    
                    $datos = $pelic->MostrarPelicula($_GET["id"]);
                    foreach($datos as $j){
                        $datos["idPeliculas"]= $j["idPeliculas"];
                        $datos["Nombre"] = $j["Nombre"];
                        $datos["Director"] = $j["Director"];
                        $datos["Año"]=$j["Año"];
                        $datos["Clasificacion"]=$j["Clasificacion"];
                        $datos["pais"]=$j["pais"];
                        $datos["Genero"]=$j["Genero"];
                        $datos["Sinposis"]=$j["Sinposis"];
                        $datos["Duracion"]=$j["Duracion"];
                        $datos["Actores"]=$j["Actores"];
                        $datos["enlace"]=$j["enlace"];
                    }
                
            ?>

            <div class="form-group">
            <label name="id" for="nombre">Identificador:</label>
            <input type="text"  readonly name="id" class="form-control" value="<?php echo $j["idPeliculas"]; ?>" id="id" required="required">
            </div>
            <div class="form-group">
            <label name="nombre" for="nombre">Nombre de la pelicula:</label>
            <input type="text"  name="nombre" class="form-control" value="<?php echo $j["Nombre"]; ?>" id="nombre" required="required">
            </div>
            <div class="form-group">
            <label name="director" for="director">Director:</label>
            <input type="text" name="director" name="director" class="form-control" value="<?php echo $j["Director"]; ?>" id="director" required="required">
            </div>
            <div class="form-group">
            <label name="año" for="año">Año:</label>
            <input type="number" name="año" class="form-control" value="<?php echo $j["Año"];?>" id="año" required="required">
            </div>
            <div class="form-group">
            <label name="clasificacion" for="clasificacion">Clasificación:</label>
            <input type="text" name="clasificacion" class="form-control" value="<?php echo $j["Clasificacion"];?>" id="clasificacion" required="required">
            </div>
            <div class="form-group">
            <label name="pais" for="pais">País:</label>
            <input type="text" name="pais" class="form-control" value="<?php echo $j["pais"];?>" id="pais" required="required">
            </div>
            <div class="form-group">
            <label name="genero" for="pais">Genero:</label>
            <input type="text" name="genero" class="form-control" value="<?php echo $j["Genero"];?>"  id="genero" required="required">
            </div>
            <div class="form-group">
            <label name="sinopsis" for="sinopsis">Sinopsis:</label>
            <textarea class="form-control" name="sinopsis"  rows="10" cols="20" id="sinopsis" required="required"><?php echo $j["Sinposis"];?> </textarea>
            </div>
            <div class="form-group">
            <label name="duracion" for="duracion">Duración:</label>
            <input type="text" name="duracion" class="form-control" value="<?php echo $j["Duracion"];?>" id="duracion" required="required">
            </div>
            <div class="form-group">
            <label name="actores" for="actores">Actores:</label>
            <input type="text" name="actores" class="form-control" value="<?php echo $j["Actores"];?>" id="actores" required="required">
            </div>
            <div class="form-group">
            <label name="enlace" for="duracion">Enlace de video:</label>
            <input type="text" name="enlace" class="form-control" value="<?php echo $j["enlace"];?>" id="enlace" required="required">
            </div>
            <button type="submit" class="btn btn-primary">Modificar</button>
            </form> 
            </div>
                <?php }?>
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