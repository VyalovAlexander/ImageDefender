<?php

namespace VyalovAlexander\ImageDefender;

interface StampImageDefenderInterface
{

    /**
     * StampImageDefenderInterface constructor.
     * @param ImageStorageInterface $storage
     */
    public function __construct(ImageStorageInterface $storage);

    /**
     * Impose a image stamp to the given image, return path to resulting image
     *
     * @param string $pathToImage
     * @param string $savePath
     * @param string $pathToStamp
     * @param int $stampMarginRight
     * @param int $stampMarginBottom
     * @param int $stampTransparency
     * @param int|null $stampHeight
     * @param int|null $stampWidth
     * @return string
     *
     * @throws \Exception
     */
    public function imposeStamp(string $pathToImage, string $savePath, string $pathToStamp, int $stampMarginRight, int $stampMarginBottom, int $stampTransparency, int $stampHeight = null, int $stampWidth = null): string;

}