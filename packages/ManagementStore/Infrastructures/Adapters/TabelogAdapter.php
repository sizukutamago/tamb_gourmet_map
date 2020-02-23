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
        $this->html = mb_convert_encoding(file_get_contents($this->url), 'HTML-ENTITIES', 'UTF-8');
    }

    public function getStoreInfo(): Store
    {
        preg_match('{<h2 class="display-name">.*?<span>(.*?)</span>.*?</h2>}s', $this->html, $matches);
        $storeName =  trim(html_entity_decode($matches[1], ENT_HTML5));
        return new Store($storeName);
    }
}
