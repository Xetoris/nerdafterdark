<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseContentController
 *
 * @author Chris Mccord
 */
class BaseContentController extends BaseController {
    protected $source = null;
    
    function __construct() {
        $this->source = new ContentSubscriber(); 
    }
}
