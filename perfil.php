<?php
require_once 'class/usuarios.php';
require_once 'class/peliculas.php';

include 'header.php';
?>
    
    <div class="foro" >
        <form onSubmit="return validar(this)" action="registrar.php" name="reg" method="post" class="formulario">
                <a><img src="images/usuario.jpg" width="100px" height="100px" id="usu" margin-left=120px;></a>
                <input type="text" name="nombre"  pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" placeholder="Nombre" required="required">
                <input type="text" name="apellidos"  pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" placeholder="Apellidos " required="required">
                <input type="email" name="correo" placeholder="Correo Electronico" required="required">
                <input type="password" name="pass" placeholder="Contraseña" required="required">
                <button class="btn btn-danger" type="submit" name="iniciar" class="btn">Guardar</button>
            </form>
    </div>
    <?php
    include 'footer.php';
    ?>