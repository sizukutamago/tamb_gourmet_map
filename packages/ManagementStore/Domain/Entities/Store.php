<?php
declare(strict_types=1);

namespace ManagementStore\Domain\Entities;


class Store
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
