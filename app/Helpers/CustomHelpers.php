<?php

if (!function_exists('my_asset')) {
    function my_asset($path, $secure = null): string
    {
        $assetPath = 'storage/' . $path;
        return asset($assetPath, $secure);
    }
}

if (!function_exists('getCleanString')) {
    function getCleanString($data): string
    {
        return htmlspecialchars(strip_tags(trim($data)));
    }
}
