<?php
/**
 * Created by PhpStorm.
 * User: vyalov
 * Date: 03.08.18
 * Time: 20:22
 */

namespace VyalovAlexander\ImageDefender;


interface ImageStorageInterface
{

    /**
     * @param string $filename
     * @return mixed
     */
    public function load(string $filename);

    /**
     * @param string $filename
     * @param $image
     * @return string
     */
    public function save(string $filename, $image) : string;

}