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
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var boolean
     */
    private $local;

    /**
     * @var string
     */
    private $picture;

    /**
     * @var boolean
     */
    private $favorite;


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return int
     */
    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return string
     */
    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getLocal(): bool
    {
        return $this->local;
    }

    /**
     * @param boolean $local
     */
    public function setLocal(bool $local)
    {
        $this->local = $local;
    }

    /**
     * @return string
     */
    public function getPicture(): string
    {
        return $this->picture;
    }

    /**
     * @param string $picture
     */
    public function setPicture(string $picture)
    {
        $this->picture = $picture;
    }

    /**
     * @return boolean
     */
    public function getFavorite(): bool
    {
        return $this->favorite;
    }

    /**
     * @param boolean $favorite
     */

    public function setFavorite(bool $favorite)
    {
        $this->favorite = $favorite;
    }
}
