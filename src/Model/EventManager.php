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

    /**
     * @param Event $event
     * @return int
     */
    public function insert(Event $event): int
    {
        // prepared request
        $statement = $this->pdo->prepare("INSERT INTO $this->table (`title`,`date`,`comment`) 
                                                   VALUES (:title, :date, :comment)");
        $statement->bindValue('title', $event->getTitle(), \PDO::PARAM_STR);
        $statement->bindValue('date', $event->getDate());
        $statement->bindValue('comment', $event->getComment(), \PDO::PARAM_STR);

        if ($statement->execute()) {
            return $this->pdo->lastInsertId();
        }
    }
}
