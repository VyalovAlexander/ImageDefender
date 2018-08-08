<?php

namespace VyalovAlexander\ImageDefender\GD;

use VyalovAlexander\ImageDefender\ImageDefenderFactory;
use VyalovAlexander\ImageDefender\SignImageDefenderInterface;
use VyalovAlexander\ImageDefender\StampImageDefenderInterface;

class GDImageDefenderFactory implements ImageDefenderFactory
{

    private $singConfig;
    private $stampConfig;
    private $storage;

    public function __construct()
    {
        $this->storage = new GDImageStorage();
        $this->singConfig = require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'sign.php';
        $this->stampConfig = require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'stamp.php';
    }


    public function getSignImageDefender(): SignImageDefenderInterface
    {

    }

    public function getStampImageDefender(): StampImageDefenderInterface
    {
        $stamp =  new GDStampImageDefender($this->storage);

    }

}