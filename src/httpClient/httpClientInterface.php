<?php

namespace vladdlviv\yaisdk\httpClient;

interface httpClientInterface {

    function get( $url, $data = [] );
    function post( $url, array $data = null );
    function put( $url, array $data = null );
    function delete( $url, array $data = null );

}