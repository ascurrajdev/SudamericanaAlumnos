<?php
class AlumnosController
{
    public function formularios()
    {
        /*if(!isset($_FILES['archivo']) && !isset($_SESSION['archivo'])){
            $_SESSION['archivo']= "";
            echo '
            <div class="card">
                <div class="card-header">
                    Formulario
                </div>
                <div class="card-body">
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="form-label">Seleccione el archivo excel: </label>
                            <input type="file" class="form-control" name="archivo"/>
                        </div>
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    </form>
                </div>
            </div>
            ';
        }else if(isset($_FILES['archivo'])){
            move_uploaded_file($_FILES['archivo']['tmp_name'], $_FILES['archivo']['name']);
            $_SESSION['archivo'] = $_FILES['archivo']["name"];
        }
        
        if(!empty($_SESSION['archivo'])){
            //echo $_SESSION['archivo'];*/
            echo '
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                        Buscador de codigo de alumno
                        </div>
                        <div class="card-body">
                            <form method="POST" id="formulario" action="">
                                <h3>Filtrar por:</h3>
                                <div class="form-group">
                                    <div class="form-label"></div>
                                    <input type="number" name="id" placeholder="Introduzca el id del alumno" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <div class="form-label"></div>
                                    <input type="text" name="nombre" placeholder="Introduzca el nombre del alumno" class="form-control"/>
                                </div>
                                <button type="submit" class="btn btn-success">Buscar</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Nombre Alumno</th>
                                        <th>Email</th>
                                        <th>Contraseña</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    '.$this->procesarElExcelYTraerTodosLosRegistros().'
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
            ';
        //}
    }
    public function procesarElExcelYTraerTodosLosRegistros(){
        $resultado = '';
        $archivo = (new Variables)->excelDatos;
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load($archivo);
        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
        unset($sheetData[1]);
        if((isset($_POST['nombre']) && !empty($_POST['nombre']))){
            function filtrar($array){
                if(strpos(strtoupper($array["B"]),strtoupper($_POST['nombre']))!==false){
                    return $array;
                }
            }
                $cont = 0; 
                $arrayFiltrado = array_filter(
                    $sheetData,
                    "filtrar"
                );    
                foreach($arrayFiltrado as $item){
                            $resultado .= '<tr>';
                            $resultado .= '<th>'.$item["A"].'</th>';
                            $resultado .= '<td>'.$item["B"].'</td>';
                            $resultado .= '<td></td>';
                            $resultado .= '<td></td>';
                            $resultado .= '</tr>';
                        $cont++;
                }
            
            
            return $resultado;
        }else if((isset($_POST['id']) && !empty($_POST['id']))){
            function filtrar($array){
                if(strpos(strtoupper($array["A"]),$_POST['id'])!==false){
                    return $array;
                }
            }
                $cont = 0; 
                $arrayFiltrado = array_filter(
                    $sheetData,
                    "filtrar"
                );    
                foreach($arrayFiltrado as $item){
                        if($cont<1){
                            $resultado .= '<tr>';
                            $resultado .= '<th>'.$item["A"].'</th>';
                            $resultado .= '<td>'.$item["B"].'</td>';
                            $resultado .= '<td>'.$item["D"].'</td>';
                            $resultado .= '<td>'.$item["E"].'</td>';
                            $resultado .= '</tr>';
                        }
                        $cont++;
                }
            
            
            return $resultado;
        }else if((isset($_POST['nombre']) && !empty($_POST['nombre'])) && (isset($_POST['id']) && !empty($_POST['id']))){
            function filtrar($array){
                if(strpos(strtoupper($array["A"]),$_POST['id'])!==false){
                    if(strpos(strtoupper($array["B"]),strtoupper($_POST['nombre']))!==false){
                        return $array;
                    }
                }
            }
                $cont = 0; 
                $arrayFiltrado = array_filter(
                    $sheetData,
                    "filtrar"
                );    
                foreach($arrayFiltrado as $item){
                        if($cont<1){
                            $resultado .= '<tr>';
                            $resultado .= '<th>'.$item["A"].'</th>';
                            $resultado .= '<td>'.$item["B"].'</td>';
                            $resultado .= '<td>'.$item["D"].'</td>';
                            $resultado .= '<td>'.$item["E"].'</td>';
                            $resultado .= '</tr>';
                        }
                        $cont++;
                }
            
            
            return $resultado;
        }else{
            return '';
        }
    }
}

