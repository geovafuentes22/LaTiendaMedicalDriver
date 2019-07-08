<?php
//los require necesario para que funcione
require_once("../../core/helpers/database.php");
require_once("../../core/helpers/validator.php");
require_once("../../core/models/productos.php");
require_once("../fpdf/fpdf.php");

//se instancia la variable como un nuevo pdf
 $pdf = new PDF('P', 'mm', 'Letter');
 //primero se instancia una variable para tomar las consultas sql
 $producto = new Productos();
//Empieza la magia de los feos reportes
//Estos son los margenes
$pdf->setMargins(10,10,10,10);
 //se le pone titulo tanto como la pestaña y al principio
     $title = 'Reporte de Productos';
     $pdf->SetTitle($title);
 //Se manda a llamar la pagina pdf donde va ser usada
     $pdf->AddPage();
  //luego le pongo magia y se pone con esta funcion como un enunciado con fondo negro
    $producto->listProducto();
    $producto->getId();
    
  //un salto de linea bien rico
     $pdf->Ln(10);
//Ahora viene lo mas paloma que es donde carga los datos directamente de la base de datos wowowowow
   //primero se quiere saber cuantas marcas hay y se hace la consuta de ellas y el count
     $nombre = $producto->getNombre();
     $precio = $producto->getPrecio();
 //se prepara un hermoso y super genial FOR para poder cargar los datos de una manera ultra genial
     for ($i=0; $i < $precio ; $i++) { 
       $producto->setNombre($precio[$i]['precio']);
       $pdf->Enunciado($precio[$i]['precio'],null);
       $pdf->Ln(5);
  //Luego aqui va cargar a todos los clientes gracias a la base de datos amen
    //son los titulos de la tabla asquerosa
    $pdf->SetFillColor(232,232,232);
    $pdf->SetFont('Arial','B',12);
    $pdf->SetTextColor(26,26,26);
    $pdf->SetX(15);
    $pdf->Cell(60,6,'Producto',1,0,'C',1);
    $pdf->Cell(60,6,'Precio',1,0,'C',1);
    $pdf->Cell(60,6,'Cantidad',1,1,'C',1);      
  //luego lo ultimo poner un foreach para que imprima los datos
    $data = $producto->getProducto();
    foreach($data as $row)
    {
        $pdf->SetX(15);
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(60,6,utf8_decode($row['nombreVestimenta']),1,0,'C');
        $pdf->Cell(60,6,$row['precioVestimenta'],1,0,'C');
        $pdf->Cell(60,6,$row['existenciaVestimenta'],1,1,'C');

    }
    $pdf->Ln(5);
     }
    //Ahora se imprime para que salga de un solo el pdf
    $pdf->Output();

?>