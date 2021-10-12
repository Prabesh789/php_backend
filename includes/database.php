<?php

define('HOST', 'localhost');
define('USER_NAME', 'root');
define('PASSWORD', '');
define('DB_NAME', 'better_buys');

/**  start the db class */

class Database
{
    private $connection;

    /**   //CONSTRUCT FUNCTION RUNs open_db_connection(); AUTOMATICALLY */
    public function __construct()
    {
        $this->open_db_connection();
    }

    /**creating connections with db */
    public function open_db_connection()
    {
        $this->connection = mysqli_connect(HOST, USER_NAME, PASSWORD, DB_NAME);

        if (mysqli_connect_error()) {
            die('Connection Error: ' . mysqli_connect_error());
        }
    }
    /**Executing the SQL querry */
    public function query($sql)
    {
        $result = $this->connection->query($sql);

        if (!$result) {
            die('Query fails : ' . $sql);
        }

        return $result;
    }

    /**Featching the data from sql query result */

    public function fetch_array($result)
    {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $resultarray[] = $row;
            }
            return $resultarray;
        }
    }

    /**Fetching a single row data from sql querry */

    public function fetch_row($result)
    {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        }
    }

    /**Check proper format of data */

    public function escape_value($value)
    {
        $value = $this->connection->real_escape_string($value);
        return $value;
    }

    /**Close the conection with sql */


    public function close_connection()
    {
        $this->connection->close();
    }
}
$database = new Database();
