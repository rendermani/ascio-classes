<?php 
namespace ascio\lib;
class Db {
    /**
     * @var \PDO $connection Database connection;
     */
    protected $connection; 
    protected $object;
    protected $idKey;
    protected $tableDef;
    protected $keys ="";
    public function __construct($object,$idKey)
    {
        $config = Ascio::getConfig()->db;
        $dsn = $config->dsn;
        $user = $config->user;
        $password = $config->password;
        $this->connection = new \PDO($dsn,$user,$password,[]);   
        $this->object = $object;
        $this->table = \str_replace("\\",get_class($object),"_"); 
        $this->idKey = $idKey;    
    }
    public function setTableDef (array $tableDef) {
        $this->tableDef = $tableDef;
    }
    public function setKeys (string $keys) {
        $this->keys = $keys;
    }
    public function writeObject() {
        $keys = [];
        $values = [];
        foreach(\get_class_methods($this->object) as $key => $method) {
            if(\strpos($method,"get")===0)  {
                $name = \preg_replace('/^(get)/','',$method);
                $get = "get".$name;
                $keys[] = $name;
                $values[] = '"'.$get().'"';
            }
            $query = '
                REPLACE INTO '.$this->table . 
                '('.\implode(', ',$keys) . ' 
                VALUES (' . \implode(', ',$values) .')';
               
            $statement = $this->connection->prepare($query);              
            $result = $statement->execute();
            if(!$result) {
                $message = \implode(". ",$this->connection->errorInfo());
                $exception = new DbException($this->connection->errorCode());
                $exception->setQuery($query);
                throw($exception);
            }
        }
    }
    /**
     * @param string $id The primary ID- OrderId or Handle
     * @param array $fields write these fields
     */
    public function update(string $id,array $fields) {
        $keys = [];
        $values = [];
        foreach(\get_class_methods($this->object) as $key => $method) {
            if(\strpos($method,"get")===0)  {
                $name = \preg_replace('/^(get)/','',$method);
                $get = "get".$name;
                if(in_array($name,$fields)) {

                }
                $keys[] = $name;
                $values[] = '"'.$get().'"';
            }
            $query = '
                REPLACE INTO '.$this->table . 
                '('.\implode(', ',$keys) . ' 
                VALUES (' . \implode(', ',$values) .')
                WHERE '.$this->idKey .' = "'.$id.'"';
               
            $statement = $this->connection->prepare($query);              
            $result = $statement->execute();
            if(!$result) {
                $message = \implode(". ",$this->connection->errorInfo());
                $exception = new DbException($this->connection->errorCode());
                $exception->setQuery($query);
                throw($exception);
            }
        }
    }
    public function readObject() {
        $idkey = $this->idKey;
        $query = 'SELECT * FROM '.$this->table. ' WHERE '.$this->idKey.' = "'.$this->object->$idkey.'"' ;
        $statement = $this->connection->prepare($query);              
        $result = $statement->execute();
        if($result) {
            $row = $statement->fetchObject();
            foreach(\get_class_methods($this->object) as $key => $method) {
                if(\strpos($method,"set")===0)  {
                    $name = \preg_replace('/^(set)/','',$method);                    
                    $this->object->$method($row->$name);
                }
            }
        } else {
            $message = \implode(". ",$this->connection->errorInfo());
            $exception = new DbException($this->connection->errorCode());
            $exception->setQuery($query);
            throw($exception);
        }
    }
    public function createTable() {
        $query = "CREATE TABLE ". $this->table ."("; 
        foreach(\get_class_methods($this->object) as $key => $method) {
            if(\strpos($method,"get")===0)  {
                $name = \preg_replace('/^(get)/','',$method);                    
                $type = $this->tableDef[$name] ? $this->tableDef[$name] : "VARCHAR 100";
                $query  = $name . $type. ",\n";
            }
        }
        $query .= "PRIMARY KEY (".$this->idKey.")\n".$this->keys.");";
        $statement = $this->connection->prepare($query);
        $result = $statement->execute();
        if(!$result)  {
            $message = \implode(". ",$this->connection->errorInfo());
            $exception = new DbException($this->connection->errorCode());
            $exception->setQuery($query);
            throw($exception);
        }
    }
    public function getConnection () : \PDO {
        return $this->connection;
    }

}
class DbException extends \Exception {
    protected $query; 
    protected $error; 
    
    public function setQuery($query) {
        $this->query = $query; 
    }
}
