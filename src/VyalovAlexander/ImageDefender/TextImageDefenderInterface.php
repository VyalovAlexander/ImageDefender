<?php

namespace VyalovAlexander\ImageDefender;

interface TextImageDefenderInterface
{

    /**
     * TextImageDefenderInterface constructor.
     * @param ImageStorageInterface $storage
     */
    public function __construct(ImageStorageInterface $storage);

    /**
     * Impose a text stamp to the given image, return path to resulting image
     *
     * @param string $pathToImage
     * @param string $savePath
     * @param string $text
     * @param int $textXPosition
     * @param int $textYPosition
     * @param int $fontSize
     * @return string
     *
     * @throws \Exception
     */
    public function imposeText(string $pathToImage, string $savePath, string $text,  int $textXPosition, int $textYPosition, int $textTransparency, int $fontSize) : string;

}