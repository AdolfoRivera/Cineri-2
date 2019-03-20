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
        
        return $this->data;
    }

    public function MostrarPelicula($id){
        $resultado = $this->mysqli->query("SELECT * FROM peliculas where idPeliculas = $id");

        while ( $fila = $resultado->fetch_assoc()) {
            $this->data[] = $fila;
        }
        
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
    }

    public function llenarNombres(){
        $resultado =$this->mysqli->queery("select idPeliculas,Nombre from peliculas");

        while ( $fila = $resultado->fetch_assoc()) {
            $this->data[] = $fila;
        }
        
        return $this->data;
    }

    public function InsertarLinkImagen(){
        $id = $_POST["id"];
        $enlace = $_POST["link"];

        $resultado = $this->mysqli->query("INSERT INTO imagen(idpeliculas,Archivo) VALUES($id,'$enlace')"); 
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

    }
    
}
?>