<?php
require_once("./fpdf185/fpdf.php");
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('./photos/materialize-logo1111 (2).png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'Cyphers Hotels',0,0);
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'by Lutali David',0,0,'C');
}
}
if(isset($_POST['submit'])){
    if(isset($_GET['meal'])){
        $mealid = $_GET['meal'];
    
    $email=$_SESSION['email'];
    $stmt = $pdo->prepare("SELECT * FROM payment where payedBy='{$email}'");
    $stmt->execute();
    $PriceData=$stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($PriceData as $data):
        $mpesacode=$data['mpesacode'];
        $amount=$data['amount'];
    endforeach;
    $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt = $pdo->prepare("SELECT * FROM meal where meal_ID='{$mealid}'");
    $stmt->execute();
    $mealData=$stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($mealData as $data):
        $mealName=$data['name'];
        $mealPrice = $data['price'];
        $mealDescription = $data['description'];
    endforeach;
    $payments = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt = $pdo->prepare("SELECT * FROM user where email='{$email}'");
    $stmt->execute();
    $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($user as $data):
            $firstname= $data['firstname'];
            $lastname =$data['lastname'];
            $email = $data['email'];
    endforeach;
    $name = $firstname." ".$lastname;
    $pdf = new PDF();
    $pdf->AddPage();
    $pdf->SetFont("Arial","B",16);

    $pdf->Cell(50,10,"Email",1,0);
    $pdf->Cell(190,10,$email,1,1);
   

    
    $pdf->Cell(50,10,"Meal",1,0);
    $pdf->Cell(190,10,$mealName,1,1);
  

    $pdf->Cell(50,10,"Price",1,0);
    $pdf->Cell(190,10,"Ksh.".$amount,1,1);

    $pdf->Cell(50,10,"Reference Code",1,0);
    $pdf->Cell(190,10,$mpesacode,1,1);
   

    $pdf->Cell(50,10,"Description",1,0);
    $pdf->Cell(190,10,$mealDescription,1,1);


    $pdf->Output();

}
}
else{
   
}