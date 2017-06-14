<?php

namespace vladdlviv\yaisdk\httpClient;

use vladdlviv\yaisdk\Exception\yaisdkException;

class httpClientMiddleware {

    private $client;
    private $access_token;
    private $client_id;
    private $response;

    public function __construct($access_token, $client_id, $client) {
        $this->client = $client;
        $this->client_id = $client_id;
        $this->access_token = $access_token;
    }

    private function _makeRequest($method, $url, $data = null) {
        $data = array_merge($data, ['access_token' => $this->access_token, 'client_id' => $this->client_id]);
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
//        var_dump($raw);
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

    public function getUser($id) {
        return $this->_makeRequest('get', \vladdlviv\yaisdk\yaisdkBase::_URL.'users/'.$id, array());
    }

    public function getUserByName($name) {
        return $this->_makeRequest('get', \vladdlviv\yaisdk\yaisdkBase::_URL.'users/search', ['q' => $name]);
    }

    public function getUserFollows() {
        return $this->_makeRequest('get', \vladdlviv\yaisdk\yaisdkBase::_URL.'users/self/follows', array());
    }

    public function getUserFollowedBy() {
        return $this->_makeRequest('get', \vladdlviv\yaisdk\yaisdkBase::_URL.'users/self/followed-by', array());
    }

    public function getUserRequestedBy() {
        return $this->_makeRequest('get', \vladdlviv\yaisdk\yaisdkBase::_URL.'users/self/requested-by', array());
    }

    public function getUsersMedia($user_id) {
        return $this->_makeRequest('get', \vladdlviv\yaisdk\yaisdkBase::_URL.'users/'.$user_id.'/media/recent', array());
    }

    public function getMedia($id) {
        return $this->_makeRequest('get', \vladdlviv\yaisdk\yaisdkBase::_URL.'media/'.$id, array());
    }

    public function getMediaByShortcode($id) {
        return $this->_makeRequest('get', \vladdlviv\yaisdk\yaisdkBase::_URL.'media/shortcode/'.$id, array());
    }

    public function getMediaByArea($params) {
        return $this->_makeRequest('get', \vladdlviv\yaisdk\yaisdkBase::_URL.'media/search', $params);
    }

}
