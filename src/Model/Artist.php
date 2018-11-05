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
     * @var string
     */
    private $local;
    /**
     * @var string
     */
    private $picture;
    /**
     * @var string
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
    public function setId(int $id): int
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
    public function setName(string $name):string
    {
        $this->name = $name;
        return $this;
    }
    /**
     * @return string
     */
    public function getLocal(): string
    {
        return $this->local;
    }
    /**
     * @param string $local
     */
    public function setLocal(string $local): string
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
    public function setPicture(string $picture): string
    {
        $this->picture = $picture;
    }

    /**
     * @return string
     */
    public function getFavorite(): string
    {
        return $this->favorite;
    }

    /**
     * @param string $favorite
     */
    public function setFavorite(string $favorite): string
    {
        $this->favorite = $favorite;
    }
}
