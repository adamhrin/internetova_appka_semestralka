<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 02.01.2018
 * Time: 20:58
 */

class Category
{
    public $id_category;
    public $title;
    public $users;

    /**
     * Category constructor.
     * @param $id_category
     * @param $title
     */
    public function __construct($id_category, $title)
    {
        $this->id_category = $id_category;
        $this->title = $title;
    }

    public function setUsers($users)
    {
        $this->users = $users;
    }
}