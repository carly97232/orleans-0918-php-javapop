<?php
/**
 * Created by PhpStorm.
 * User: patricia
 * Date: 02/11/18
 * Time: 21:36
 */

namespace Model;

class HomeManager extends AbstractManager
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

    public function selectClosedEvent()
    {
        $query = 'SELECT * FROM ' . $this->table .' WHERE date>NOW()
                                                  ORDER BY date ASC
                                                  LIMIT 3 ';

        return $this->pdo->query($query, \PDO::FETCH_ASSOC)->fetchAll();
    }
}
