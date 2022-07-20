<?php
require 'vendor/autoload.php';

use nnkuznetsov\reports\data\AutoSalesReportData;
use nnkuznetsov\reports\creator\PdfCreator;
use nnkuznetsov\reports\report\AutoSalesReport;

$db = new SQLite3('database/auto.db');

$results= $db->query("select brand, model, vin, engine_volume, power, gearbox_type, year_prod, sale_date, dealer from sales");

$array = [];
while ($res = $results->fetchArray(SQLITE3_ASSOC)){
    array_push($array, $res);
}

foreach ($array as $item) {
    $auto = new AutoSalesReportData();
    $auto->fillDataFromArray($item);
    $dataArray[] = $auto;
}

$creator = new PdfCreator();
$reportPdf = new AutoSalesReport('Отчет о продажах автомобилей', $dataArray, $creator);
$reportPdf->create();
echo $reportPdf->saveToFile(__DIR__.'/report_from_db.pdf');

