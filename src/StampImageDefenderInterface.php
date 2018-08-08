<?php

namespace VyalovAlexander\ImageDefender;

interface StampImageDefenderInterface extends ImageDefenderInterface
{

    /**
     * @param string $pathToStamp
     * @return StampImageDefenderInterface
     */
    public function setStamp(string $pathToStamp) : self;

    /**
     * @param int $margin
     * @return StampImageDefenderInterface
     */
    public function setStampMarginRight(int $margin) : self;

    /**
     * @param int $margin
     * @return StampImageDefenderInterface
     */
    public function setStampMarginBottom(int $margin) : self;

    /**
     * @param int $transparency
     * @return StampImageDefenderInterface
     */
    public function setStampTransparency(int $transparency) : self;

    /**
     * @param int $height
     * @return StampImageDefenderInterface
     */
    public function setStampHeight(int $height) : self;

    /**
     * @param int $width
     * @return StampImageDefenderInterface
     */
    public function setStampWidth(int $width) : self;

}