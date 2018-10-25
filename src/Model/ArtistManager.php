<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 07/03/18
 * Time: 18:20
 * PHP version 7
 */
namespace Model;

/**
 *
 */
class ArtistManager extends AbstractManager
{
    /**
     *
     */
    const TABLE = 'artist';
    /**
     *  Initializes this class.
     */
    public function __construct(\PDO $pdo)
    {
        parent::__construct(self::TABLE, $pdo);
    }
}

