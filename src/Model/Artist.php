<?php
/**
 * Created by PhpStorm.
 * User: wcs
 * Date: 23/10/17
 * Time: 10:57
 * PHP version 7
 */
namespace Model;
/**
 * Class ArtistAdmin
 *
 */
class Artist
{
    private $id;
    private $title;
    private $local;
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
     * @return Artist
     */
    public function setId($id): Artist
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
     * @return Artist
     */
    public function setTitle($title):Artist
    {
        $this->title = $title;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getLocal(): string
    {
        return $this->local;
    }
    /**
     * @param mixed $local
     */
    public function setLocal($local)
    {
        $this->local = $local;
    }
}