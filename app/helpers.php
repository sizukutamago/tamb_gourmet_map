<?php

declare(strict_types=1);

/**
 * URLが連続して並んでいる場合は考慮しない
 *
 * @param string $text
 * @return array
 */
function getUrlFromText(string $text): array{
    $escapePattern = preg_quote('-._~%:/?#[]@!$&\'()*+,;=', '/');
    $pattern       = '/((http|https):\/\/[0-9a-z'. $escapePattern. ']+)/i';    preg_match_all($pattern, $text, $urls);
    return $urls[0];
}
