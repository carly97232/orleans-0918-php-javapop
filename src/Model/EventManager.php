<?php
/**
 * Created by PhpStorm.
 * User: patricia
 * Date: 11/10/18
 * Time: 11:00
 */

namespace Model;

class EventManager extends AbstractManager
{

    /**
     *
     */
    const TABLE = 'event';

    /**
     *  Initializes this class.
     */
    public function __construct(\PDO $pdo)
    {
        parent::__construct(self::TABLE, $pdo);
    }


    public function selectNextEvent()
    {
        $query = 'SELECT * FROM ' . $this->table .' WHERE date>NOW()
                                                  ORDER BY date ASC
                                                  LIMIT 3 ';

        return $this->pdo->query($query, \PDO::FETCH_ASSOC)->fetchAll();
    }
}
