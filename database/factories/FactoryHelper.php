<?php

namespace Database\Factories;

 class FactoryHelper
{
    /**
     * Generates random image; temporary fix for current issue.
     * @link https://github.com/fzaninotto/Faker/issues/1884
     *
     * @param string $absolutePath
     * @param int $width
     * @param int $height
     * @return bool
     */
    public static function saveRandomImage(string $absolutePath, int $width = 640, int $height = 480): bool
    {
        // Create a blank image:
        $im = imagecreatetruecolor($width, $height);
        // Add light background color:
        $bgColor = imagecolorallocate($im, rand(100, 255), rand(100, 255), rand(100, 255));
        imagefill($im, 0, 0, $bgColor);
        // Save the image:
        $isGenerated = imagejpeg($im, $absolutePath);

        // Free up memory:
        imagedestroy($im);

        return $isGenerated;
    }
}
