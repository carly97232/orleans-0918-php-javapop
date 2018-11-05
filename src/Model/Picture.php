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
 * Class Picture
 *
 */
class Picture
{
    /**
     * @int
     */
    private $id;

    /**
     * @var
     */
    private $imgName;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return int
     */
    public function setId(int $id): int
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getImgName(): string
    {
        return $this->imgName;
    }

    /**
     * @param string $imgName
     */
    public function setImgName(string $imgName): void
    {
        $this->imgName = $imgName;
    }
}
