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

}