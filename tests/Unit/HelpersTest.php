<?php

declare(strict_types=1);

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class HelpersTest extends TestCase
{
    const BASE_URL = 'https://example.com/example/example?id=test&page=1';

    /**
     * @test
     */
    public function テキストからURLを取り出せる() {
        $text = 'オススメです' . self::BASE_URL;
        $urls = getUrlFromText($text);

        $this->assertTrue(count($urls) === 1);
        $this->assertSame(self::BASE_URL, $urls[0]);
    }

    /**
     * @test
     */
    public function テキストにURLがない場合() {
        $text = 'オススメです';
        $urls = getUrlFromText($text);
        $this->assertTrue(count($urls) === 0);
    }

    /**
     * @test
     */
    public function テキストに複数URLがある場合() {
        $except[0] = self::BASE_URL;
        $except[1] = 'https://example2.com';
        $text = <<<EOD
オススメです
$except[0]
$except[1]
EOD;

        $urls = getUrlFromText($text);
        $this->assertTrue(count($urls) === 2);
        $this->assertSame($urls[0], $except[0]);
        $this->assertSame($urls[1], $except[1]);
    }

    /**
     * @test
     * URLが連続して並んでいる場合は考慮しない
     */
    public function URLが連続で２個並んでいる場合() {
        $urls = getUrlFromText(self::BASE_URL . self::BASE_URL);
        $this->assertTrue(count($urls) === 1);
    }
}
