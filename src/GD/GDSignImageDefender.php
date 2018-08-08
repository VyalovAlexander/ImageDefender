<?php

namespace VyalovAlexander\ImageDefender\GD;

use VyalovAlexander\ImageDefender\ImageStorageInterface;
use VyalovAlexander\ImageDefender\SignImageDefenderInterface;

class GDSignImageDefender implements SignImageDefenderInterface
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
    }

    public function setSign(string $text): self
    {
        // TODO: Implement setSign() method.
    }

    public function setSignMarginRight(int $margin): self
    {
        // TODO: Implement setSignMarginRight() method.
    }

    public function setSignMarginBottom(int $margin): self
    {
        // TODO: Implement setSignMarginBottom() method.
    }

    public function setSignColor(int $red, int $green, int $blue): self
    {
        // TODO: Implement setSignColor() method.
    }

    public function setSignTransparency(int $transparency): self
    {
        // TODO: Implement setSignTransparency() method.
    }

    public function setSignFontSize(int $fontSize): self
    {
        // TODO: Implement setSignFontSize() method.
    }

    public function setFont(string $pathToFontFile): self
    {
        // TODO: Implement setFont() method.
    }

    public function setSignAngle(int $angle): self
    {
        // TODO: Implement setSignAngle() method.
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