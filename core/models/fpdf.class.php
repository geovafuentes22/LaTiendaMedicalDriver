<?php
require("../../libraries/fpdf/fpdf.php");

class PDF extends FPDF
{
//este es la funcion para el encabezado del pdf pues esta funcion esta vacia en la libreria
function Encabezado()
        {
            //se pone asi la variable ya que no se puede mandar en la funcion a menos que se cambie en el fpdf pero no la soca :)
            global $title;
    // Logo
    $this->Image('../../../resources/img/logo/MedicalDriverLogo.png',11,6,180,40);
   // Salto de línea
    $this->Ln(40);

        }
//se llama pooter por que hacia conflicto con la otra funcion de la template y este el footer de todo los pdf bien genial
function Pooter()
        {
            $this->SetY(-15);
            $this->SetFont('Arial','I', 15);
             // Color de fondo
            $this->SetFillColor(26,26,26);
            $this->SetTextColor(255,255,255);
            $this->Cell(0,10, 'Pagina '.$this->PageNo(),0,0,'C',true);
        }   
// bueno esta funcion es aparta pues lo que hace es que lo que se mande a la variable $label se va poner con fondo negro y letras blanca , centrado y por la otra parte es el autor del pdf y lo imprime debajo de este titulo
 function Enunciado($label,$author)
{
    // Arial 12
    $this->SetFont('Arial','',25);
    // Color de fondo
    $this->SetFillColor(26,26,26);
    $this->SetTextColor(255,255,255);
    // Título
    $this->Cell(0,16,"$label",0,1,'C',true);
    // Salto de línea
    $this->Ln(4);
    if(isset($author)){
     // Arial 12
    $this->SetFont('Arial','',15);
    $this->SetFillColor(232,232,232);
    // Color de fondo
    $this->SetTextColor(26,26,26);
    // Título
    $this->Cell(130,6,"Creado por el usuario :".$author,1,0,'L',1);
    // Fecha
    $this->Cell(60,6,date("d/m/Y")."/".date("H:i:s"),1,2,'L',1);
    }
}



}



?>