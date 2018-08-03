<?php

namespace VyalovAlexander\ImageDefender\Gd;

use VyalovAlexander\ImageDefender\ImageStorageInterface;
use VyalovAlexander\ImageDefender\TextImageDefenderInterface;

class GDTextImageDefender implements TextImageDefenderInterface
{

    private $storage;
    private $font;

    /**
     * GDTextImageDefender constructor.
     * @param ImageStorageInterface $storage
     */
    public function __construct(ImageStorageInterface $storage)
    {
        $this->storage = $storage;
        $this->font = dirname(__FILE__) . '/resources/font.ttf';
    }

    /**
     * @param string $pathToImage
     * @param string $savePath
     * @param string $text
     * @param int $textXPosition
     * @param int $textYPosition
     * @param int $textTransparency
     * @param int $fontSize
     * @return string
     */
    public function imposeText(string $pathToImage, string $savePath, string $text, int $textXPosition, int $textYPosition, int $textTransparency, int $fontSize) : string
    {
        $image = $this->storage->load($pathToImage);

        $black = imagecolorallocatealpha($image, 0, 0, 0, $textTransparency);

        imagettftext($image, $fontSize, 0, $textXPosition, $textYPosition, $black, $this->font, $text);

        return $this->storage->save($savePath, $image);
    }

}