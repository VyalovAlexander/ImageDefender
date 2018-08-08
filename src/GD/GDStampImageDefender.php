<?php

namespace VyalovAlexander\ImageDefender\GD;

use VyalovAlexander\ImageDefender\ImageStorageInterface;
use VyalovAlexander\ImageDefender\StampImageDefenderInterface;

class GDStampImageDefender implements StampImageDefenderInterface
{

    private $storage;
    private $stamp;
    private $marginRight;
    private $marginBottom;
    private $transparency;
    private $height;
    private $width;

    /**
     * GDStampImageDefender constructor.
     * @param ImageStorageInterface $storage
     */
    public function __construct(ImageStorageInterface $storage)
    {
        $this->storage = $storage;
    }

    public function impose(string $pathToImage, string $savePath): string
    {
        $image = $this->storage->load($pathToImage);
        $imageWidth = imagesx($image);
        $imageHeight = imagesy($image);

        $stamp = imagescale($this->stamp, $this->width, $this->height);

        imagecopymerge($image, $stamp, $imageWidth - $this->marginRight - $this->width, $imageHeight - $this->marginBottom - $this->height, 0, 0, $this->width, $this->height, $this->transparency);

        imagedestroy($stamp);

        return $this->storage->save($savePath, $image);
    }

    public function setStamp(string $pathToStamp): StampImageDefenderInterface
    {
        $this->stamp = $this->storage->load($pathToStamp);

        return $this;
    }

    public function setStampMarginRight(int $margin): StampImageDefenderInterface
    {
        $this->marginRight = $margin;

        return $this;
    }

    public function setStampMarginBottom(int $margin): StampImageDefenderInterface
    {
        $this->marginBottom = $margin;

        return $this;
    }

    public function setStampTransparency(int $transparency): StampImageDefenderInterface
    {
        if ($transparency < 0 || $transparency > 100)
        {
            throw new \Exception("Transparency must be between 0 and 100.");
        }
        $this->transparency = $transparency;

        return $this;
    }

    public function setStampHeight(int $height): StampImageDefenderInterface
    {
        $this->height = $height;

        return $this;
    }

    public function setStampWidth(int $width): StampImageDefenderInterface
    {
        $this->width = $width;

        return $this;
    }

}