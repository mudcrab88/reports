<?php
namespace nnkuznetsov\reports\data;

interface ReportDataInterface
{
    public function fillDataFromArray(array $data): void;

    public static function labels(): ?array;
}