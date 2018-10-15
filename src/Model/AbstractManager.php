<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 07/03/18
 * Time: 20:52
 * PHP version 7
 */

namespace Model;

/**
 * Abstract class handling default manager.
 */
abstract class AbstractManager
{
    /**
     * @var \PDO
     */
    protected $pdo; //variable de connexion

    /**
     * @var string
     */
    protected $table;
    /**
     * @var string
     */
    protected $className;


    /**
     * Initializes Manager Abstract class.
     * @param string $table
     * @param PDO $pdo
     */
    public function __construct(string $table, \PDO $pdo)
    {
        $this->table = $table;
        $this->className = __NAMESPACE__ . '\\' . ucfirst($table);
        $this->pdo = $pdo;
    }

    /**
     * Get all row from database.
     *
     * @return array
     */
    public function selectAll($field = '', $order = 'ASC'): array
    {
        $query = 'SELECT * FROM ' . $this->table;
        if ($field) {
            $query .= ' ORDER BY ' . $field . ' ' . $order;
        }
        return $this->pdo->query($query, \PDO::FETCH_CLASS, $this->className)->fetchAll();
    }
}
