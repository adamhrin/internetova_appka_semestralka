<?php

class User
{
    public $name;
    public $surname;
    public $email;
    public $nick;
    public $accepts;
    public $categories;
    public $id_user;

    /**
     * User constructor.
     * @param $name
     * @param $surname
     * @param $email
     * @param $nick
     */
    public function __construct($name, $surname, $email, $nick)
    {
        $this->categories = [];
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->nick = $nick;
    }

    public function setAccepts($accepts)
    {
        $this->accepts = $accepts;
    }

    public function addCategory($id_category)
    {
        $this->categories[] = $id_category;
    }

    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;
    }


}