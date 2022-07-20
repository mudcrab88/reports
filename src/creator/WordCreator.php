<?php
declare(strict_types = 1);

namespace nnkuznetsov\reports\creator;

use nnkuznetsov\reports\data\ReportDataInterface;

class WordCreator implements CreatorInterface
{
    public function create(string $title, array $data): void
    {
        return;
    }

    public function save(string $filename): string
    {
        return '';
    }
}