<?php

namespace vladdlviv\yaisdk;

class yaisdkUser  extends \vladdlviv\yaisdk\yaisdkBase {

    public function __construct($access_token, $client_id, \vladdlviv\yaisdk\httpClient\httpClientInterface $client = null)
    {
        parent::__construct($access_token, $client_id, $client);
    }

    public function getUser($id) {
        return $this->call->getUser($id);
    }

    public function getUserByName($name) {
        return $this->call->getUserByName($name);
    }

    public function getUserFollows() {
        return $this->call->getUserFollows();
    }

    public function getUserFollowedBy() {
        return $this->call->getUserFollowedBy();
    }

    public function getUserRequestedBy() {
        return $this->call->getUserRequestedBy();
    }

}