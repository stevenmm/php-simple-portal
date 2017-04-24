<?php
/**
 * author: steven
 * date: 4/22/17 1:32 AM
 */

namespace Portal;

use Portal\Common\Library\Router;
use Portal\Common\Middleware\Authentication;
use Portal\Common\Model\RouteModel;

class Application
{
    public function run()
    {
        $router = new Router();

        $router->addRoute(new RouteModel([
            'path'       => '/',
            'module'     => 'dashboard',
            'controller' => 'index',
            'action'     => 'index',
            'middleware' => new Authentication()
        ]));

        $router->addRoute(new RouteModel([
            'path'       => '/auth',
            'module'     => 'auth',
            'controller' => 'index',
            'action'     => 'index'
        ]));

        $router->execute();
    }
}