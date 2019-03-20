<?php
require_once 'class/usuarios.php';
require_once 'class/peliculas.php';

$peli = new peliculas();
include 'header.php';
?>

<div class="formulario" style="padding: 10%;">
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
</div>

<div class="formulario" style ="padding: 10%;margin-top: -11%;"> 
    <form onSubmit="return validar(this)" action="registrarImagen.php" name="reg" method="post">
    <div class="form-group">
    <label name="pelicula" for="peli">Seleccionar pelicula</label>
    <select name="peli">
    <option>En desarrollo</option>
    </select>
    </div>
    <div class="form-group">
    <label name="enlace" for="enlace">Link de la imagen:</label>
    <input type="text"  name="nombre" class="form-control" id="enlace" required="required">
    </div>
    <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
    </div>
<?php

include 'footer.php';

?>