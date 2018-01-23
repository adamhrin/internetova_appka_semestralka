<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 02.01.2018
 * Time: 19:36
 */

class Training
{
    public $id_training;
    public $location;
    public $date_time;
    public $duration;
    public $categories;
    public $num_of_accepts;
    public $accept;

    /**
     * Training constructor.
     * @param $location
     * @param $date_time
     * @param $duration
     * @param $categories
     */
    public function __construct()
    {
    }

    public static function withCategories($location, $date_time, $duration, $categories)
    {
        $instance = new self();

        $instance->location = $location;
        $instance->date_time = $date_time;
        $instance->duration = $duration;
        $instance->categories = $categories;

        return $instance;
    }

    public static function withoutCategories($location, $date_time, $duration)
    {
        $instance = new self();

        $instance->location = $location;
        $instance->date_time = $date_time;
        $instance->duration = $duration;

        return $instance;
    }

    public function setId($id_training)
    {
        $this->id_training = $id_training;
    }

    public function setCategories($categories)
    {
        $this->categories = $categories;
    }

    public function setNumOfAccepts($num_of_accepts)
    {
        $this->num_of_accepts = $num_of_accepts;
    }
    public function setAccept($accept)
    {
        $this->accept = $accept;
    }
}