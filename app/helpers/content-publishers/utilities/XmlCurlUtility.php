<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of XmlCurlUtility
 *
 * @author Chris Mccord
 */
class XmlCurlUtility extends CurlUtility {

    public function GetToResource($resource) {
        return new SimpleXMLElement(parent::GetToResource($resource), LIBXML_NOCDATA);
    }
    
    public function DeleteToResource($resource, $data = null)
    {
        return new SimpleXMLElement(parent::DeleteToResource($resource, $data));
    }
    
    public function PostToResource($resource, $data = null)
    {
        return new SimpleXMLElement(parent::PostToResource($resource, $data));
    }
    
    public function PutToResource($resource, $data = null)
    {
        return new SimpleXMLElement(parent::PutToResource($resource, $data));
    }
}
