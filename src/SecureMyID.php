<?php

namespace TrillzGlobal\SecureMyID;



class SecureMyID {

    use SecureMyIDAPI, SecureMyIDWebhook;
    

    public $api_key;
    public $secret_key;

    public function __construct(string $api_key="", string $secret_key="")
    {
        $this->api_key = $api_key;
        $this->secret_key = $secret_key;
    }

    private function getAPIKey(){
        return ($this->api_key == "") ? env("SECUREMYID_API_KEY") : $this->api_key;
    }



    private function getSecretKey(){
        return ($this->api_key == "") ? env("SECUREMYID_SECRETE_KEY") : $this->api_key;
    }


    
}