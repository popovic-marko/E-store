<?php

class DBBroker
{
    private static $instance;
    /**
     * @var PDO
     */
    protected $pdo;

    /**
     * DBBroker constructor.
     * @param $pdo
     */
    public function __construct()
    {
        $this->connect();
    }


    private function connect()
    {
        if (is_null($this->pdo)) {
            try {
                $this->pdo = new PDO('mysql:host=localhost;dbname=store', 'root', '');
            } catch (\PDOException $ex) {
                throw $ex;
            } catch (\Exception $e) {
                throw $e;
            }
        }
    }

    private function disconnect()
    {
        $this->pdo = null;
    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new DBBroker();
            self::$instance->connect();
        }

        return self::$instance;
    }

    public function select($tableName, $attributes = '*', $condition = null, $orderBy = null, $limit = null)
    {
        $this->setNames();
        $query = 'SELECT '  . $attributes . ' FROM ' . $tableName;
        if ($condition != null) {
            $query .= ' WHERE ' . $condition;
        }
        if($orderBy != null) {
            $query .= ' ORDER BY ' . $orderBy;
        }
        if ($limit != null) {
            $query .= ' LIMIT ' . $limit;
        }
        $statement = $this->pdo->query($query);
        $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $resultSet;
    }

    public function insert($tableName, $paramArray)
    {
        $this->setNames();
        $query = 'INSERT INTO ' . $tableName . ' (id, ' . implode(', ', array_keys($paramArray)) . ')' . ' VALUES (0, ';
        $valuesArray = array_values($paramArray);
        for ($i = 0; $i < sizeof($paramArray); $i++) {
            if(is_string($valuesArray[$i])) {
                $query .= "'" . $valuesArray[$i] . "'";
            } else {
                $query .= $valuesArray[$i];
            }

            if ($i != sizeof($paramArray)-1) {
                $query .= ', ';
            }
        }
        $query .= ')';

        //statement ce ovde biti FALSE ako nije moguce izvrsiti upit
        $statement = $this->pdo->query($query);
       // $statement->execute();
    }

    public function delete($tableName, $condition)
    {
        $this->setNames();
        $query = 'DELETE FROM ' . $tableName . ' WHERE ' . $condition;

        //statement ce ovde biti FALSE ako nije moguce izvrsiti upit
        $statement = $this->pdo->query($query);
        //$statement->execute();
    }

    public function update($tableName, $setPart, $condition=null)
    {
        $this->setNames();
        $query = 'UPDATE ' . $tableName . ' SET ' . $setPart;
        if($condition != null) {
            $query .= ' WHERE ' . $condition;
        }

        $statement = $this->pdo->query($query);
        //$statement->execute();
    }

    private function setNames()
    {
        $this->pdo->query("SET NAMES utf8");
    }
}