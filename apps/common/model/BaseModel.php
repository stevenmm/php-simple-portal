<?php
/**
 * author: steven
 * date: 4/22/17 1:06 AM
 */

namespace Portal\Common\Model;

class BaseModel
{
    /** @var array */
    private $scripts;
    /** @var string */
    private $content;

    /**
     * BaseModel constructor.
     * @param array $params
     */
    public function __construct($params = [])
    {
        if (!empty($params)) {
            foreach ($params as $k => $v) {
                $this->{$k} = $v;
            }
        }
    }

    /**
     * @return array
     */
    public function getScripts()
    {
        return $this->scripts;
    }

    /**
     * @param array $scripts
     */
    public function setScripts($scripts)
    {
        $this->scripts = $scripts;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

}