<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseContentModel
 *
 * @author Chris Mccord
 */
class BaseContentModel {
    protected $type = null;
    public $provider = null;
    public $id = null;
    public $date_created = null;
    public $title = null;
    public $description = null;
    public $url = null;
    
    protected function __construct($type, $provider) {
        $this->type = $type;
        $this->provider = $provider;
    }
    
    public function GetContentType()
    {
        return $this->type;
    }
    
    public static function SortDescendingByDate($instance1, $instance2)
    {
        if($instance1->date_created == $instance2 ->date_created)
        {
            return 0;
        }
        
        return ($instance1->date_created < $instance2->date_created) ? 1 : -1;
    }
}
