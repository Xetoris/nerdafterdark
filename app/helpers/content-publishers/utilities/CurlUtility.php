<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CurlUtility
 *
 * @author Chris Mccord
 */
class CurlUtility {
    private $endpoint;

    public function __construct($target) {
        $this->endpoint = $target;
    }
    
    public function SetEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
    }

    public function GetToResource($resource) {
        $url = "{$this->endpoint}/{$resource}";

        return $this->ExecuteCurl($url, "GET");
    }
    
    public function DeleteToResource($resource, $data = null)
    {
        return $this->ExecuteCurl($resource, "DELETE", $data);
    }
    
    public function PostToResource($resource, $data = null)
    {
        return $this->ExecuteCurl($resource, "POST", $data);
    }
    
    public function PutToResource($resource, $data = null)
    {
        return $this->ExecuteCurl($resource, "PUT", $data);
    }

    private function ExecuteCurl($url, $method, $data = null) {    
        $curl = curl_init($url);
        
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        
        switch($method)
        {
            case 'PUT':
                curl_setopt($curl, CURLOPT_PUT, 1);
                break;
            case 'DELETE':
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');                
                break;
            case 'POST':
                curl_setopt($curl, CURLOPT_POST, 1);
                break;
            default:
                curl_setopt($curl, CURLOPT_HTTPGET, 1);                
        }
        
        if (!is_null($data)) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        }

        $result = curl_exec($curl);
        
        curl_close($curl);
        
        return $result;
    }
}
