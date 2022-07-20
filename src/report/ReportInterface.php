<?php
declare(strict_types = 1);

namespace nnkuznetsov\reports\report;

interface ReportInterface
{
    public function saveToFile(string $filename): ?string;

    public function sendToMail(string $email): void;

    public function sendToFront(): void;
}