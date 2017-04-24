<?php
/**
 * author: steven
 * date: 4/22/17 11:16 PM
 */

namespace Portal\Error\Controller;

use Portal\Common\Controller\BaseController;

class IndexController extends BaseController
{
    public function show404NotFound(){
        $this->render('404');
    }

    public function show403Forbidden(){
        $this->render('403');
    }

    function getViewDir()
    {
        return __DIR__ . "/../view/";
    }
}