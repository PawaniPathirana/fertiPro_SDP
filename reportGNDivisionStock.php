<?php
require_once('tcpdf/tcpdf.php');

$report = $_GET["report"];

$pdf = new TCPDF();
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "Agrarian Service Center Srawasthipura\nFertilizer Distribution Program 2023", "0251234567", array(0, 64, 255), array(0, 64, 128));
$pdf->setFooterData(array(0, 64, 0), array(0, 64, 128), "0251234567");

$pdf->AddPage();
$pdf->SetFont("times", "", 12);

// Generate the report content as HTML with proper formatting
$html = '<h1>Stock Review!</h1>'
      . '<pre>'
      . $report
      . '</pre>';

// Add the HTML content to the PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Output the PDF content
$pdf_content = $pdf->Output("", "S");

$filename = "report.pdf";
$filesize = strlen($pdf_content);

// Output the PDF for download
header("Content-Type: application/pdf");
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Length: $filesize");
echo $pdf_content;
exit;
?>
