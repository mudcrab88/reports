<?php
declare(strict_types = 1);

namespace nnkuznetsov\reports\data;

interface ReportDataInterface
{
    public function fillDataFromArray(array $data): void;

    public static function labels(): ?array;
}