<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ModelBinder
{
    public static function BindObjectFromCollection($object, $collection)
    {
        $props = get_object_vars($object);
                
        foreach ($collection as $key => $val)
        {
            foreach($props as $pkey => $pval)
            {                
                if(strtolower($pkey) == strtolower($key))
                {
                    $object->{$pkey} = $val;
                }
            }
        }
    }
}

