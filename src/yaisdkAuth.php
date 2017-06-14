<?php

namespace vladdlviv\yaisdk;

use vladdlviv\yaisdk\Exception\yaisdkException;

class yaisdkAuth extends \vladdlviv\yaisdk\yaisdkBase {

    protected $config = array(
        'client_id'     => '',
        'client_secret' => '',
        'redirect_uri'  => '',
        'grant_type'    => 'authorization_code',
        'scope'         => array( 'basic' ),
        'display'       => ''
    );

    public function __construct(array $config, $access_token = null, \vladdlviv\yaisdk\httpClient\httpClientInterface $client = null)
    {
        $this->config = array_merge($this->config, $config);
        parent::__construct($access_token, $config['client_id'], $client);

    }

    public function getAuthCode() {

        $this->redirect(self::_OAUTH_URL.'/?client_id='.$this->config['client_id'].
            '&redirect_uri='.$this->config['redirect_uri'].'&response_type=code&scope='.
            implode('+', $this->config['scope']));

    }

    public function getAccessToken($authCode) {
        $post_data = array(
            'client_id'         => $this->config['client_id'],
            'client_secret'     => $this->config['client_secret'],
            'redirect_uri'      => $this->config['redirect_uri'],
            'grant_type'        => $this->config['grant_type'],
            'code'              => $authCode
        );
        $response = $this->call->getAccessToken( $post_data );

        if(isset($response->access_token))
            return $response->access_token;
        else
            throw new yaisdkException($this->call->getErrorMessage(), $this->call->getErrorCode(), $this->call->getErrorType());
    }

}