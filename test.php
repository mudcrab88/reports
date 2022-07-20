<?php
require 'vendor/autoload.php';

use nnkuznetsov\reports\data\AutoSalesReportData;
use nnkuznetsov\reports\report\AutoSalesReport;
use nnkuznetsov\reports\creator\PdfCreator;

$array = [
    [
        'brand'          => 'Renault',
        'model'          => 'Duster',
        'vin'            => 'X7LBT53544LT26841',
        'engine_volume'  => 1.6,
        'power'          => 114,
        'gearbox_type'   => 'механика',
        'year_prod'      => 2020,
        'sale_date'      => '2022-07-14',
        'dealer'         => 'ООО Дилер'
    ],
    [
        'brand'          => 'Renault',
        'model'          => 'Logan',
        'vin'            => 'T7LBT53522LX32221',
        'engine_volume'  => 1.6,
        'power'          => 86,
        'gearbox_type'   => 'механика',
        'year_prod'      => 2014,
        'sale_date'      => '2022-07-15',
        'dealer'         => 'ООО Авто'
    ],

];

$dataArray = [];
foreach ($array as $item) {
    $auto = new AutoSalesReportData();
    $auto->fillDataFromArray($item);
    $dataArray[] = $auto;
}

$creator = new PdfCreator();
$reportPdf = new AutoSalesReport('Отчет о продажах автомобилей', $dataArray, $creator);
$reportPdf->create();
$reportPdf->saveToFile(__DIR__.'/report.pdf');
