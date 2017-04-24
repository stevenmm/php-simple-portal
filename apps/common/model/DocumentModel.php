<?php
/**
 * author: steven
 * date: 4/22/17 1:04 AM
 */

namespace Portal\Common\Model;

class DocumentModel
{
    /** @var HeaderModel */
    private $header;
    /** @var BodyModel */
    private $body;
    /** @var mixed */
    private $data;

    /**
     * @return HeaderModel
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * @param HeaderModel $header
     */
    public function setHeader($header)
    {
        $this->header = $header;
    }

    /**
     * @return BodyModel
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param BodyModel $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

}