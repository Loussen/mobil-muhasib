<?php

namespace App\Helpers;

class EstimateReadTimeHelper
{
    public static function estimateReadingTime($text,$wpm = 200)
    {
        $totalWords = str_word_count(strip_tags($text));
        $minutes = floor($totalWords / $wpm);
        $seconds = floor($totalWords % $wpm / ($wpm / 60));

        return max($minutes, 1);
    }
}
