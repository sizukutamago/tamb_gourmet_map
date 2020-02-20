<?php
declare(strict_types=1);

namespace Tests\Mock;


class SlackRequestMock
{
    public static function createSlackEvent(string $text, string $challengeToken = ''): array
    {
        return [
            'event' => [
                'text' => $text,
            ],
            'challenge' => $challengeToken,
        ];
    }
}
