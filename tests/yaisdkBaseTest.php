<?php

use vladdlviv\yaisdk\yaisdkBase;
use PHPUnit\Framework\TestCase;

class yaisdkBaseTest extends TestCase {

    public function testBase() {

        $base = new yaisdkBase();
        $this->assertInstanceOf(\vladdlviv\yaisdk\httpClient\httpClientMiddleware::class, $base->getCall());

    }

}