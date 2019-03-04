

<?php
include "header.php";
?>
<div class="foro">
<form onSubmit="return validar(this)" action="registrar.php" name="reg" method="post" class="formulario">
        <input type="text" placeholder="Nombre">
        <input type="text" placeholder="Apellido ">
        <input type="email" placeholder="Correo Electronico">
        <input type="password" placeholder="Contraseña">
        <button class="entrar" type="submit" name="iniciar" class="btn">Registrar</button>
    </form>
</div>
<?php
include "footer.php";
?>