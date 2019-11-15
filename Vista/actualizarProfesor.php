


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
    <script type="text/javascript" src="confiProfesores.js"></script>
</head>

<body class="container">
    <div class="row">
        <div class="col">
            <div class="form-group">
              <label for=""></label>
              <input type="text"
                class="form-control" name="" id="nombre" aria-describedby="helpId" placeholder="">
              <small id="helpId" class="form-text text-muted">Help text</small>
            </div>
            <div class="form-group">
              <label for=""></label>
              <input type="text"
                class="form-control" name="" id="ApellidoP" aria-describedby="helpId" placeholder="">
              <small id="helpId" class="form-text text-muted">Help text</small>
            </div>
            <div class="form-group">
              <label for=""></label>
              <input type="text"
                class="form-control" name="" id="ApellidoM" aria-describedby="helpId" placeholder="">
              <small id="helpId" class="form-text text-muted">Help text</small>
            </div>

            <input type="hidden" name="id"value="" id="id" >

            <a name="" id="" class="btn btn-primary" onclick="actualizarProfesor()" >Actualizar</a>

            <a name="" id="" class="btn alert-danger" onclick="eliminarProfesor()" >Eliminar</a>
        </div>
    </div>
</body>
</html>