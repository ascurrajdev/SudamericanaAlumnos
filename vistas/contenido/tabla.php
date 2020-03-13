<?php
    require "vistas/layouts/header.php";
?>
<div class="container-fluid">
    <?php (new AlumnosController())->formularios();?>
    <!--<div class="card">
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

    <div class="row">
        
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Formulario Alumnos
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <div class="form-label"></div>
                            <input type="text" name="buscar" id="alumnoBuscar" placeholder="Introduzca el nombre del alumno" class="form-control"/>
                        </div>
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
                            <tr>
                                <td>0001</td>
                                <td>Jose Ascurra</td>
                            </tr>
                            <tr>
                                <td>0001</td>
                                <td>Jose Ascurra</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        -->
</div>