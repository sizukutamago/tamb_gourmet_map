<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SlackSubscribeTest extends TestCase
{
    const TEXT = <<<EOD
おすすめ
https://example.com
EOD;


    private function createSlackEvent(): array {
        return [
            'event' => [
                'text' => self::TEXT
            ],
        ];
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->post(
            route('slack.subscribe'), $this->createSlackEvent()
        );

        $response->assertStatus(200);
    }
}
