<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="Alumnos.js"></script>
</head>

<body class="container">
    


    <!-- FORMULARIO-->
    <form action="" method="post">
    <div id="contenido">

    
        <br><br>
        <hr>

        <div class="row">
    
            <div class="col">
                <div class="form-group row justify-content-center">
                    <div class="col-md-8  col-12">
                            <h3 class="text-center">Registrar  Alumno</h3>


                            <label for="">Nombre(s)</label>
                            <input type="text"
                            class="form-control name=" id="nombre" aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted">Help text</small>   

                  
                        </div>
                        
                    </div>

                    <div class="form-group row justify-content-center">
                        <div class="col-4">
                            <label for="">Apellido Paterno</label>
                            <input type="text"
                              class="form-control" name="" id="apellidoPaterno" aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted">Help text</small>

                        </div>

                        <div class="col-4"> 
                            <label for="">Apellido Materno</label>
                            <input type="text"
                              class="form-control" name="" id="apellidoMaterno" aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted">Help text</small>

                            
                        </div>
                                  
                        <div class="col-6">
                                  
                        <label for="">Matricula</label>
                            <input type="text"
                            class="form-control name=" id="matricula" aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted">Help text</small>   

                        </div>
                    </div>

                    <!-- PHP CONSULTA DIVISION ACADEMICA-->
                







                    <!-- ------------------------------------ -->
                    <div class="form-group row  justify-content-center">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Division Academica</label>
                                        <select class="form-control" name="division_academica" id="division_academica">

                                        </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Carrera</label>
                                        <select class="form-control" name="carrera" id="carrera">

                                        </select>
                                </div>
                            </div>

                            <div class="col-8">
                                <div class="form-group">
                                    <label for="">Grupo</label>
                                        <select class="form-control" name="Grupo" id="Grupo">

                                        </select>
                                </div>
                            </div>


                            
                    </div>

                    




                    <div class="w-100"></div>
                    <div class="form-group row justify-content-center">
                        <div class="col-5">
                        <a onclick="insertarAlumno()" ><div class=" btn-lg btn-success  text-center" >Registrar</div></a>
                        </div>
                    </div>
                    


                </div>
       
            </div>

            



    </div>
    </form>
  
</body>


</html>     