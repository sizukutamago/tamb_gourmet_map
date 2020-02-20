<?php

declare(strict_types=1);

namespace ManagementStore\Infrastructures\Adapters;

class TabelogAdapter
{
    private string $url;

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function getStoreInfo()
    {

    }
}
