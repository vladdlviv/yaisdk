<?php

namespace vladdlviv\yaisdk;

class yaisdkBase {
    const _URL = 'https://api.instagram.com/v1/';
    const _OAUTH_URL = 'https://api.instagram.com/oauth/authorize';
    const _OAUTH_TOKEN_URL = 'https://api.instagram.com/oauth/access_token';

    protected $call;
    protected $access_token;
    protected $client_id;

    public function __construct($access_token = null, $client_id = null, \vladdlviv\yaisdk\httpClient\httpClientInterface $client = null)
    {
        $this->access_token = ($access_token) ? $access_token : $this->access_token;
        $this->client_id = ($client_id) ? $client_id : $this->client_id;
        $this->call = new \vladdlviv\yaisdk\httpClient\httpClientMiddleware(
            $this->access_token, $this->client_id, ($client) ? $client : new \vladdlviv\yaisdk\httpClient\httpClient
        );
    }

    //TODO move it!
    protected function redirect($url) {
        header('Location:'.$url);
    }
}