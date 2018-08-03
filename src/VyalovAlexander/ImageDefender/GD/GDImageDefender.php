<?php

namespace VyalovAlexander\ImageDefender\Gd;

use VyalovAlexander\ImageDefender\ImageDefenderInterface;

class GDImageDefender implements ImageDefenderInterface
{

    public function imposeStamp(string $pathToImage, string $savePath, string $pathToStamp, int $stampMarginRight, int $stampMarginBottom, int $stampTransparency, int $stampHeight = null, int $stampWidth = null): string
    {
        $image = $this->getImageFromFile($pathToImage);
        $imageWidth = imagesx($image);
        $imageHeight = imagesy($image);
        $stamp = $this->getImageFromFile($pathToStamp);
        $stampWidth = is_null($stampWidth) ? imagesx($stamp) : $stampWidth;
        $stampHeight = is_null($stampHeight) ? imagesy($stamp) : $stampHeight;
        $stamp = imagescale($stamp, $stampWidth, $stampHeight);
        imagecopymerge($image, $stamp, $imageWidth - $stampMarginRight - $stampWidth, $imageHeight - $stampMarginBottom - $stampHeight, 0, 0, $stampWidth, $stampHeight, $stampTransparency);
        imagedestroy($stamp);
        return $this->saveImageToFile($savePath, $image);
    }

    public function imposeText(string $pathToImage, string $savePath, string $text,  int $textXPosition, int $textYPosition, int $textTransparency, int $fontSize, string $pathToTTFFont = null): string
    {
        $image = $this->getImageFromFile($pathToImage);
        $black = imagecolorallocatealpha($image, 0, 0, 0, $textTransparency);
        $pathToTTFFont = is_null($pathToTTFFont) ? dirname(__FILE__) . "/resources/font.ttf" : $pathToTTFFont;
        imagettftext($image, $fontSize, 0, $textXPosition, $textYPosition, $black, $pathToTTFFont, $text);
        return $this->saveImageToFile($savePath, $image);
    }


    /**
     * get file extension file.txt -> txt
     *
     * @param string $filename
     * @return string
     */
    private function getExtension(string $filename): string
    {
        $ex = explode(".", $filename);
        return array_pop($ex);
    }

    /**
     * Get image resource from file
     *
     * @param string $filename
     * @return bool|resource
     * @throws \Exception
     */
    private function getImageFromFile(string $filename)
    {
        $imageExtension = $this->getExtension($filename);
        $image = false;
        switch ($imageExtension) {
            case "png":
                $image = imagecreatefrompng($filename);
                break;
            case "jpeg":
                $image = imagecreatefromjpeg($filename);
                break;
            case "jpg":
                $image = imagecreatefromjpeg($filename);
                break;
            default:
                throw new \Exception("Unsupported image type. Support only png and jpeg.");
                break;
        }
        if (!$image) {
            throw new \Exception("Cannot load image.");
        }
        return $image;
    }

    /**
     * Save image resource to the give $filename
     *
     * @param string $filename
     * @param $image
     * @return string
     * @throws \Exception
     */
    private function saveImageToFile(string $filename, $image): string
    {
        $imageExtension = $this->getExtension($filename);
        switch ($imageExtension) {
            case "png":
                imagealphablending($image, false);
                imagesavealpha($image, true);
                $imageFile = imagepng($image, $filename);
                break;
            case "jpeg":
                $imageFile = imagejpeg($image, $filename);
                break;
            case "jpg":
                $imageFile = imagejpeg($image, $filename);
                break;
            default:
                throw new \Exception("Unsupported image type. Support only png and jpeg.");
                break;
        }
        if (!$imageFile) {
            throw new \Exception("Cannot save image.");
        }
        imagedestroy($image);
        return $filename;
    }


}