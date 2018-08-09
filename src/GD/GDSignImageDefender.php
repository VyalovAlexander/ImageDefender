<?php

namespace VyalovAlexander\ImageDefender\GD;

use VyalovAlexander\ImageDefender\ImageStorageInterface;
use VyalovAlexander\ImageDefender\SignImageDefenderInterface;

class GDSignImageDefender implements SignImageDefenderInterface
{

    /**
     * @var ImageStorageInterface
     */
    private $storage;
    /**
     * @var
     */
    private $font;
    /**
     * @var
     */
    private $text;
    /**
     * @var
     */
    private $marginRight;
    /**
     * @var
     */
    private $marginBottom;
    /**
     * @var
     */
    private $green;
    /**
     * @var
     */
    private $red;
    /**
     * @var
     */
    private $blue;
    /**
     * @var
     */
    private $transparency;
    /**
     * @var
     */
    private $fontSize;
    /**
     * @var
     */
    private $angle;


    /**
     * GDTextImageDefender constructor.
     * @param ImageStorageInterface $storage
     */
    public function __construct(ImageStorageInterface $storage)
    {
        $this->storage = $storage;
    }

    /**
     * @param string $text
     * @return SignImageDefenderInterface
     */
    public function setSign(string $text): SignImageDefenderInterface
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @param int $margin
     * @return SignImageDefenderInterface
     */
    public function setSignMarginRight(int $margin): SignImageDefenderInterface
    {
        $this->marginRight = $margin;

        return $this;
    }

    /**
     * @param int $margin
     * @return SignImageDefenderInterface
     */
    public function setSignMarginBottom(int $margin): SignImageDefenderInterface
    {
        $this->marginBottom = $margin;

        return $this;

    }

    /**
     * @param int $red
     * @param int $green
     * @param int $blue
     * @return SignImageDefenderInterface
     */
    public function setSignColor(int $red, int $green, int $blue): SignImageDefenderInterface
    {
        $this->green = $green;
        $this->blue = $blue;
        $this->red = $red;

        return $this;
    }

    /**
     * @param int $transparency
     * @return SignImageDefenderInterface
     * @throws \Exception
     */
    public function setSignTransparency(int $transparency): SignImageDefenderInterface
    {
        if ($transparency < 0 || $transparency > 100)
        {
            throw new \Exception("Transparency must be between 0 and 100.");
        }
        $this->transparency = $transparency;

        return $this;
    }

    /**
     * @param int $fontSize
     * @return SignImageDefenderInterface
     * @throws \Exception
     */
    public function setSignFontSize(int $fontSize): SignImageDefenderInterface
    {
        if ($fontSize < 0)
        {
            throw new \Exception("Font size must be more then 0.");
        }
        $this->fontSize = $fontSize;

        return $this;
    }

    /**
     * @param string $pathToFontFile
     * @return SignImageDefenderInterface
     */
    public function setFont(string $pathToFontFile): SignImageDefenderInterface
    {
       $this->font = $pathToFontFile;

       return $this;
    }

    /**
     * @param int $angle
     * @return SignImageDefenderInterface
     */
    public function setSignAngle(int $angle): SignImageDefenderInterface
    {
        $this->angle = $angle;

        return $this;
    }


    /**
     * @param string $pathToImage
     * @param string $savePath
     * @return string
     */
    public function impose(string $pathToImage, string $savePath) : string
    {
        $image = $this->storage->load($pathToImage);
        $imageWidth = imagesx($image);
        $imageHeight = imagesy($image);

        $color = imagecolorallocatealpha($image, $this->red, $this->green, $this->blue, $this->transparency);

        $textBox = imagettfbbox($this->fontSize, $this->angle, $this->font, $this->text);
        $textWidth = $textBox[2] - $textBox[0];
        $textHeight = $textBox[1] - $textBox[7];

        imagettftext($image, $this->fontSize, $this->angle, $imageWidth - $this->marginRight - $textWidth, $imageHeight - $this->marginBottom - $textHeight, $color, $this->font, $this->text);

        return $this->storage->save($savePath, $image);
    }

}