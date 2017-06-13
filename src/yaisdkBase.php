<?php

namespace vladdlviv\yaisdk;

class yaisdkBase {
    const _URL = 'https://api.instagram.com/v1/';
    const _OAUTH_URL = 'https://api.instagram.com/oauth/authorize';
    const _OAUTH_TOKEN_URL = 'https://api.instagram.com/oauth/access_token';

    protected $call;

    public function __construct($access_token = null, \vladdlviv\yaisdk\httpClient\httpClientInterface $client = null)
    {
        $this->call = new \vladdlviv\yaisdk\httpClient\httpClientMiddleware(($client) ? $client : new \vladdlviv\yaisdk\httpClient\httpClient);
        var_dump($this);
    }

    //TODO move it!
    protected function redirect($url) {
        header('Location:'.$url);
    }
}