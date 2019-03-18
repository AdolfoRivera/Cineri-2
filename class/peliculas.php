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
}
?>