<?php
/**
 * Created by PhpStorm.
 * User: wilder16
 * Date: 17/10/18
 * Time: 06:56
 */

namespace Model;

/**
 * Class DrinkManager
 * @package Model
 */
class RealDrinkManager extends AbstractManager
{
    const TABLE = 'drink';


    /**
     * DrinkManager constructor.
     * @param \PDO $pdo
     */
    public function __construct(\PDO $pdo)
    {
        parent::__construct(self::TABLE, $pdo);
    }

    public function insert(RealDrink $drink)
    {
        // prepared request
        $statement = $this->pdo->prepare("INSERT INTO $this->table (name, ingredients, type_id) VALUES (:name, :ingredients, :type_id)");
        $statement->bindValue('name', $drink->getName(), \PDO::PARAM_STR);
        $statement->bindValue('ingredients', $drink->getIngredients(), \PDO::PARAM_STR);
        $statement->bindValue('type_id', $drink->getTypeId(), \PDO::PARAM_INT);

        if ($statement->execute()) {
            return $this->pdo->lastInsertId();
        }
    }
}
