<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PodcastModel extends BaseContentModel {

    const TYPE_NAME = "podcast";

    public function __construct($provider) {
        parent::__construct(self::TYPE_NAME, $provider);        
    }

    // Runtime
    public $duration = -1;
    // Array of Tags
    public $tags = array();

}
