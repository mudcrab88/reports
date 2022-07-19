<?php
declare(strict_types = 1);

namespace nnkuznetsov\reports\creator;

use nnkuznetsov\reports\data\AutoSalesReportData;
use TCPDF;

class PdfCreator implements CreatorInterface
{
    protected TCPDF $pdf;

    public function __construct()
    {
        $this->pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
    }

    public function create(string $title, array $data): void
    {
        $this->setOptions($title);
        $html = $this->createHtml($title, $data);
        $this->pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
    }

    public function save(string $filename): ?string
    {
        return $this->pdf->Output($filename, 'F');
    }

    protected function setOptions(string $title): void
    {
        $this->pdf->SetTitle($title);
        $this->pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        $this->pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $this->pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        $this->pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);
        $this->pdf->SetFont('dejavusans', '', 14, '', true);
        $this->pdf->AddPage();
    }

    protected function createHtml(string $title, array $data): string
    {
        $html = "<h1>{$title}</h1>";

        $datetime = new \DateTimeImmutable();
        $html .= '<div><span style="text-align: right">'.$datetime->format('d-m-Y').'</span></div>';

        $html .= $this->createTable($data);

        return $html;
    }

    protected function createTable(array $data): string
    {
        $this->pdf->SetFont('dejavusans', '', 10, '', true);
        $table = '<table border="1">';

        $table .= '<tr>';
        $labels = AutoSalesReportData::labels();
        foreach ($labels as $key => $value) {
            $table .= '<th><b>';
            $table .= $value;
            $table .= '</b></th>';
        }
        $table .= '</tr>';

        foreach ($data as $item) {
            $table .= '<tr>';
            foreach ($labels as $key => $value) {
                $table .= '<td>';
                $table .= $item->$key;
                $table .= '</td>';
            }
            $table .= '</tr>';
        }

        $table .= '</table>';

        return $table;
    }
}