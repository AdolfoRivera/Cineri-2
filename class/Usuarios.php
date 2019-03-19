<?php

require_once 'conexion.php';

class Usuarios extends Conexion {

    public $mysqli;
    public $data;

    public function __construct() {
        $this->mysqli = parent::conectar();
        $this->data = array();
    }

    //*****************************************************************
    // LISTAMOS USUARIOS
    //*****************************************************************
    public function usuarios() {

        $resultado = $this->mysqli->query("SELECT * FROM usuarios");

        while ( $fila = $resultado->fetch_assoc() ) {
            $this->data[] = $fila;
        }
        
        return $this->data;
    }
    //*****************************************************************
    // TEMAS POR USUARIO USUARIOS
    //*****************************************************************
    public function usuariotemas($id) {

        $resultado = $this->mysqli->query("SELECT
            foro_temas.id_tema,
            foro_temas.id_foro,
            foro_temas.id_subforo,
            foro_temas.titulo,
            foro_temas.contenido,
            foro_temas.fecha,
            foro_temas.id_usuario,
            foro_temas.activo,
            foro_temas.hits
            FROM
            foro_temas
            WHERE
            foro_temas.id_usuario = $id");

        while ( $fila = $resultado->fetch_assoc() ) {
            $this->data[] = $fila;
        }
        
        return $this->data;
    }

    //*****************************************************************
    // USUARIO POR ID
    //*****************************************************************
    public function usuariosid($id) {
        $resultado = $this->mysqli->query("select * from usuarios where id = $id");

        while ( $fila = $resultado->fetch_assoc() ) {
            $this->data[] = $fila;
        }
        
        return $this->data;
    }

    //*****************************************************************
    // NUEVO USUARIO
    //*****************************************************************
    public function nuevousuario() {
        parent::Conectar();

        $pass = sha1($_POST["pass"]);
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos']; 
        $correo = $_POST['correo'];


        // VALIDAMOS SI EXISTE EL NICK
        $resultado = $this->mysqli->query("select correo from cliente where correo = '$correo'"); 

        $registros = $resultado->num_rows; 
        
        if ($registros == 0) {
            
            $resultado = $this->mysqli->query("insert into cliente(nombre,apellidos,correo,contraseña) values('$nombre','$apellidos','$correo','$pass');");
            
                // OBTENEMOS EL ULTIMO ID
            $id = $this->mysqli->insert_id;
            // creamos las sesiones para que automaticamente puedas comentar o publicar
            $_SESSION["idcliente"] = $id;
            $_SESSION["Nombre"];
            $_SESSION["Apellidos"];

            echo "<script type='text/javascript'>
            window.location='index.php';
            </script>";
        } else {
            /*echo "<script type='text/javascript'>
            window.location='registrarse.php?m=1';
            </script>";*/
            echo "Este usuario ya esta registrado";
        }
    }

    //*****************************************************************
    // LISTAMOS LOS TEMAS PAGINADOS DEL FORO
    //*****************************************************************
    public function update($id) {

        $nick = $_POST['nick'];
        $nombre = $_POST['nombre'];
        $apellidoP = $_POST['apellidoP'];
        $apellidoM = $_POST['apellidoM'];
        $correo = $_POST['correo'];
        $facebook = $_POST['facebook'];
        $twitter = $_POST['twitter'];
        $firma= $_POST['firma'];

        $resultado = $this->mysqli->query("UPDATE usuarios SET  nick = '$nick', nombre = '$nombre', apellidoP= '$apellidoP' , apellidoM = '$apellidoM', correo = '$correo', facebook = '$facebook', twitter = '$twitter', firma = '$firma' WHERE id = $id");
        echo "<script type='text/javascript'>
			window.location='perfil.php';
			</script>";
    }
	//*****************************************************************
    // ELIMINAR - DE UN USUARIO DESTRUYE TODA LA SESSION AL ELIMINARSE
    //*****************************************************************
	public function del($id, $dir) {
        $resultado = $this->mysqli->query("DELETE FROM usuarios WHERE id = $id");
        if($dir == 0){
            echo "<script type='text/javascript'>window.location='usuarios.php';</script>";
        }else{
            echo "<script type='text/javascript'>window.location='salir.php';</script>";
        }
    }
    //*****************************************************************
    // LISTAMOS LOS TEMAS PAGINADOS DEL FORO
    //*****************************************************************
    public function updateavatar($id) {
        parent::Conectar();
        $foto = str_replace(" ", "_", $_FILES["foto"]["name"]);
        copy($_FILES["foto"]["tmp_name"], "upload/" . $id . '_' . $foto);
        $imagen = $id . '_' . $foto;
        
        $resultado = $this->mysqli->query("UPDATE usuarios SET avatar = '$imagen' WHERE id = $id");
        // Cambaimos el tamañao de todos los avatares subidos
        include_once('class/thumb.php');
        $mythumb = new thumb();
        $mythumb->loadImage('upload/'.$imagen);
        $mythumb->resize(120, 'width');
        $mythumb->save('upload/'.$imagen, 100);
        
        
        echo "<script type='text/javascript'>
			window.location='perfil.php';
			</script>";
    }
}