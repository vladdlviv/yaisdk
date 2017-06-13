<?php

namespace vladdlviv\yaisdk\httpClient;

use vladdlviv\yaisdk\Exception\yaisdkException;

class httpClientMiddleware {

    private $client;
    private $response;

    public function __construct($client) {
        $this->client = $client;
    }

    private function _makeRequest($method, $url, $data = null) {
        return $this->_checkResponse( $this->client->$method($url, $data) );
    }

    public function getErrorMessage() {
        if(isset($this->response->error_message))
            return $this->response->error_message;
        if(isset($this->response->meta->error_message))
            return $this->response->meta->error_message;
    }

    public function getErrorType() {
        if(isset($this->response->error_type))
            return $this->response->error_type;
        if(isset($this->response->meta->error_type))
            return $this->response->meta->error_type;
    }

    public function getErrorCode() {
        if(isset($this->response->code))
            return $this->response->code;
        if(isset($this->response->meta->code))
            return $this->response->meta->code;
    }

    private function _checkResponse($raw) {
        $this->response = json_decode($raw);
        if($this->response instanceof \StdClass && !isset( $this->response->meta->error_type ) &&
            !isset( $this->response->error_type ) ) {
            return $this->response;
        } else {
            throw new yaisdkException($this->getErrorMessage(), $this->getErrorCode(), $this->getErrorType());
        }
    }

    public function getAccessToken( $data = null) {
        return $this->_makeRequest('post', \vladdlviv\yaisdk\yaisdkBase::_OAUTH_TOKEN_URL, $data);
    }



}
