<?php
declare(strict_types = 1);

namespace nnkuznetsov\reports\creator;

use nnkuznetsov\reports\data\ReportDataInterface;

class ExcelCreator implements CreatorInterface
{
    public function create(string $title, array $data): void
    {
        return;
    }

    public function save(string $filename): string
    {
        return;
    }
}