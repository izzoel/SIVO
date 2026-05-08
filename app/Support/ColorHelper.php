<?php

namespace App\Support;

class ColorHelper
{
    public static function textColorForBackground(?string $color, string $fallback = '#92400e'): string
    {
        $hex = self::normalizeHex($color);

        if ($hex === null) {
            return $fallback;
        }

        $red = hexdec(substr($hex, 0, 2));
        $green = hexdec(substr($hex, 2, 2));
        $blue = hexdec(substr($hex, 4, 2));
        $brightness = (($red * 299) + ($green * 587) + ($blue * 114)) / 1000;

        if ($brightness > 150) {
            return self::shade($red, $green, $blue, 0.45);
        }

        return self::tint($red, $green, $blue, 1);
    }

    public static function normalizeHex(?string $color): ?string
    {
        $hex = ltrim(trim((string) $color), '#');

        if (strlen($hex) === 3) {
            $hex = $hex[0].$hex[0].$hex[1].$hex[1].$hex[2].$hex[2];
        }

        return preg_match('/^[0-9a-fA-F]{6}$/', $hex) ? strtolower($hex) : null;
    }

    protected static function shade(int $red, int $green, int $blue, float $amount): string
    {
        return sprintf(
            '#%02x%02x%02x',
            max(0, (int) round($red * $amount)),
            max(0, (int) round($green * $amount)),
            max(0, (int) round($blue * $amount)),
        );
    }

    protected static function tint(int $red, int $green, int $blue, float $amount): string
    {
        return sprintf(
            '#%02x%02x%02x',
            min(255, (int) round($red + ((255 - $red) * $amount))),
            min(255, (int) round($green + ((255 - $green) * $amount))),
            min(255, (int) round($blue + ((255 - $blue) * $amount))),
        );
    }
}
