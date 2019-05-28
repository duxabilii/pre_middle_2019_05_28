<?php

namespace Classes;

use PDO;

/**
 * Class Db
 */
class Db
{
    const DB_HOST = 'localhost';
    const DB_USER = 'mysql';
    const DB_PASS = 'mysql123';
    const DB_NAME = 'pre_middle';
    /**
     * @var null
     */
    private static $instance = null;

    /**
     * @var PDO $DB
     */
    public static $DB;


    /**
     * @return Db|null
     */
    public static function getInstance()
    {
        if (null === self::$instance) {
            self::$instance = new self();

            self::$DB = new PDO('mysql:host=' . self::DB_HOST . ';dbname=' . self::DB_NAME,
                self::DB_USER, self::DB_PASS);
        }
        return self::$instance;
    }

    /**
     * Db constructor.
     */
    public function __construct()
    {
    }

    public function __clone()
    {
    }


    /**
     * @param string $query
     * @param array $params
     * @return mixed
     */
    public function query(string $query, array $params = [])
    {
        $stmt = self::$DB->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}