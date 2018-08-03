<?php

namespace VyalovAlexander\ImageDefender\Gd;

use VyalovAlexander\ImageDefender\ImageStorageInterface;
use VyalovAlexander\ImageDefender\StampImageDefenderInterface;

class GDStampImageDefender implements StampImageDefenderInterface
{

    private $storage;

    /**
     * GDStampImageDefender constructor.
     * @param ImageStorageInterface $storage
     */
    public function __construct(ImageStorageInterface $storage)
    {
        $this->storage = $storage;
    }

    /**
     * @param string $pathToImage
     * @param string $savePath
     * @param string $pathToStamp
     * @param int $stampMarginRight
     * @param int $stampMarginBottom
     * @param int $stampTransparency
     * @param int|null $stampHeight
     * @param int|null $stampWidth
     * @return string
     */
    public function imposeStamp(string $pathToImage, string $savePath, string $pathToStamp, int $stampMarginRight, int $stampMarginBottom, int $stampTransparency, int $stampHeight = null, int $stampWidth = null): string
    {
        $image = $this->storage->load($pathToImage);
        $imageWidth = imagesx($image);
        $imageHeight = imagesy($image);

        $stamp = $this->storage->load($pathToStamp);
        $stampWidth = is_null($stampWidth) ? imagesx($stamp) : $stampWidth;
        $stampHeight = is_null($stampHeight) ? imagesy($stamp) : $stampHeight;
        $stamp = imagescale($stamp, $stampWidth, $stampHeight);

        imagecopymerge($image, $stamp, $imageWidth - $stampMarginRight - $stampWidth, $imageHeight - $stampMarginBottom - $stampHeight, 0, 0, $stampWidth, $stampHeight, $stampTransparency);

        imagedestroy($stamp);

        return $this->storage->save($savePath, $image);
    }

    /**
     * @param string $pathToImage
     * @param string $savePath
     * @param string $text
     * @param int $textXPosition
     * @param int $textYPosition
     * @param int $textTransparency
     * @param int $fontSize
     * @param string|null $pathToTTFFont
     * @return string
     */
    public function imposeText(string $pathToImage, string $savePath, string $text, int $textXPosition, int $textYPosition, int $textTransparency, int $fontSize, string $pathToTTFFont = null): string
    {
        $image = $this->getImageFromFile($pathToImage);
        $black = imagecolorallocatealpha($image, 0, 0, 0, $textTransparency);
        $pathToTTFFont = is_null($pathToTTFFont) ? dirname(__FILE__) . "/resources/font.ttf" : $pathToTTFFont;
        imagettftext($image, $fontSize, 0, $textXPosition, $textYPosition, $black, $pathToTTFFont, $text);
        return $this->saveImageToFile($savePath, $image);
    }

}