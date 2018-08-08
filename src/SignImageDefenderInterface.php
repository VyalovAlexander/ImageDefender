<?php

namespace VyalovAlexander\ImageDefender;

interface SignImageDefenderInterface extends ImageDefenderInterface
{

    /**
     * @param string $text
     * @return SignImageDefenderInterface
     */
    public function setSign(string $text) : self;

    /**
     * @param int $margin
     * @return SignImageDefenderInterface
     */
    public function setSignMarginRight(int $margin) : self;

    /**
     * @param int $margin
     * @return SignImageDefenderInterface
     */
    public function setSignMarginBottom(int $margin) : self;

    /**
     * @param int $red
     * @param int $green
     * @param int $blue
     * @return SignImageDefenderInterface
     */
    public function setSignColor(int $red, int $green, int $blue) : self;

    /**
     * @param int $transparency
     * @return SignImageDefenderInterface
     */
    public function setSignTransparency(int $transparency) : self;

    /**
     * @param int $fontSize
     * @return SignImageDefenderInterface
     */
    public function setSignFontSize(int $fontSize) : self;


    /**
     * @param string $pathToFontFile
     * @return SignImageDefenderInterface
     */
    public function setFont(string $pathToFontFile) : self;

    /**
     * @param int $angle
     * @return SignImageDefenderInterface
     */
    public function setSignAngle(int $angle) : self;

}