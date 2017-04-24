<?php
/**
 * author: steven
 * date: 4/22/17 1:21 AM
 */

namespace Portal\Dashboard\Controller;

use Portal\Common\Controller\BaseController;
use Portal\Dashboard\Model\DashboardModel;

class IndexController extends BaseController
{
    function indexAction()
    {
        $model = new DashboardModel();

        try {
            //read json config with format:
            //{
            //  <env>:[{
            //      title: <entity_title>,
            //      icon: <icon_url>,
            //      href: <link>
            //  }]
            //}
            if (file_exists(APP_PATH . '/resources/config.json')) {
                $model->setEntities(json_decode(file_get_contents(APP_PATH . '/resources/config.json'), true));
            } else {
                $model->setEntities(json_decode(file_get_contents(APP_PATH . '/resources/config.reference.json'), true));
            }

            $model->setGroups(array_keys($model->getEntities()));
        } catch (\Exception $exception) {
            $model->setEntities([]);
        }

        $this->getDocument()->setData($model);
        $this->getDocument()->getBody()->setScripts([
            '/js/dashboard.js'
        ]);

        $this->render('index');
    }

    function getViewDir()
    {
        return __DIR__ . "/../view/";
    }
}