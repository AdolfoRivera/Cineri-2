<!doctype HTML>
<html lang="es">
<head>  
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" type="image/x-icon" href="images/logocine.jpg">
  <!-- FUENTES DE GOOGLE FONT -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i" rel="stylesheet">
  <!-- ARCHIVOS CSS BOOTSTRAP 4 -->
  <link type="text/css" rel="stylesheet" href="css_neri/bootstrap.min.css">
  
  <!-- ARCHIVOS CSS PERSONALIZADOS -->
  <link type="text/css" rel="stylesheet" href="css_neri/estilos.css">
  <link type="text/css" rel = "stylesheet" href="css/estilo2.css">
  <title>Cineri</title>

  <!--ESTILOS PARA LA PESTAÑA NOSOTROS-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700i" rel="stylesheet">
  <!--FIN DE ESTILOS PARA LA PESTAÑA NOSOTROS-->

  <!-- SECCION NAVEGACIÓN-->
  <nav class="navbar navbar-dark bg-dark navbar-expand-md fixed-top">
    <div class="container">    
     
    <div class="btn btn-primary btn-md">
      <a style="color:white" href="index.php" class="label label-primary">
        <strong >Cineri</strong>
      </a>
    </div>
   
      <button type="button" class="navbar-toggler" data-toggle="collapse"
      data-target="#menu-principal" aria-controls="menu-principal" aria-expanded="false"
      aria-label="Desplegar menú de navegación">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="menu-principal" >
      <ul class="navbar-nav ml-auto" >
        <?php
        if(isset($_SESSION["idcliente"])){    ?>
        

        <div class="dropdown">
        <button class="btn btn-primary btn-md dropdown-toggle" type="button" data-toggle="dropdown"><?php echo $_SESSION["Nombre"] ." ". $_SESSION["Apellidos"]; ?>
        <span class="caret"></span></button>
        <ul class="dropdown-menu">
        <?php if($_SESSION["Nombre"] == "Administrador"){ ?>
          <li class="nav-item"><a href="panel.php">Panel De Control<a/></li>
        <?php } ?>
        <li class="nav-item"><a href="perfil.php" >Perfil</a></li>
        <li class="nav-item"><a href="salir.php" >Salir</a></li>
        </ul>
        </div>
          <li class="nav-item"><a href="#" class="btn btn-primary btn-md"> Proximos Estrenos</a></li>
          <li class= "nav-item"><a href="promos_nuevo.php" class="btn btn-primary btn-md">Promociones<a></li>
          <?php
        }else{ 
          ?>
          <li class="nav-item"><a href="logear.php" class="btn btn-primary btn-md"> Iniciar Sesion  </a></li>
          <li class="nav-item"><a href="registro.php" class="btn btn-primary btn-md"> Registrar  </a></li>
          <li class="nav-item"><a href="#" class="btn btn-primary btn-md"> Proximos Estrenos </a></li>
          <li class= "nav-item"><a href="promos_nuevo.php" class="btn btn-primary btn-md">Promociones<a></li>
          <li class= "nav-item"><a href="Nosotros.php" class="btn btn-primary btn-md">Nosotros<a></li>
          
          <?php
        }
        ?>
      </ul>
    </div>
  </div>
</nav>