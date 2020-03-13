<?php
class Conexion{
    public static function conectar(){
        $variables = new Variables();
        return  mysqli_connect($variables->host,$variables->user,$variables->password,$variables->baseDeDatos);
    }
}