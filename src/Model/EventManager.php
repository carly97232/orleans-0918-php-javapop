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

        $results= $this->pdo->query($query, \PDO::FETCH_ASSOC)->fetchAll();
        foreach ($results as $e) {
            $event=new Event();
            $event->setTitle($e['title']);
            $event->setDate(\DateTime::createFromFormat('Y-m-d', $e['date']));
            if (!empty($e['comment'])) {
                $event->setComment($e['comment']);
            }
            $events[]=$event;
        }
        return $events;
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
        $statement->bindValue('date', $event->getDate()->format("Y-m-d"));
        $statement->bindValue('comment', $event->getComment(), \PDO::PARAM_STR);

        if ($statement->execute()) {
            return $this->pdo->lastInsertId();
        }
    }

    /**
     * @return array
     */
    public function selectAll($field = '', $order = 'ASC') : array
    {
        $events=[];
        $query = 'SELECT * FROM ' . $this->table;
        if ($field) {
            $query .= ' ORDER BY ' . $field . ' ' . $order;
        }
        $results=$this->pdo->query($query, \PDO::FETCH_ASSOC)->fetchAll();


        foreach ($results as $e) {
            $event=new Event();
            $event->setTitle($e['title']);
            $event->setDate(\DateTime::createFromFormat('Y-m-d', $e['date']));
            if (!empty($e['comment'])) {
                $event->setComment($e['comment']);
            }
            $events[]=$event;
        }
        return $events;
    }
}
