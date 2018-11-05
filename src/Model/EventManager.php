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

    public function update(Event $event):int
    {

        // prepared request
        $statement = $this->pdo->prepare("UPDATE $this->table 
                                                  SET `title` = :title, `date` = :date , `comment` = :comment 
                                                  WHERE id=:id");
        $statement->bindValue('id', $event->getId(), \PDO::PARAM_INT);
        $statement->bindValue('title', $event->getTitle(), \PDO::PARAM_STR);
        $statement->bindValue('date', $event->getDate()->format("Y-m-d H:i:s"), \PDO::PARAM_STR);
        $statement->bindValue('comment', $event->getComment(), \PDO::PARAM_STR);


        return $statement->execute();
    }
}
