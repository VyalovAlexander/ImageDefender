<?php

namespace VyalovAlexander\ImageDefender\GD;

use VyalovAlexander\ImageDefender\ImageStorageInterface;

class GDImageStorage implements ImageStorageInterface
{

    /**
     * @param string $filename
     * @return bool|resource
     * @throws \Exception
     */
    public function load(string $filename) {
        $imageExtension = $this->extension($filename);
        $image = false;
        switch ($imageExtension) {
            case "png":
                $image = imagecreatefrompng($filename);
                break;
            case "jpeg":
                $image = imagecreatefromjpeg($filename);
                break;
            case "jpg":
                $image = imagecreatefromjpeg($filename);
                break;
            default:
                throw new \Exception("Unsupported image type. Support only png and jpeg.");
                break;
        }
        if (!$image) {
            throw new \Exception("Cannot load image.");
        }
        return $image;
    }

    /**
     * @param string $filename
     * @param $image
     * @return string
     * @throws \Exception
     */
    public function save(string $filename, $image) : string {
        $imageExtension = $this->extension($filename);
        switch ($imageExtension) {
            case "png":
                imagealphablending($image, false);
                imagesavealpha($image, true);
                $imageFile = imagepng($image, $filename);
                break;
            case "jpeg":
                $imageFile = imagejpeg($image, $filename);
                break;
            case "jpg":
                $imageFile = imagejpeg($image, $filename);
                break;
            default:
                throw new \Exception("Unsupported image type. Support only png and jpeg.");
                break;
        }
        if (!$imageFile) {
            throw new \Exception("Cannot save image.");
        }
        imagedestroy($image);
        return $filename;
    }

    /**
     * @param string $filename
     * @return string
     */
    private function extension(string $filename) : string{
        $ex = explode(".", $filename);
        return array_pop($ex);
    }

}