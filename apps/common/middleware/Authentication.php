<?php
/**
 * author: steven
 * date: 4/24/17 10:10 AM
 */

namespace Portal\Common\Middleware;

class Authentication extends Middleware
{
    public function run()
    {
        echo 'authentication process checking injected';
        //@todo: check authentication status
    }
}