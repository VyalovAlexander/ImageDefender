<?php

namespace VyalovAlexander\ImageDefender\GD;

use VyalovAlexander\ImageDefender\ImageDefenderFactory;
use VyalovAlexander\ImageDefender\SignImageDefenderInterface;
use VyalovAlexander\ImageDefender\StampImageDefenderInterface;

class GDImageDefenderFactory implements ImageDefenderFactory
{

    /**
     * @var mixed
     */
    private $singConfig;
    /**
     * @var mixed
     */
    private $stampConfig;
    /**
     * @var GDImageStorage
     */
    private $storage;

    /**
     * GDImageDefenderFactory constructor.
     */
    public function __construct()
    {
        $this->storage = new GDImageStorage();
        $this->singConfig = GDConfig::sign();
        $this->stampConfig = GDConfig::stamp();
    }

    /**
     * @return SignImageDefenderInterface
     */
    public function getSignImageDefender(): SignImageDefenderInterface
    {
        $sign = new GDSignImageDefender($this->storage);
        return $sign->setFont($this->singConfig['font'])
            ->setSign($this->singConfig['text'])
            ->setSignAngle($this->singConfig['angle'])
            ->setSignColor($this->singConfig['color']['red'], $this->singConfig['color']['green'], $this->singConfig['color']['blue'])
            ->setSignFontSize($this->singConfig['fontSize'])
            ->setSignMarginBottom($this->singConfig['marginRight'])
            ->setSignMarginRight($this->singConfig['marginRight'])
            ->setSignTransparency($this->singConfig['transparency']);

    }

    /**
     * @return StampImageDefenderInterface
     */
    public function getStampImageDefender(): StampImageDefenderInterface
    {
        $stamp =  new GDStampImageDefender($this->storage);
        return $stamp->setStamp($this->stampConfig['image'])
            ->setStampHeight($this->stampConfig['height'])
            ->setStampWidth($this->stampConfig['width'])
            ->setStampMarginRight($this->stampConfig['marginRight'])
            ->setStampMarginBottom($this->stampConfig['marginBottom'])
            ->setStampTransparency($this->stampConfig['transparency']);
    }

}