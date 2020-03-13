<?php
class AlumnosController
{
    public function formularios()
    {
        if(!isset($_FILES['archivo']) && !isset($_SESSION['archivo'])){
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
            //echo $_SESSION['archivo'];
            echo '
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                        Buscador de codigo de alumno
                        </div>
                        <div class="card-body">
                            <form method="POST" action="">
                                <div class="form-group">
                                    <div class="form-label"></div>
                                    <input type="text" name="alumnoBuscar" id="alumnoBuscar" placeholder="Introduzca el nombre del alumno" class="form-control"/>
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
        }
    }
    public function procesarElExcelYTraerTodosLosRegistros(){
        $resultado = '';
        if(isset($_POST['alumnoBuscar'])){
            $archivo = $_SESSION['archivo'];
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            $reader->setReadDataOnly(true);
            $spreadsheet = $reader->load($archivo);
            $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
            unset($sheetData[1]);
            function filtrar($array){
                if(strpos(strtoupper($array["B"]),strtoupper($_POST['alumnoBuscar']))!==false){
                    return $array;
                }
            }
            $arrayFiltrado = array_filter(
                $sheetData,
                "filtrar"
            );
            foreach($arrayFiltrado as $item){
                $resultado .= '<tr>';
                $resultado .= '<td>'.$item["A"].'</td>';
                $resultado .= '<td>'.$item["B"].'</td>';
                $resultado .= '</tr>';
            }
            return $resultado;
        }else{
            $archivo = $_SESSION['archivo'];
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            $reader->setReadDataOnly(true);
            $spreadsheet = $reader->load($archivo);
            $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
            unset($sheetData[1]);
            foreach($sheetData as $item){
                $resultado .= '<tr>';
                $resultado .= '<td>'.$item["A"].'</td>';
                $resultado .= '<td>'.$item["B"].'</td>';
                $resultado .= '</tr>';
            }
            return $resultado;
            
        }
    }
}
