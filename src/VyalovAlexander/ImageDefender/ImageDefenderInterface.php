<?php

namespace VyalovAlexander\ImageDefender;

interface ImageDefenderInterface
{

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

    /**
     * Impose a text stamp to the given image, return path to resulting image
     *
     * @param string $pathToImage
     * @param string $savePath
     * @param string $text
     * @param int $textMarginRight
     * @param int $textMarginBottom
     * @param int $fontSize
     * @param string|null $pathToTTFFont
     * @return string
     *
     * @throws \Exception
     */
    public function imposeText(string $pathToImage, string $savePath, string $text, int $textMarginLeft, int $textMarginTop, int $textTransparency, int $fontSize, string $pathToTTFFont = null): string;
}