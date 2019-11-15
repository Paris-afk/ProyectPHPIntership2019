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
<script type="text/javascript" src="contenido.js"></script>
<script type="text/javascript" src="reporte.js"></script>


</head>
<body class="container">
    

    <!-- NAV -->
    <div class="row">
        <div class="col-12">
        <nav class="navbar ">
            <!-- Nav tabs -->
           
            <ul class="nav nav-tabs" id=" ">
                <!-- <li class="nav-item">
                    <a  class="nav-link alert-primary ">Generar Reporte</a>
                </li> -->
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Profesores</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" onclick="registrarProfesor()">Registrar Profesores</a>

                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" onclick="configurarProfesores()">Configurar Profesores</a>



                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Alumnos</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" onclick="registrarAlumnos()">Registrar Alumnos</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" onclick="configurarAlumnos()">Configurar Alumnos</a>
                    </div>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Grupos</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" onclick="registrarGrupos()" >Registrar Grupos</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" onclick="configurarGrupos()">Configurar Grupos</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Consultas</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" onclick="consultaProfesores()" >Consulta por Profesores</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" onclick="consultaGrupos()">Consulta por Grupos</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" onclick="consultaAlumno()">Consulta por Alumno</a>
                    </div>
                </li>
   
                <li class="nav-item">
                    <a href="Prueba1.php" class="nav-link active ">Salir</a>
                </li>
            </ul>
            
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab1Id" role="tabpanel"></div>
                <div class="tab-pane fade" id="tab2Id" role="tabpanel"></div>
                <div class="tab-pane fade" id="tab3Id" role="tabpanel"></div>
                <div class="tab-pane fade" id="tab4Id" role="tabpanel"></div>
                <div class="tab-pane fade" id="tab5Id" role="tabpanel"></div>
            </div>
            

            </nav>
            
        </div>
        
    </div>

    <div id="contenido">

    </div>
    <!-- FORMULARIO-->
    <!-- <form action="" method="post">
    <div id="contenido">
    <div class="row">
        <div class="col">
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
        </div>
        
        
    </div>

    <div class="row">
        <div class="col">
        <div class="form-group row  justify-content-center">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Ciclo Academico</label>
                                        <select class="form-control" name="Ciclos" id="Ciclos">

                                        </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Tema</label>
                                        <input type="text" class=" form-control" placeholder="ej.Matematicas"
                                        id="Tema">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Duracion</label>
                                        <input type="text" class=" form-control"
                                        id="Duracion" placeholder="ej. 1h">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Asesor</label>
                                        <select class="form-control" name="listaProfesor" id="listaProfesor">

                                        </select>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Tutor</label>
                                        <select class="form-control" name="listaTutor" id="listaTutor">

                                        </select>
                                </div>
                            </div>
                            <div class="col-6">
                                        <div class="radio">
                                        
                                            <label for="">Turno:</label>
                                            <input type="radio" name="turno" value="1" >Matutino
                                            <input type="radio" name="turno" value="0" >Vespertino
                                         </div>
                            </div>
                            <div class="col-6">
                                        <div class="radio">
                                        
                                            <label for="">Nivel:</label>
                                            <input type="radio" name="tsu" value="1" >TSU
                                            <input type="radio" name="tsu" value="0" >Licenciatura
                                         </div>
                            </div>
                            <div class="col-12">
                                        <div class="radio">
                                        
                                            <label for="">Tipo de Asesoria:</label>
                                            <input type="radio" name="asesoria" value="1" >Dudas en temas
                                            <input type="radio" name="asesoria" value="0" >Proyecto o Prototipo
                                         </div>
                            </div>
                    
                    </div>
                    <div class="w-100"></div>
                    <div class="form-group row justify-content-center">
                        <div class="col-5">
                        <a  onclick="generarReporte()"><div class=" btn-lg btn-success  text-center" >Registrar</div></a>
                        </div>
                    </div>
                     <?php $fecha=date('m-d-y');
                     //echo $fecha?>   


                    </div>
        </div>
        </div>
    </div>

    </div>
    </form> -->
  
</body>


</html>     