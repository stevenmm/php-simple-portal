<?php
/**
 * author: steven
 * date: 4/22/17 1:05 AM
 */

namespace Portal\Common\Model;

class HeaderModel extends BaseModel {
    /** @var  string */
    private $title;
    /** @var array */
    private $stylesheets;
    /** @var array */
    private $metas;

    /**
     * Header constructor.
     * @param array $params
     */
    public function __construct($params = [])
    {
        parent::__construct($params);

        if (!empty($params)) {
            foreach ($params as $k => $v) {
                $this->{$k} = $v;
            }
        }
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return array
     */
    public function getStylesheets()
    {
        return $this->stylesheets;
    }

    /**
     * @param array $stylesheets
     */
    public function setStylesheets($stylesheets)
    {
        $this->stylesheets = $stylesheets;
    }

    /**
     * @return array
     */
    public function getMetas()
    {
        return $this->metas;
    }

    /**
     * @param array $metas
     */
    public function setMetas($metas)
    {
        $this->metas = $metas;
    }
}