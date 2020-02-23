<?php

declare(strict_types=1);

namespace ManagementStore\Infrastructures\Adapters;

class TabelogAdapter
{
    private string $url;

    private string $html;

    public function __construct(string $url)
    {
        $this->url = $url;
        $this->html = mb_convert_encoding(file_get_contents($this->url), 'HTML-ENTITIES', 'UTF-8');
    }

    public function getStoreInfo()
    {
        preg_match('{<h2 class="display-name">(.*?)</h2>}s', $this->html, $matches, PREG_OFFSET_CAPTURE);
        preg_match('{<span>(.*?)</span>}s', $matches[1][0], $matches, PREG_OFFSET_CAPTURE);
        $storeName =  str_replace(['\r\n', '\r', '\n'], '', html_entity_decode($matches[1][0], ENT_HTML5));
        return ['name' => trim($storeName)];
    }
}
