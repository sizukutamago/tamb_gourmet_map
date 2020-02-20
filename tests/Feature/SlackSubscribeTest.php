<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Mock\SlackRequestMock;
use Tests\TestCase;

class SlackSubscribeTest extends TestCase
{
    const TEXT = <<<EOD
おすすめ
https://example.com
EOD;

    const CHALLENGE_TOKEN = 'randomString';

    /**
     * @test
     */
    public function slackからのレスポンスにはチャレンジトークンを返す()
    {
        $response = $this->post(
            route('slack.subscribe'), SlackRequestMock::createSlackEvent(self::TEXT, self::CHALLENGE_TOKEN)
        );

        $response->assertStatus(200);
        $this->assertSame(self::CHALLENGE_TOKEN, $response->decodeResponseJson('challenge'));
    }
}
