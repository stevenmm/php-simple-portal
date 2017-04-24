<?php
/**
 * author: steven
 * date: 4/22/17 8:40 AM
 */

namespace Portal\Common\Model;

use Portal\Common\Middleware\Middleware;

class RouteModel
{
    /** @var  string */
    private $path;
    /** @var  string */
    private $module;
    /** @var  string */
    private $controller;
    /** @var  string */
    private $action;
    /** @var  Middleware */
    private $middleware;

    /**
     * RouteModel constructor.
     * @param array $params
     */
    public function __construct($params = [])
    {
        if(!empty($params)){
            foreach ($params as $k => $v){
                $this->{$k} = $v;
            }
        }
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * @return string
     */
    public function getModule()
    {
        return $this->module;
    }

    /**
     * @param string $module
     */
    public function setModule($module)
    {
        $this->module = $module;
    }

    /**
     * @return string
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @param string $controller
     */
    public function setController($controller)
    {
        $this->controller = $controller;
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param string $action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }

    /**
     * @return Middleware
     */
    public function getMiddleware()
    {
        return $this->middleware;
    }

    /**
     * @param Middleware $middleware
     */
    public function setMiddleware($middleware)
    {
        $this->middleware = $middleware;
    }

}