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
class DrinkVolume
{

    /**
     * @var int
     */
    private $drink_id;

    /**
     * @var int
     */
    private $volume_id;

    /**
     * @var float
     */
    private $prix;

    /**
     * @return int
     */
    public function getDrinkId(): int
    {
        return $this->drink_id;
    }

    /**
     * @param int $drink_id
     * @return DrinkVolume
     */
    public function setDrinkId(int $drink_id): DrinkVolume
    {
        $this->drink_id = $drink_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getVolumeId(): int
    {
        return $this->volume_id;
    }

    /**
     * @param int $volume_id
     * @return DrinkVolume
     */
    public function setVolumeId(int $volume_id): DrinkVolume
    {
        $this->volume_id = $volume_id;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrix(): float
    {
        return $this->prix;
    }

    /**
     * @param float $prix
     * @return DrinkVolume
     */
    public function setPrix(float $prix): DrinkVolume
    {
        $this->prix = $prix;
        return $this;
    }
}
