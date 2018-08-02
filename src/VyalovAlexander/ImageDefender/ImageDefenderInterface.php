<?php
/**
 * Created by PhpStorm.
 * User: alexander
 * Date: 02.08.18
 * Time: 10:16
 */

namespace VyalovAlexander\ImageDefender;

interface ImageDefenderInterface
{


    /**
     * Impose a stamp to the given image, return path to resulting image
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
     */
    public function imposeStamp(string $pathToImage, string $savePath, string $pathToStamp, int $stampMarginRight, int $stampMarginBottom, int $stampTransparency, int $stampHeight = null, int $stampWidth = null): string;

    public function imposeText($pathToImage, $savePath, $text): string;
}