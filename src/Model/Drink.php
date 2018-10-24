<?php
/**
 * Created by PhpStorm.
 * User: wilder16
 * Date: 17/10/18
 * Time: 06:37
 */

namespace Model;

class Drink
{
    private $id;

    private $title;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return Drink
     */
    public function setId($id) : Drink
    {
        $this->id = $id;

        return $this;
    }



    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title) : Drink
    {
        $this->title = $title;

        return $this;
    }
}
