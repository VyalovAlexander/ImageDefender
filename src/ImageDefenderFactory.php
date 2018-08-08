<?php

namespace VyalovAlexander\ImageDefender;


interface ImageDefenderFactory
{
    /**
     * return configured SignImageDefender
     *
     * @return SignImageDefenderInterface
     */
    public function getSignImageDefender() : SignImageDefenderInterface;

    /**
     * return configured StampImageDefender
     *
     * @return StampImageDefenderInterface
     */
    public function getStampImageDefender() : StampImageDefenderInterface;
}