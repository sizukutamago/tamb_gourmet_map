<?php

declare(strict_types=1);

namespace ManagementStore\Infrastructures\Adapters;

use ManagementStore\Domain\Entities\Store;

class TabelogAdapter
{
    private string $url;

    private string $html;

    public function __construct(string $url)
    {
        $this->url = $url;
        $this->html = file_get_contents($this->url);
    }

    public function getStoreInfo(): Store
    {
        preg_match('{<h2 class="display-name">.*?<span>(.*?)</span>.*?</h2>}s', $this->html, $matches);
        return new Store(trim($matches[1]));
    }
}
