<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of base-content-publisher
 *
 * @author Chris Mccord
 */
abstract class BaseContentPublisher {
    abstract public function GetPublishedContent($count);
    abstract public function GetPublisherKey();
    abstract public function GetPublicationType();
}
