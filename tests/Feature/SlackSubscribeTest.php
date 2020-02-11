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

    const CHALLENGE_TOKEN = 'randomString';


    private function createSlackEvent(): array {
        return [
            'event' => [
                'text' => self::TEXT
            ],
            'challenge' => self::CHALLENGE_TOKEN
        ];
    }

    /**
     * @test
     */
    public function slackからのレスポンスにはチャレンジトークンを返す()
    {
        $response = $this->post(
            route('slack.subscribe'), $this->createSlackEvent()
        );

        $response->assertStatus(200);
        $this->assertSame(self::CHALLENGE_TOKEN, $response->decodeResponseJson('challenge'));
    }
}
