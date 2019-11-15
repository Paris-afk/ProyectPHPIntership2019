<?php
 $tema= $_GET['tema'];
$Profesor= $_GET['Profesor'];
$carrera=$_GET['carrera'];
$grupo=$_GET['grupo'];
$ciclos=$_GET['ciclos'];
$duracion=$_GET['duracion'];
$tutor=$_GET['Tutor'];
$divisionAcademica=$_GET['divisionAcademica'];
$turno =$_GET['Vturno'];
$tsu=$_GET['Vtsu'];

$fecha=date('d-m-y');
$asesoria=$_GET['Vasesoria'];

/* LA DURACION , EL TEMA Y LOS BOTONES VIENEN COMO VARCHAR
NO COMO ID*/

require('fpdf.php');

require '../db/conexion.php';
//-------CONSULTA PARA TRAER LISTA DE ALUMNOS
$consulta = "SELECT * FROM alumnos WHERE CVE_GRUPO = $grupo ";
$resultado= $conn->query($consulta);

//CONSULTA PARA TRAER NOMBRE DEL CUATRI Y GRUPO
$consultaGrupo = "SELECT * FROM grupos WHERE CVE_GRUPO =$grupo";
$resultadoG=$conn->query($consultaGrupo);
$nombreGrupo=$resultadoG->fetch_assoc();
$elname=$nombreGrupo['NOMBRE'];

//CONSULTA PARA TRAER EL NOMBRE DEL ASESOR(PROFESOR)
$consultaAsesor="SELECT * FROM profesores WHERE CVE_ASESOR=$Profesor";
$resultadoProfesor=$conn->query($consultaAsesor);
$arrayProfesor =$resultadoProfesor->fetch_assoc();
$nombreProfesor=$arrayProfesor['NOMBRE'];

//CONSULTA PARA TRAER EL TUTOR
$consultaTutor="SELECT * FROM profesores WHERE CVE_ASESOR=$tutor";
$resultadoTutor=$conn->query($consultaTutor);
$arrayTutor =$resultadoTutor->fetch_assoc();
$nombreTutor=$arrayTutor['NOMBRE'];

//CONSULTA PARA TRAER NOMBRE DE LA DIVISION ACADEMICA
$consultaDivisionAcademica="SELECT * FROM divisionacademica WHERE CVE_DIVA=$divisionAcademica";
$resultadoDivision=$conn->query($consultaDivisionAcademica);
$arrayDivision=$resultadoDivision->fetch_assoc();
$nombreDivision=$arrayDivision['NOMBRE'];

//CONSULTA PARA TRAER NOMBRE DEL PROGRAMA
$consultaPrograma="SELECT * FROM programafolio WHERE CVE_PROGRAMA=$carrera";
$resultadoCarrera=$conn->query($consultaPrograma);
$arrayCarrera=$resultadoCarrera->fetch_assoc();
$nombreCarrera=$arrayCarrera['NOMBRE'];

//CONSULTA PARA TRAER NOMBRE DE PERIODO
$consultaPeriodo ="SELECT * FROM ciclos WHERE CVE_CICLOS = $ciclos";
$resultadoCiclos= $conn->query($consultaPeriodo);
$arrayCiclos=$resultadoCiclos->fetch_assoc();
$nombreCiclo=$arrayCiclos['NOMBRE'];

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
  //  $GLOBALS['tema'];
    // Logo
    $this->Image('../img/utlogo.png',10,8,20);
    // Arial bold 15
    $this->SetFont('Arial','B',10);
    //arial , negrita , tamaño
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,5,utf8_decode('UNIVERSIDAD TECNOLÓGICA DE TABASCO'),0,1,'C');
    $this->Cell(185,5,utf8_decode('SECRETARÍA ACADÉMICA'),0,1,'C');
    $this->Cell(185,5,utf8_decode('ASESORIAS ACADÉMICAS'),0,0,'C');
    $this->Cell(-20,20,$GLOBALS[utf8_decode('nombreCiclo')],0,1,'C');
    $this->Cell(10,20,utf8_decode('DIVISIÓN ACADÉMICA : '),0,0);
    $this->Cell(200,20,$GLOBALS[utf8_decode('nombreDivision')],0,1,'C');//aqui va el dato de la division academica
    //$this->Cell(10,20,utf8_decode(' ENERO-ABRIL'),0,1,'C');
    $this->Cell(10,1,utf8_decode('PROGRAMA EDUCATIVO : '),0,1);
    $this->Cell(180,10,$GLOBALS[utf8_decode('nombreCarrera')],0,1,'C');// datos sobre el programa educativo
    $this->Cell(20,10,utf8_decode('ASESOR : '),0,0,'C');
    $this->Cell(55,10,utf8_decode($GLOBALS['nombreProfesor']),0,0,'C');//aqui va el dato del Profesor
    $this->Cell(70,10,utf8_decode('TUTOR DE GRUPO : '),0,0,'C');
    $this->Cell(10,10,utf8_decode($GLOBALS['nombreTutor']),0,0,'C');//aqui va el dato del Tutor
    //si se cambia el uno por 0 indica que no habrá borde
    //ancho de la celda del rectangulo ,alto,mensaje
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creación del objeto de la clase heredada



$pdf = new PDF();
$pdf->AliasNbPages();//para añadir el numero de paginas
$pdf->AddPage();
$pdf->SetFont('Times','',8);


//primero se pone el ancho de la celda ancho de 90
//luego alto de 10
//luego se imprime el texto
//borde = 1
//0 que no tenga salto de linea o se pone 1 para que brinque a la siguiente linea
// justificacion "C"
//despues un 0 para que no tenga relleno


$pdf->Cell(40,10,'Alumno',1,0,'C',0);
$pdf->Cell(10,10,'Grupo',1,0,'C',0);
$pdf->Cell(10,10,'Turno',1,0,'C',0);
$pdf->Cell(12,10,'Nivel',1,0,'C',0);
$pdf->Cell(20,10,'Materia o Tema',1,0,'C',0);
$pdf->Cell(20,10,'Fecha',1,0,'C',0);
$pdf->Cell(10,10,'Duracion',1,0,'C',0);
$pdf->Cell(30,10,'Firma',1,0,'C',0);
$pdf->Cell(40,10,'Tipo de Asesoria',1,1,'C',0);
while($row = $resultado->fetch_assoc()){
    $pdf->Cell(40,10,$row['NOMBRE'],1,0,'C',0);
    $pdf->Cell(10,10,$elname,1,0,'C',0);
    $pdf->Cell(10,10,$turno,1,0,'C',0);
    $pdf->Cell(12,10,$tsu,1,0,'C',0);
    $pdf->Cell(20,10,$tema,1,0,'C',0);
    $pdf->Cell(20,10,$fecha,1,0,'C',0);
    $pdf->Cell(10,10,$duracion,1,0,'C',0);
    $pdf->Cell(30,10,'',1,0,'C',0);
    $pdf->Cell(40,10,$asesoria,1,1,'C',0);
}

/*for($i=1;$i<=40;$i++)
    $pdf->Cell(0,10,utf8_decode('Imprimiendo línea número ').$i,0,1);
*/
$pdf->Output();
?>
