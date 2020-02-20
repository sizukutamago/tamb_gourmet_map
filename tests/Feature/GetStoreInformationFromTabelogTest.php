<?php

namespace Tests\Feature;

use App\Eloquents\Stores;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Mock\SlackRequestMock;
use Tests\TestCase;

class GetStoreInformationFromTabelogTest extends TestCase
{
    use RefreshDatabase;

    /**
     *
     */
    public function マクドナルド梅田茶屋町店の食べログURLが渡ってきたらDBに情報が登録される()
    {
        $response = $this->post(route('slack.subscribe'), SlackRequestMock::createSlackEvent('https://tabelog.com/osaka/A2701/A270101/27054282/'));

        $store = Stores::where('name', 'マクドナルド 梅田茶屋町店')->first();

        $this->assertSame('マクドナルド 梅田茶屋町店', $store->name);
        $response->assertStatus(200);
    }
}
