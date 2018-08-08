<?php

namespace VyalovAlexander\ImageDefender;


interface ImageDefenderInterface
{

    /**
     * ImageDefenderInterface constructor.
     * @param ImageStorageInterface $storage
     */
    public function __construct(ImageStorageInterface $storage);

    /**
     * @param string $pathToImage
     * @param string $savePath
     * @return string
     */
    public function impose(string $pathToImage, string $savePath) : string;
}