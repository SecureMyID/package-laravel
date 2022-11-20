<?php

namespace TrillzGlobal\SecureMyID;



class SecureMyID extends SecureMyIDAPI {

    // use SecureMyIDAPI, SecureMyIDWebhook;
    

    public $api_key;
    public $secret_key;
    public $method = "AES-128-CBC";
    public $url = "https://backoffice.securemy.id/api/v1/post_request";

    public function __construct(string $api_key="", string $secret_key="" )
    {
        $this->api_key = $api_key;
        $this->secret_key = $secret_key;
    }

    //Request Identity Verification

    public function verifyID($data){
        $encrypt_data =  $this->encrypt_data($data);
        $payload = ["type"=>"verify", "data"=>$encrypt_data];
        $return =  $this->api_call($payload, $this->url);


    }
    //Report Identity
    public function reportIdentity($data){
        $encrypt_data =  $this->encrypt_data($data);
        $payload = ["type"=>"report", "data"=>$encrypt_data];
        $output =  $this->api_call($payload, $this->url);
        return $output;
    }


    //Decrypt Webhook Request
    public function decryptWebhook($data){
        $decrypted_data = $this->decrypt_data($data);
        return $decrypted_data;
    }


    
}