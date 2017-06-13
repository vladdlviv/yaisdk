<?php


namespace vladdlviv\yaisdk\Exception;


class yaisdkException extends \Exception {

    public $type;

    public function __construct( $message = null, $code = 0, $type = null, \Exception $previous = null ) {
        $this->type = $type;
        parent::__construct( $message, $code, $previous );
    }


}