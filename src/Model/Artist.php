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
    public function setId(int $id): int
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
    public function setName(string $name):string
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
    public function setLocal(string $local): string
    {
        $this->local = $local;
    }

    /**
     * @return mixed
     */
    public function getPicture(): string
    {
        return $this->picture;
    }

    /**
     * @param mixed $picture
     */
    public function setPicture(string $picture): string
    {
        $this->picture = $picture;
    }

    /**
     * @return mixed
     */
    public function getFavorite(): string
    {
        return $this->favorite;
    }

    /**
     * @param mixed $favorite
     */
    public function setFavorite(string $favorite): string
    {
        $this->favorite = $favorite;
    }
}

