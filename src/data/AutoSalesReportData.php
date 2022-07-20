<?php
namespace nnkuznetsov\reports\data;

class AutoSalesReportData implements ReportDataInterface
{
    public string $brand;
    public string $model;
    public string $vin;
    public float  $engine_volume;
    public int    $power;
    public string $gearbox_type;
    public int    $year_prod;
    public string $sale_date;
    public string $dealer;

    public function fillDataFromArray(array $data): void
    {
        foreach (self::labels() as $key => $value) {
            $this->$key = !empty($data[$key]) ? $data[$key] : null;
        }
    }

    public static function labels(): ?array
    {
        return [
            'brand'          => 'Марка',
            'model'          => 'Модель',
            'vin'            => 'VIN',
            'engine_volume'  => 'Объем двигателя',
            'power'          => 'Мощность двигателя',
            'gearbox_type'   => 'Коробка передач',
            'year_prod'      => 'Год выпуска',
            'sale_date'      => 'Дата продажи',
            'dealer'         => 'Дилер'
        ];
    }
}