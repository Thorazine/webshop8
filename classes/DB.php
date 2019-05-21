<?php

class DB {

    $variable = 'bla';

    private $dbhost = 'localhost';
    private $dbname = 'webshop8b';
    private $dbuser = 'root';
    private $dbpass = 'root';
    private $connection = null;


    /**
     * Connects to the database
     */
    public function __construct()
    {

        try {
            $this->connection = new PDO('mysql:host=' . $this->dbhost . ';dbname=' . $this->dbname, $this->dbuser, $this->dbpass);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // echo 'Joepie!';
        }
        catch(PDOException $e) {
            echo 'Whoops, foutje';
        }
    }

    /**
     * Finds all records and returns the data
     * @param  string $query     The query you want to run
     * @param  array  $variables Variables you want to change in the query with PDO
     * @return array            Database data
     */
    public function get($query, $variables = [])
    {
        $data = $this->connection->prepare($query);

        try {
            $data->execute($variables);
            $data->setFetchMode(PDO::FETCH_ASSOC);
            $data = $data->fetchAll();

            return $data;
        }
        catch(PDOException $e) {
            echo 'Whoops, query mislukt';
        }
    }

    /**
     * Finds one record and returns the data
     * @param  string $query     The query you want to run
     * @param  array  $variables Variables you want to change in the query with PDO
     * @return array            Database data
     */
    public function find($query, $variables = [])
    {
        $data = $this->connection->prepare($query);

        try {
            $data->execute($variables);
            $data->setFetchMode(PDO::FETCH_ASSOC);
            $data = $data->fetch();

            return $data;
        }
        catch(PDOException $e) {
            echo 'Whoops, query mislukt';
        }
    }
}
