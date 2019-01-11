<?php
/**
 * Created by PhpStorm.
 * User: nico
 * Date: 07/11/18
 * Time: 14:35
 */

namespace Model;

class Volume
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $volume;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Volume
     */
    public function setId(int $id): Volume
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getVolume(): string
    {
        return $this->volume;
    }

    /**
     * @param string $volume
     * @return Volume
     */
    public function setVolume(string $volume): Volume
    {
        $this->volume = $volume;
        return $this;
    }
}
