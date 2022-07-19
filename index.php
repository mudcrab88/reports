<?php
require 'vendor/autoload.php';

$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
// Устанавливаем информацию о документе
$pdf->SetTitle('Отчет о продажах автомобилей');
// Устанавливаем верхний и нижний колонтитулы
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
// Устанавливаем моноширинный шрифт по умолчанию
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
// Устанавливаем отступы
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
// Устанавливаем автоматические разрывы страниц
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
// Устанавливаем шрифт
$pdf->SetFont('dejavusans', '', 14, '', true);
// Добавляем страницу
$pdf->AddPage();
// Устанавливаем текст
$html = <<<EOD
<h1>Отчет о продажах автомобилей</h1>
EOD;
// Выводим текст с помощью writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
// Закрываем и выводим PDF документ
$pdf->Output('/home/mudcrab/projects/php/reports/document.pdf', 'F');