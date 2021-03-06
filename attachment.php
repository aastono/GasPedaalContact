<?php

require("fpdf/fpdf.php");
require("PHPMailer/PHPMailerAutoload.php");


///var_dump(get_class_methods($pdf));


$name = $_POST['nameForPDF'];
$number = $_POST['numberForPDF'];
$time = $_POST['timeForPDF'];
$notes = $_POST['notesForPDF'];
$recipient = $_POST['recipient'];


class PDF extends FPDF
{

    function Header()
    {
        $this->Image('img/logo.jpg', 0.5, 0.5, 1.5, 1.5);
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(4.4);
        $this->Cell(4, 1, 'CONTACT INFO', 0, 0, 'C');
        $this->Ln(1);
    }

    function Footer()
    {
        $this->SetY(-6);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

$pdf = new PDF('L', 'cm', array(15, 10));
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', '', 12);
$pdf->Text(5, 3, "Name:   {$name}");
$pdf->Text(5, 4, "Phone Number:   {$number}");
$pdf->Text(5, 5, "Date of Call:   {$time}");
$pdf->Text(5, 6, "Notes:  {$notes}");

//$pdf->Output();


$email = new PHPMailer();
$email->isSMTP();
$email->SMTPAuth = true;
$email->SMTPDebug = 2;

$email->Host = 'smtp.gmail.com';
$email->Username = 'may14test@gmail.com';
$email->Password = 'iamcurrentlytesting';
$email->SMTPSecure = 'ssl';
$email->Port = 465;

$email->From = 'may14test@gmail.com';
$email->FromName = 'Aditya Astono';
$email->Subject = 'Contact Details';
$email->Body = 'Hi!';
$email->AddAddress($recipient);

$pdf->Output('ContactDetails.pdf', 'F');

$email->AddAttachment('ContactDetails.pdf', 'ContactDetails.pdf');

return $email->Send();


?>
