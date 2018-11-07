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
class RealDrink
{

    /**
     * @int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $ingredients;

    /**
     * @var int
     */
    private $type_id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return RealDrink
     */
    public function setId($id)
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
     * @return RealDrink
     */
    public function setName(string $name): RealDrink
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getIngredients(): string
    {
        return $this->ingredients;
    }

    /**
     * @param string $ingredients
     * @return RealDrink
     */
    public function setIngredients(string $ingredients): RealDrink
    {
        $this->ingredients = $ingredients;
        return $this;
    }

    /**
     * @return int
     */
    public function getTypeId(): int
    {
        return $this->type_id;
    }

    /**
     * @param int $type_id
     * @return RealDrink
     */
    public function setTypeId(int $type_id): RealDrink
    {
        $this->type_id = $type_id;
        return $this;
    }
}
