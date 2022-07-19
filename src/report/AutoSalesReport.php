<?php
declare(strict_types = 1);

namespace nnkuznetsov\reports\report;

use nnkuznetsov\reports\data\ReportDataInterface;
use nnkuznetsov\reports\creator\CreatorInterface;

class AutoSalesReport implements ReportInterface
{
    protected string $title;
    protected array $data;
    protected CreatorInterface $creator;

    public function __construct(string $title, array $data, CreatorInterface $creator)
    {
        $this->title = $title;
        $this->data = $data;
        $this->creator = $creator;
    }

    public function create(): void
    {
        $this->creator->create($this->title, $this->data);
    }

    public function saveToFile(string $filename): ?string
    {
        return $this->creator->save($filename);
    }

    public function sendToMail(string $email): void
    {
        return;
    }

    public function sendToFront(): void
    {
        return;
    }
}