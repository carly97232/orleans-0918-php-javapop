<?php
/**
 * Created by PhpStorm.
 * User: amelie
 * Date: 12/10/18
 * Time: 10:38
 */

namespace Model;


class Form
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
     * @return Item
     */
    public function setId($id): Item
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     *
     * @return Item
     */
    public function setTitle($title):Item
    {
        $this->title = $title;

        return $this;
    }

}