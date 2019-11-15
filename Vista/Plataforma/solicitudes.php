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

<script type="text/javascript" src="solicitudes.js"></script>
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
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Seleccionar El estatus</label>
                                        <select class="form-control"  id="estatus">

                                        </select>
                                </div>
                            </div>

                </div>


        




                            
        </div>


                
                     <?php $fecha=date('m-d-y');
                     //echo $fecha
                     //echo var_dump($_GET);
                     ?>   
                    
                    

    </div>
    
    <div class="col" id="tabla">
    </div>
    </div>
    

    
    </form>
  
</body>


</html>     