<?php
/**
 * Created by PhpStorm.
 * User: wilder16
 * Date: 17/10/18
 * Time: 06:37
 */

namespace Model;

/**
 * Class Drink
 * @package Model
 */
class Drink
{

    /**
     * @int
     */
    private $id;

    /**
     * @string
     */
    private $title;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }


    /**
     * @param int $id
     * @return Drink
     */
    public function setId(int $id) : Drink
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
     * @param string $title
     * @return Drink
     */
    public function setTitle(string $title) : Drink
    {
        $this->title = $title;

        return $this;
    }
}
