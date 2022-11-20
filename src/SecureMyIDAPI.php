<?php

namespace TrillzGlobal\SecureMyID;

use \GuzzleHttp\{
    Client,
    Exception\ClientException,
    Exception\RequestException
};

class SecureMyIDAPI {

    protected function api_call($data, $url)
    {
        try 
        {

            $content = 
            [
                 "headers"=>["SecureMyID-Token"=>$this->api_key,],
                 "json"=>$data
            ];
            $client =  new Client();
            $response  = $client->request("POST", $url, $content);
            $data =(string) $response->getBody(true);
            $response = json_encode(["data"=>json_decode($data, true), "status"=>"success"]);

        } catch (RequestException $e) 
        {
            //throw $th;
        }

    }
    
    //Generate Signature
    private function signature($string)
    {
        $hash = hash("sha1", $string);
        return substr($hash,0,16);
    }


    public function encrypt_data($payload) 
    {
        $iv = $this->signature($this->secret_key);
        print_r("IV: ".$iv."\n");
        $ciphertext = openssl_encrypt($payload, $this->method, $iv, OPENSSL_RAW_DATA, $iv);
        $hex= unpack('H*', $ciphertext);
        return  $hex[1];
        // return $hex;
    }

    public function decrypt_data($payload)
    {
        $iv = $this->signature($this->secret_key);
        $payload = pack('H*', $payload);
        $ciphertext = openssl_decrypt($payload, $this->method, $iv, OPENSSL_RAW_DATA, $iv);
        return $ciphertext;
    }
}