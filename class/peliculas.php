<?php
require_once 'conexion.php';

class peliculas extends conexion{

    public $mysqli;
    public $data;

    public function __construct() {
        $this->mysqli = parent::conectar();
        $this->data = array();
    }

    public function ListarPeliulas(){
        $resultado = $this->mysqli->query("SELECT peliculas.idPeliculas, peliculas.Nombre, imagen.Archivo FROM peliculas INNER JOIN imagen ON peliculas.idPeliculas = imagen.idPeliculas;");

        while ( $fila = $resultado->fetch_assoc()) {
            $this->data[] = $fila;
        }
        $this->mysqli->close();
        return $this->data;
    }

    public function MostrarPelicula($id){
        $resultado = $this->mysqli->query("SELECT * FROM peliculas where idPeliculas = $id");

        while ( $fila = $resultado->fetch_assoc()) {
            $this->data[] = $fila;
        }
        $this->mysqli->close();
        return $this->data;
    }

    

    public function AgregarPeliculas(){
        parent::Conectar();

        $nombre = $_POST["nombre"];
        $director = $_POST["director"];
        $año = $_POST["año"];
        $clasificacion = $_POST["clasificacion"];
        $pais = $_POST["pais"];
        $genero = $_POST["genero"];
        $sinopsis = $_POST["sinopsis"];
        $duracion = $_POST["duracion"];
        $actores = $_POST["actores"];
        $enlace = $_POST["enlace"];
        

        $resultado = $this->mysqli->query("insert into peliculas(Director,Año,Clasificacion,pais,Genero,Sinposis,Nombre,Duracion,Actores,enlace) values('$director',$año,'$clasificacion','$pais','$genero','$sinopsis','$nombre','$duracion','$actores','$enlace');");
        
        
        if(!$resultado){

            echo $this->mysqli->error;
            /*echo "<script type='text/javascript'>
            window.alert('Error');
            </script>";*/
            header('panel.php');
        }else{
            echo "<script type='text/javascript'>
            window.alert('Agregado con exito');
            window.location='panel.php'
            </script>";
            
        }
        $this->mysqli->close();
    }

    public function Modificar(){

        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $director = $_POST["director"];
        $año = $_POST["año"];
        $clasificacion = $_POST["clasificacion"];
        $pais = $_POST["pais"];
        $genero = $_POST["genero"];
        $sinopsis = $_POST["sinopsis"];
        $duracion = $_POST["duracion"];
        $actores = $_POST["actores"];
        $enlace = $_POST["enlace"];

        $resultado = $this->mysqli->query("UPDATE peliculas SET Nombre='$nombre',Director ='$director',Año='$año',Clasificacion='$clasificacion', pais='$pais',Genero = '$genero',Sinposis='$sinopsis',Duracion = '$duracion',Actores='$actores',enlace='$enlace' where idPeliculas = $id");

        //$this->mysqli->close();
        if(!$resultado){

            echo $this->mysqli->error;
            /*echo "<script type='text/javascript'>
            window.alert('Error');
            </script>";*/
            header('panel.php');
        }else{
            echo "<script type='text/javascript'>
            window.alert('Modificado con exito');
            window.location='panel.php'
            </script>";
            
        }
    }

    public function eliminar(){
        $id = $_POST["id1"];
        $resultado = $this->mysqli->query("DELETE from funcion where idPeliculas=$id");
        $resultado = $this->mysqli->query("DELETE from imagen where idPeliculas=$id");
        $resultado = $this->mysqli->query("DELETE from peliculas WHERE idPeliculas=$id");

        if(!$resultado){
            echo $this->mysqli->error;
        }else{
            echo "<script type='text/javascript'>
            window.alert('Eliminado con exito');
            window.location='panel.php'
            </script>"; 
        }

    }

    public function llenarNombres(){
        $resultado =$this->mysqli->query("select idPeliculas,Nombre from peliculas");

        while ( $fila = $resultado->fetch_assoc()) {
            $this->data[] = $fila;
        }
        
        $this->mysqli->close();
        return $this->data;
    }

    public function RegresarIDPelicula(){
        $nombre = $_POST["peli"];
        $enlace = $_POST["enlace"];
        echo $nombre;
        $resultado = $this->mysqli->query("SELECT idPeliculas FROM peliculas WHERE nombre = '$nombre';");
        
        while ( $fila = $resultado->fetch_assoc()) {
            $id = $fila["idPeliculas"];
        }

        $this->mysqli->close();

        return $id;
    }

    public function InsertarLinkImagen(){
        //$id = RegresarIDPelicula();
        $id = $_POST["valor"];
        $enlace = $_POST["enlace"];

        $resultado = $this->mysqli->query("INSERT INTO imagen(idpeliculas,Archivo) VALUES($id,'$enlace');"); 
        
        if(!$resultado){

            echo $this->mysqli->error;
            $this->mysqli->close();
            /*echo "<script type='text/javascript'>
            window.alert('Error');
            </script>";*/
            header('panel.php');
        }else{
            $this->mysqli->close();
            echo "<script type='text/javascript'>
            window.alert('Agregado con exito');
            window.location='panel.php'
            </script>";
            
        }

    }

    public function horario($id){
        $resultado = $this->mysqli->query("select TIME_FORMAT(hora,'%H:%i') as hora from funcion where idPelicula=$id"); 

        while ( $fila = $resultado->fetch_assoc()) {
            $this->data[] = $fila;
        }
        
        $this->mysqli->close();
        return $this->data;

    }

    public function insertarHYS(){
        $id = $_POST["id1"];
        $horas = $_POST["hora"];
        $salas = $_POST["sala"];

        

        //$aux1 = array();
        //$aux2 = array();

        $aux1 = explode(",",$horas);
        $aux2 = explode(",",$salas);

        if(sizeof($aux1)==sizeof($aux2)){
            for($i=0;$i<sizeof($aux1);$i++){
                $resultado = $this->mysqli->query("insert into funcion(idPelicula,hora,sala) values($id,'$aux1[$i]','$aux2[$i]');");
            }

            if(!$resultado){
                echo $this->mysqli->error;
                $this->mysqli->close();
            }else{
                $this->mysqli->close();
                echo "<script type='text/javascript'>
                window.alert('Agregados con exito');
                window.location='panelFuncion.php'
                </script>";
            }
        }else{
            echo "<script type='text/jacascript'>
            windows.alert('El numero de salas no es igual numero de horarios');
            window.location='panelFuncion-php';
            </script>";
        }
        
    }
    
}
?>