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
        $pais = $_POST["pais"];
        $genero = $_POST["genero"];
        $sinopsis = $_POST["sinopsis"];
        $duracion = $_POST["duracion"];

        $resultado = $this->mysqli->query("INSERT INTO peliculas VALUES($director,$año,$clasificacion,$pais,$genero,$sinopsis,$nombre,$duracion,$actores,$enlace);");
        
        if($resultado){
            echo "<script type='text/javascript'>
            window.alert('Agregado con exito');
            </script>";
        }else{
            echo "<script type='text/javascript'>
            window.alert('Ha ocurrido un error');
            </script>";
        }
    }
    
}
?>