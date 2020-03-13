<?php 
class AlumnosModel{
    private $conexion;
    
    public function __construct(){
        $this->conexion = Conexion::conectar(); 
    }

    public function insertarAlumnos($arrayAlumnos){
        $cantidadDeAlumnos = sizeof($arrayAlumnos)-1;
        for($cont = 2; $cont < $cantidadDeAlumnos ; $cont++){
                $item = $arrayAlumnos[$cont];
                $insertadoSQL = "INSERT INTO alumnos values("."'".$item["A"]."'".","."'".$item["B"]."'".")";
                mysqli_query($this->conexion, $insertadoSQL);
        }
    }
}