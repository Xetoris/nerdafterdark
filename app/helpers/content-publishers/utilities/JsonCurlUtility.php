<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of JSONcURLUtility
 *
 * @author Chris Mccord
 */
class JsonCurlUtility extends CurlUtility {

    public function GetToResource($resource) {
        return json_decode(parent::GetToResource($resource));
    }
    
    public function DeleteToResource($resource, $data = null)
    {
        return json_decode(parent::DeleteToResource($resource, $data));
    }
    
    public function PostToResource($resource, $data = null)
    {
        return json_decode(parent::PostToResource($resource, $data));
    }
    
    public function PutToResource($resource, $data = null)
    {
        return json_decode(parent::PutToResource($resource, $data));
    }
}
