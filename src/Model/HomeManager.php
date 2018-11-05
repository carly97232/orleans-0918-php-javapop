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
}
