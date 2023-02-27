<?php

namespace App\Services;

use Illuminate\Support\Str;

class Placeholder
{
    public static function generate($width, $height) {
        $getsize    = "{$width}x{$height}";

        $image      = imagecreate($width, $height);

        $colors = ['ccc', '000000', 'a86540', '997a8d'];

// Colours
        $bg         = $colors[array_rand($colors)];

        $bg         = static::hex2rgb($bg);
        $setbg      = imagecolorallocate($image, $bg['r'], $bg['g'], $bg['b']);

        $fg         = '555';
        $fg         = static::hex2rgb($fg);
        $setfg      = imagecolorallocate($image, $fg['r'], $fg['g'], $fg['b']);

// Text
        $text       = $getsize;
        $text       = str_replace('+', ' ', $text);

// Text positioning
        $fontsize   = 4;
        $fontwidth  = imagefontwidth($fontsize);    // width of a character
        $fontheight = imagefontheight($fontsize);   // height of a character
        $length     = strlen($text);                // number of characters
        $textwidth  = $length * $fontwidth;         // text width
        $xpos       = (imagesx($image) - $textwidth) / 2;
        $ypos       = (imagesy($image) - $fontheight) / 2;

// Generate text
        imagestring($image, $fontsize, $xpos, $ypos, $text, $setfg);

        $rand = Str::random(8);

        $path = storage_path("app/public/{$rand}.png");

        imagepng($image, $path);

        return $path;
    }

    public static function hex2rgb($colour)
    {
        $colour = preg_replace("/[^abcdef0-9]/i", "", $colour);
        if (strlen($colour) == 6)
        {
            list($r, $g, $b) = str_split($colour, 2);
            return Array("r" => hexdec($r), "g" => hexdec($g), "b" => hexdec($b));
        }
        elseif (strlen($colour) == 3)
        {
            list($r, $g, $b) = array($colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2]);
            return Array("r" => hexdec($r), "g" => hexdec($g), "b" => hexdec($b));
        }
        return false;
    }
}
