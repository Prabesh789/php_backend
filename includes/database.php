<?php

define('HOST', 'localhost');
define('USER_NAME', 'root');
define('PASSWORD', '');
define('DB_NAME', 'better_buys');

/**  start the db class */

class Database{
    private $connection;

    /**   //CONSTRUCT FUNCTION RUNs open_db_connection(); AUTOMATICALLY */
    function  __constructure(){
        $this->open_db_connection();
    }

    /**creating connections with db */
    public function open_db_connection(){
        $this-> connection = mysqli_connect(Host, USER_NAME, PASSWORD, DB_NAME);

        if(mysqli_connect_error()){
            die('connection Error: '. mysqli_connect_error());
        }
         echo "Connected successfully";
    }
 /**Executing the SQL querry */
    public function query($sql){
        $result = $this ->connection->query($sql);

        if(!$result){
            die('Query fails : '. $sql);
        }
        return $result;
    }

    /**Featching the data from sql query result */

    public function fetch_query($result){
        if($result -> num_rows > 0){
            while($row = $result-> fetch_assoc()){
                $result_array[]= $row;
            }
            return $result_array;
        }

    }

    /**Fetching a single row od data from aql querry */

    public function fetech_row($result){
        if($result-> num_row >0){
            return $result -> fetch_assoc();
        }
    }

    /**Check proper format of data */

    public function escape_value($value){
        return $this-> connection -> real_escape_string($value);
    }

    /**Close the conection with sql */

    public function close_connection(){
        $this->cnnection-> close();
    }
    
}
$database = new Database();