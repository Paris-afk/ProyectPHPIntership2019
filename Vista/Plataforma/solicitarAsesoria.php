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

<script type="text/javascript" src="solicitudAsesoria.js"></script>
<script type="text/javascript" src="plataforma.js"></script>


</head>
<body class="container">
    
    <!--id del usuario que inició sesion -->
    <?php $id=$_GET['id']?>


    <!-- FORMULARIO-->
    <form action="" method="post">
    <div id="contenido">
    <div class="row">
        <div class="col">
            <div class="form-group row  justify-content-center">
                            <div class="col-12  col-md-4">
                                <div class="form-group">
                                    <label for="">Division Academica</label>
                                        <select class="form-control" name="division_academica" id="division_academica">

                                        </select>
                                </div>
                            </div>
                            <div class="col-12  col-md-4">
                                <div class="form-group">
                                    <label for="">Carrera</label>
                                        <select class="form-control" name="carrera" id="carrera">

                                        </select>
                                </div>
                            </div>




                            
                </div>

                <div class="form-group row justify-content-center">
                    <div class="col-12  col-lg-4">
                                    <div class="form-group">
                                        <label for="">Grupo</label>
                                            <select class="form-control" name="Grupo" id="Grupo">

                                            </select>
                                    </div>
                                </div>
                   

                    <div class="col-12  col-lg-4">
                        <div class="form-group">
                          <label for="">Fecha de la asesoria</label>
                          <input type="date"
                            class="form-control" name="" id="fechaFinalizacion" aria-describedby="helpId" placeholder="" >
                          <small id="helpId" class="form-text text-muted" >Una vez pasada la fecha de finalizacion , quedará registrado en asesorias completadas</small>
                        </div>
                    </div>

                    <div class="col-12  col-lg-4">
                        <div class="form-group">
                          <label for="">Hora de la  asesoria</label>
                          <input type="time"
                            class="form-control" name="" id="horaFinalizacion" aria-describedby="helpId" placeholder="">
                          <small id="helpId" class="form-text text-muted">Una vez pasada la fecha de finalizacion , quedará registrado en asesorias completadas</small>
                        </div>
                    </div>
                </div>
         </div>
        
        
    </div>

    <div class="row">
        <div class="col">
        <div class="form-group row  justify-content-center">
                            <div class="col-12  col-lg-4">
                                <div class="form-group">
                                    <label for="">Ciclo Academico</label>
                                        <select class="form-control" name="Ciclos" id="Ciclos">

                                        </select>
                                </div>
                            </div>
                            <div class="col-12  col-lg-4">
                                <div class="form-group">
                                    <label for="">Tema</label>
                                        <input type="text" class=" form-control" placeholder="ej.Matematicas"
                                        id="Tema">
                                </div>
                            </div>
                            <div class="col-12  col-lg-4">
                                <div class="form-group">
                                    <label for="">Duracion</label>
                                        <input type="text" class=" form-control"
                                        id="Duracion" placeholder="ej. 1h">
                                </div>
                            </div>
                            <!-- <div class="col-12  col-lg-4">
                                <div class="form-group">
                                    <label for="">Numero Alumnos</label>
                                        <input type="text" class=" form-control"
                                        id="numeroAlumnos" placeholder="ej. 1h">
                                </div>
                            </div> -->

                            <!-- <div class="col-12">
                                <div class="form-group">
                                    <label for="">Asesor</label>
                                        <select class="form-control" name="listaProfesor" id="listaProfesor">

                                        </select>
                                </div>
                            </div> -->

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Profesor</label>
                                        <select class="form-control" name="listaTutor" id="listaTutor">

                                        </select>
                                </div>

                                <div class="form-group">
                                  <label for="">Comentario</label>
                                  <textarea class="form-control" name="" id="comentario" rows="3"></textarea>
                                </div>
                            </div>



                            <div class="col-12">
                                        <div class="radio">
                                        
                                            <label for="">Turno:</label>
                                            <input  type="radio" name="turno" value="1" >Matutino
                                            <input type="radio" name="turno" value="0" >Vespertino
                                         </div>
                            </div>
                            <div class="col-12">
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
                        <a  onclick="generarSolicitud()"><div class=" btn-lg btn-success  text-center" >Seleccionar Alumnos</div></a>
                        </div>
                    </div>
                     <?php $fecha=date('y-m-d');
                     //echo $fecha
                    // echo var_dump($_GET);

                
                     ?>   

                     <input type="hidden" name="" id="Vfecha" value="<?php  echo $fecha?>">
                    
                    

        </div>
        </div>
    </div>

    </div>
    <!-- <input type="checkbox" name="" id="checkAll">Seleccionar Todo
     <div class="form-control" name="lista_alumnos" id="lista_alumnos">
     
     </div>  -->

     
    </form>
  
</body>


</html>     