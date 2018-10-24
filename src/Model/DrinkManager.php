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
class DrinkManager extends AbstractManager
{
    /**
     *
     */
    const TABLE = 'drink_has_volume';


    /**
     * DrinkManager constructor.
     * @param \PDO $pdo
     */
    public function __construct(\PDO $pdo)
    {
        parent::__construct(self::TABLE, $pdo);
    }

    /**
     * @return array
     */
    public function selectAllDrink()
    {
        $stmt = $this->pdo->query("SELECT drink.name, drink.ingredients, dhv.prix,volume.volume, type.name as type_name
                                            FROM $this->table dhv
                                            JOIN drink ON drink.id = dhv.drink_id 
                                            JOIN type ON type.id=drink.type_id
                                            JOIN volume ON volume.id = dhv.volume_id");
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }
}
