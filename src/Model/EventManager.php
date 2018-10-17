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

}
