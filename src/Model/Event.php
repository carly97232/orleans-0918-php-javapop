<?php
/**
 * Created by PhpStorm.
 * User: patricia
 * Date: 11/10/18
 * Time: 10:58
 */

namespace Model;

class Event
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
     * @return Event
     */
    public function setId($id): Event
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
     * @return Event
     */
    public function setTitle($title):Event
    {
        $this->title = $title;

        return $this;
    }
}
