<?php

namespace vladdlviv\yaisdk;

class yaisdkLike  extends \vladdlviv\yaisdk\yaisdkBase {

    public function __construct($access_token, $client_id, \vladdlviv\yaisdk\httpClient\httpClientInterface $client = null)
    {
        parent::__construct($access_token, $client_id, $client);
    }

    public function getLikes($id) {
        return $this->call->getLikes($id);
    }

    public function postLike($id) {
        return $this->call->postLike($id);
    }

    public function deleteLike($id) {
        return $this->call->deleteLike($id);
    }

}