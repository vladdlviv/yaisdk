<?php

namespace vladdlviv\yaisdk;

class yaisdkMedia  extends \vladdlviv\yaisdk\yaisdkBase {

    public function __construct($access_token, $client_id, \vladdlviv\yaisdk\httpClient\httpClientInterface $client = null)
    {
        parent::__construct($access_token, $client_id, $client);
    }

    public function getUsersMedia($user_id = 'self') {
        return $this->call->getUsersMedia($user_id);
    }

    public function getMedia($id) {
        return $this->call->getMedia($id);
    }

    public function getMediaByShortcode($id) {
        return $this->call->getMediaByShortcode($id);
    }

    public function getMediaByArea($params) {
        return $this->call->getMediaByArea($params);
    }


}