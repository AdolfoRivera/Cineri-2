<?php

require_once 'conexion.php';

class Sesion extends Conexion {

    private $login;

    public function __construct() {
        $this->mysqli = parent::conectar();
        $this->login = array();
    }
    //****************************************
    // loguea al usuario
    //****************************************
    public function logueo() {
        $pass = sha1($_POST["password"]);
        $correo = $_POST["correo"];

        //$resultado = $this->mysqli->query("SELECT id, nombre from cliente where nick = '$usuario' and password = '$pass'");
        $resultado = $this->mysqli->query("SELECT idcliente, Nombre from cliente where Correo = '$correo' and Contraseña = '$pass'");

        while ( $fila = $resultado->fetch_assoc() ) {
            $this->login[] = $fila;
        }

        if (sizeof($this->login) > 0) {
            foreach ($this->login as $key) {
                $_SESSION["idcliente"] = $key["idcliente"];
                $_SESSION["Nombre"] = $key["Nombre"];
                if($_SESSION["idcliente"]==1){
                    header("Location: panel.php");
                }else{
                    header("Location: index.php");
                }
                /*$_SESSION["tipo"] = $key["tipo"];
                switch ($_SESSION["tipo"]) {
                    case 1: header("Location: panel.php");
                    break;
                    case 2: header("Location: indice.php");
                    break;
                }*/
            }
        } else {
            header("Location: index.php?m=1");
        }
    }

}