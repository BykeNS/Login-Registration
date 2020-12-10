<?php

class Database {

    protected $dbname = 'oop';
    protected $host = 'localhost'; 	    
    protected $dbuser = 'root'; 
    protected $dbpass = '';
    protected $db = null;
    protected $stmt;
   
    

    public function  connect()
    {
      
        try {

            $this->db = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->dbuser, $this->dbpass,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            return $this->db;
            echo "Connected successfully" . '<br>';

        } catch (PDOException $e) {
            throw new Exception($e->getMessage());

        }
       
}

    //prepare sql statement
//     public function query($query)
//     {
//         $this->stmt = $this->db->prepare($query);
//     }

//     //bind values
//     public function bind($param, $value, $type = null)
//     {
//         if (is_null($type)) {
//             switch (true) {
//                 case is_int($value):
//                     $type = PDO::PARAM_INT;
//                     break;
//                 case is_bool($value):
//                     $type = PDO::PARAM_BOOL;
//                     break;
//                 case is_null($value):
//                     $type = PDO::PARAM_NULL;
//                     break;
//                 default:
//                     $type = PDO::PARAM_STR;
//             }
//         }
//         $this->stmt->bindValue($param, $value, $type);
//     }

//     //execute query
//     public function execute()
//     {
//         return $this->stmt->execute();
//     }

//     //ALL records - result Set
//     public function resultSet()
//     {
//         $this->execute();
//         return $this->stmt->fetchAll(PDO::FETCH_OBJ);
//     }

//     //single record
//     public function single()
//     {
//         $this->execute();
//         return $this->stmt->fetch(PDO::FETCH_OBJ);
//     }

//     public function rowCount()
//     {
//         return $this->stmt->rowCount();
//     }

//     public function lastInsertId()
//     {
//         return $this->db->lastInsertId();
//     }

    
 }