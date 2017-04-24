<?php
/**
 * author: steven
 * date: 4/22/17 8:43 AM
 */

namespace Portal\Common\Library;

use Portal\Common\Middleware\Middleware;
use Portal\Common\Model\RouteModel;

class Router
{
    /** @var  RouteModel[] */
    private $routes = [];

    /**
     * Routing constructor.
     *
     * @param RouteModel[] $routes
     */
    public function __construct(array $routes = [])
    {
        $this->routes = $routes;
    }

    /**
     * @param RouteModel $route
     */
    public function addRoute($route)
    {
        if (is_array($this->getRoutes()) && $route) {
            $this->routes[] = $route;
        }
    }

    /**
     * @return RouteModel[]
     */
    public function getRoutes()
    {
        return $this->routes;
    }

    /**
     * @param RouteModel[] $routes
     */
    public function setRoutes($routes)
    {
        $this->routes = $routes;
    }

    public function execute()
    {
        $requestPath = $this->getRequestPath();

        if (!empty($requestPath) && !empty($this->getRoutes())) {
            foreach ($this->getRoutes() as $route) {
                if ($route->getPath() == $requestPath) {
                    if ($controller = $this->findAndInstantiate($route->getModule(), $route->getController())) {
                        if($route->getMiddleware() instanceof Middleware){
                            $route->getMiddleware()->run();
                        }
                        $actionMethod = $route->getAction() . 'Action';
                        /** @noinspection PhpUndefinedMethodInspection */
                        $controller->beforeDispatch();
                        $controller->{$actionMethod}();
                        /** @noinspection PhpUndefinedMethodInspection */
                        $controller->afterDispatch();
                    }
                    return;
                }
            }
        }

        $controller = $this->findAndInstantiate('error', 'index');
        /** @noinspection PhpUndefinedMethodInspection */
        $controller->show404NotFound();
    }

    /**
     * @param string $module
     * @param string $controller
     *
     * @return null | object
     */
    private function findAndInstantiate($module = '', $controller = '')
    {
        if ($module && $controller) {
            $controllerClassName = ucwords($controller) . 'Controller';
            $namespace           = 'Portal\\' . ucwords($module) . '\\Controller\\' . $controllerClassName;
            $controllerFileName  = $controllerClassName . '.php';
            $filename            = str_replace('/', DIRECTORY_SEPARATOR, APP_PATH . "/apps/{$module}/controller/{$controllerFileName}");

            if (file_exists($filename)) {
                //autoload
                return new $namespace();
            }
        }
        return null;
    }

    private function getRequestPath()
    {
        return @$_REQUEST['_url'] ? $_SERVER['REQUEST_URI'] ?: '/' : '/';
    }
}