<?php
/**
 * Database class
 */
class Database{

    private $connection;

    public function __construct()

    {$dbc = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);


        $this->connection = $dbc;
    }
    public function __destruct()
    {  $this->connection = null;

    }
    /*
     * Execute an SQL statement and return its results
     * @param  $sql
     * @param null $bindVal
     * $return bool\PDOStatement
     */
    public function sqlQuery($sql, $bindVal = null){
        $statement = $this->connection->prepare($sql);
        if (is_array($bindVal)){
            $statement->execute($bindVal);
        } else{
            $statement->execute();
        }
        return $statement;
    }
    public function fetchArray($sql, $bindVal= null){
        $result = $this->sqlQuery($sql,$bindVal);
        if ($result->rowCount()==0){
            return false;
        }else{
            return  $result->fetchAll(PDO::FETCH_ASSOC);
        }
    }
}
$dbc = new Database();





?>