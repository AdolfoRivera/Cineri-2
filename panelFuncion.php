<?php
require_once 'class/usuarios.php';
require_once 'class/peliculas.php';
$peli = new peliculas();
include 'header.php';
?>

<div class="row" style="padding: 10%;"> 
    <div class= "container">
        <h2> Asignación de horarios y salas para peliculas</h2>
        <form onSubmit="return validar(this)" action="registrarHYF.php" name="reg" method="post">
            <select class="form-control" id="selec" name="peli" onchange="return obtenerID();">
            <option>Seleccionar Pelicula </option>
            <?php 
                $data = $peli->llenarNombres();
                foreach($data as $i){?>
                <option  value="<?php echo $i["idPeliculas"];?>"><?php echo $i["Nombre"];?></option>
             <?php   }?>   
             </select>
            <div class="form-group">
            <label name="id1" for="id1">Identificador:</label>
            <input type="text"  readonly name="id1" class="form-control" value="" id="id" required="required">
            </div>
            <div class="form-group">
            <label id="c1">Hay 0 comas </label>
            <label name="nombre" for="hora">Horarios :</label>
            <input type="text"  name="hora" class="form-control" id="hora" required="required" placeholder="Separe las horas por coma" onkeyup="contar1()">
            </div>
            <div class="form-group">
            <label id="c2">Hay 0 comas</label>
            <label name="nombre" for="sala">Salas :</label>
            <input type="text"  name="sala" class="form-control" id="sala" required="required" placeholder="Separe las salas por coma" onkeyup="contar2()">
            </div>
            <button type="submit" class="btn btn-primary">Asignar </button>
        </form>
    </div>
</div>

<script type='text/javascript'>
            window.alert('Asegurese que cada hora tenga asignada una sala, utilice una coma para separar cada hora y cada sala');
</script>

<?php
include 'footer.php';
?>