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
        $statement = $this->pdo->prepare("INSERT INTO $this->table (`title`, `comment`,`date`) VALUES (:title,:comment, :date)");
        $statement->bindValue('title', $event->getTitle(), \PDO::PARAM_STR);
        $statement->bindValue('comment', $event->getComment(), \PDO::PARAM_STR);
        $statement->bindValue('date', $event->getDate());


        if ($statement->execute()) {
            return $this->pdo->lastInsertId();
        }
    }


    /**
     * @param int $id
     */
    public function delete(int $id): void
    {
        // prepared request
        $statement = $this->pdo->prepare("DELETE FROM $this->table WHERE id=:id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();
    }


    /**
     * @param Event $event
     * @return int
     */
    public function update(Event $event): int
    {

        // prepared request
        $statement = $this->pdo->prepare("UPDATE $this->table SET `title` = :title WHERE id=:id");
        $statement->bindValue('id', $event->getId(), \PDO::PARAM_INT);
        $statement->bindValue('title', $event->getTitle(), \PDO::PARAM_STR);


        return $statement->execute();
    }
}
