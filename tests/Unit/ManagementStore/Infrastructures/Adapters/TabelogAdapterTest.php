<?php
declare(strict_types=1);

namespace Tests\Unit\ManagementStore\Infrastructures\Adapters;


use ManagementStore\Infrastructures\Adapters\TabelogAdapter;
use Tests\TestCase;

class TabelogAdapterTest extends TestCase
{
    const TABELOG_URL = 'https://tabelog.com/osaka/A2701/A270101/27054282/';

    private TabelogAdapter $tabelogAdapter;

    public function setUp(): void
    {
        parent::setUp();
        $this->tabelogAdapter = new TabelogAdapter(self::TABELOG_URL);
    }

    /**
     * @test
     */
    public function 食べログのURLから店舗の情報を取得する()
    {
        $storeInfo = $this->tabelogAdapter->getStoreInfo();
        $this->assertSame('マクドナルド  梅田茶屋町店', $storeInfo['name']);
    }
}
