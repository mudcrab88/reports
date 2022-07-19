<?php
declare(strict_types = 1);

namespace nnkuznetsov\reports\creator;

interface CreatorInterface
{
    public function create(string $title, array $data): void;

    public function save(string $filename): ?string;
}