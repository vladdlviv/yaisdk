<?php

namespace vladdlviv\yaisdk\httpClient;

interface httpClientInterface {

    function get( $url, array $data = null );
    function post( $url, array $data = null );
    function put( $url, array $data = null );
    function delete( $url, array $data = null );

}