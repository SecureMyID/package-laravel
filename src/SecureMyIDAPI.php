<?php

namespace TrillzGlobal\SecureMyID;

use \GuzzleHttp\{
    Client,
    Exception\ClientException,
    Exception\RequestException
};

class SecureMyIDAPI{

    private function api_call($data, $url){
        try {

            $content = [
                 "headers"=>["SecureMyID-Token"=>$this->api_key,],
                 "json"=>$data
            ];
            $client =  new Client();
            $response  = $client->request("POST", $url, $content);
            $data =(string) $response->getBody(true);
            $response = json_encode(["data"=>json_decode($data, true), "status"=>"success"]);

        } catch (RequestException $e) {
            //throw $th;
        }

    }
    //Request Identity Verification

    public function verifyID($data){

    }
    //Report Identity
    public function reportIdentity($data){

    }
}