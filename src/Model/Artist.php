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
    private $name;
    private $local;
    private $picture;
    private $favorite;

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
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * @param mixed $name
     *
     * @return Artist
     */
    public function setName($name):Artist
    {
        $this->name = $name;
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

    /**
     * @return mixed
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @param mixed $picture
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

    /**
     * @return mixed
     */
    public function getFavorite()
    {
        return $this->favorite;
    }

    /**
     * @param mixed $favorite
     */
    public function setFavorite($favorite)
    {
        $this->favorite = $favorite;
    }
}
