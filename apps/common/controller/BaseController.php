<?php
/**
 * author: steven
 * date: 4/22/17 1:22 AM
 */

namespace Portal\Common\Controller;

use Portal\Common\Enum\RequestType;
use Portal\Common\Model\BodyModel;
use Portal\Common\Model\DocumentModel;
use Portal\Common\Model\HeaderModel;

abstract class BaseController
{
    /** @var DocumentModel */
    private static $documentInstance = null;

    /**
     * @param bool $reset
     *
     * @return DocumentModel
     */
    protected function getDocument($reset = false)
    {
        if (self::$documentInstance == null) {
            self::$documentInstance = new DocumentModel();
            //avoid two times reset when parameter are true
            !$reset AND $this->resetDocument();
        }

        $reset AND $this->resetDocument();

        return self::$documentInstance;
    }

    protected function resetDocument()
    {
        if (self::$documentInstance !== null) {
            self::$documentInstance->setHeader(new HeaderModel());
            self::$documentInstance->setBody(new BodyModel());
            self::$documentInstance->setData([]);
        } else {
            throw new \UnexpectedValueException("Document not instantiated yet!");
        }
    }

    /**
     * @param string $viewName
     */
    protected function render($viewName = 'index')
    {
        $document = $this->getDocument();
        ob_start();
        include $this->getViewDir() . "{$viewName}.php";
        $content = ob_get_clean();
        $document->getBody()->setContent($content);
        /** @noinspection PhpIncludeInspection */
        include $this->getLayoutDir() . "layout.php";
    }

    /**
     * @return string
     */
    protected function getLayoutDir()
    {
        return __DIR__ . '/../view/';
    }

    /**
     * @return int
     */
    protected function getRequestType(){
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            return RequestType::AJAX;
        } else {
            return RequestType::REGULAR;
        }
    }

    /**
     * @return string
     */
    protected function getRequestMethod(){
        return $_SERVER['REQUEST_METHOD'];
    }

    public function beforeDispatch(){
        //add process here to handle request before dispatch it into controller
    }

    public function afterDispatch(){
        //add process here to handle request after dispatch from controller execution
    }

    abstract function getViewDir();
}