<?php
/**
 * author: steven
 * date: 4/22/17 12:58 AM
 */

namespace Portal\Dashboard\Model;

class DashboardModel {
    /** @var  array */
    private $entities;
    /** @var  array */
    private $groups;
    /** @var  array */
    private $menus;
    /** @var  array */
    private $fragments;

    /**
     * @return array
     */
    public function getEntities()
    {
        return $this->entities;
    }

    /**
     * @param array $entities
     */
    public function setEntities($entities)
    {
        $this->entities = $entities;
    }

    /**
     * @return array
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * @param array $groups
     */
    public function setGroups($groups)
    {
        $this->groups = $groups;
    }

    /**
     * @return array
     */
    public function getMenus()
    {
        return $this->menus;
    }

    /**
     * @param array $menus
     */
    public function setMenus($menus)
    {
        $this->menus = $menus;
    }

    /**
     * @return array
     */
    public function getFragments()
    {
        return $this->fragments;
    }

    /**
     * @param array $fragments
     */
    public function setFragments($fragments)
    {
        $this->fragments = $fragments;
    }

}