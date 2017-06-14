<?php

use vladdlviv\yaisdk\yaisdkUser;
use PHPUnit\Framework\TestCase;

class yaisdkUserTest extends TestCase {

    protected $access_token = '3938463407.54661a0.e6a03d3473ac40f089a75936429ed710';
    protected $client_id = '54661a068271417c8d139e5840ba381c';
    protected $user_id = '3938463407';

    public function testUser() {

        $user = new yaisdkUser($this->access_token, $this->client_id);
        $this->assertInstanceOf(\vladdlviv\yaisdk\yaisdkUser::class, $user);
        $getUser = $user->getUser($this->user_id);
        $getUser = json_decode(json_encode($getUser), true);
        $this->assertContains($this->user_id, $getUser['data']);
        
    }

}