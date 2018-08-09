<?php

namespace VyalovAlexander\ImageDefender\GD;

use VyalovAlexander\ImageDefender\ImageStorageInterface;
use VyalovAlexander\ImageDefender\StampImageDefenderInterface;

class GDStampImageDefender implements StampImageDefenderInterface
{

    /**
     * @var ImageStorageInterface
     */
    private $storage;
    /**
     * @var
     */
    private $stamp;
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
    private $transparency;
    /**
     * @var
     */
    private $height;
    /**
     * @var
     */
    private $width;

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
     * @return string
     */
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

    /**
     * @param string $pathToStamp
     * @return StampImageDefenderInterface
     */
    public function setStamp(string $pathToStamp): StampImageDefenderInterface
    {
        $this->stamp = $this->storage->load($pathToStamp);

        return $this;
    }

    /**
     * @param int $margin
     * @return StampImageDefenderInterface
     */
    public function setStampMarginRight(int $margin): StampImageDefenderInterface
    {
        $this->marginRight = $margin;

        return $this;
    }

    /**
     * @param int $margin
     * @return StampImageDefenderInterface
     */
    public function setStampMarginBottom(int $margin): StampImageDefenderInterface
    {
        $this->marginBottom = $margin;

        return $this;
    }

    /**
     * @param int $transparency
     * @return StampImageDefenderInterface
     * @throws \Exception
     */
    public function setStampTransparency(int $transparency): StampImageDefenderInterface
    {
        if ($transparency < 0 || $transparency > 100)
        {
            throw new \Exception("Transparency must be between 0 and 100.");
        }
        $this->transparency = $transparency;

        return $this;
    }

    /**
     * @param int $height
     * @return StampImageDefenderInterface
     */
    public function setStampHeight(int $height): StampImageDefenderInterface
    {
        $this->height = $height;

        return $this;
    }

    /**
     * @param int $width
     * @return StampImageDefenderInterface
     */
    public function setStampWidth(int $width): StampImageDefenderInterface
    {
        $this->width = $width;

        return $this;
    }

}