<?php

require_once 'class/usuarios.php';

include "header.php"


?>

<div class="caja">
    <div class="categorias">
        <h2>Inicio de usuarios</h2>
    </div>
    
    <?php
        //Esta parte nos permite mantener en la pagina de foro si la sesion esta abierta 
        if(isset($_SESSION["nombre"])){
            //echo '<script>href.location="indice.php"</script>';
            header('Location: index.php');
        }
        ?>

    
    <div class="foro">
        <form method="post" action="login.php">
        <h2>Iniciar sesión</h2>
        <input class="logeo" type="email" name="correo"  placeholder="Correo"  required autofocus >
        <!--<p style="size:8px; color:rgba(0,0,0,.3)"> solo letras y numeros </p>-->
        
        <br>
        <input class="logeo" type="password" name="password"  pattern="[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\s\-\_]+" placeholder="Contraseña" required>
        <!--<p style="size:8px; color:rgba(0,0,0,.3);"> solo letras, numeros y guiones</p>-->
        <br>
        <?php
        if (isset($_GET["m"])) {
            switch ($_GET["m"]) {
                case 1:
                    echo "<div id='msj'><h4>Usuario o contraseña no encontrado</h4></div>";
                    break;
            }
        }
        ?>
        <button class="btn btn-danger" type="submit">Ingresar</button>
      </form>

    </div>
</div>
<?php
include 'footer.php';