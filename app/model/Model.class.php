<?php


class Model {
    public $parameters;
    public $stmpQuery;
    
    function __construct($db){
        $this->parameters = array();
        try{
            $this->db = $db;
        }catch(PDOException $e){
            exit("No se pudo conectar a la base de datos, error: $e");
        }
    }

    public function init($query,$parameters=""){
        try{
            $this->smtpQuery = $this->db->prepare($query);

            $this->bindMore($parameters);

            if (!empty($this->parameters)) {
                foreach ($this->parameters as $param => $value) {
                    if(is_int($value[1])) {
                        $type = PDO::PARAM_INT;
                    } else if(is_bool($value[1])) {
                        $type = PDO::PARAM_BOOL;
                    } else if(is_null($value[1])) {
                        $type = PDO::PARAM_NULL;
                    } else {
                        $type = PDO::PARAM_STR;
                    }
                    // Add type when binding the values to the column
                    $this->smtpQuery->bindValue($value[0], $value[1], $type);
                }
            }
            
            # Execute SQL 
            $this->smtpQuery->execute();
        }catch(PDOException $e){
            echo $e;
        }
        

        # Reset parameters
        $this->parameters = array();
    }

    public function bindMore($paramsArray){
        if (empty($this->parameters) && is_array($paramsArray)) {
            $columns = array_keys($paramsArray);
            foreach ($columns as $i => &$column) {
                $this->bind($column, $paramsArray[$column]);
            }
        }
    }
    public function bind($para, $value){
        $this->parameters[sizeof($this->parameters)] = [":" . $para , $value];
    }

    public function query($query, $params = null, $fetchmode = PDO::FETCH_ASSOC)
    {
        $query = trim(str_replace("\r", " ", $query));
        
        $this->init($query, $params);
        
        $rawStatement = explode(" ", preg_replace("/\s+|\t+|\n+/", " ", $query));
        
        # Which SQL statement is used 
        $statement = strtolower($rawStatement[0]);
        
        if ($statement === 'select' || $statement === 'show') {
            return $this->smtpQuery->fetchAll($fetchmode);
        } elseif ($statement === 'insert' || $statement === 'update' || $statement === 'delete') {
            return $this->smtpQuery->rowCount();
        } else {
            return NULL;
        }
    }

    public function lastInsertId()
    {
        return $this->db->lastInsertId();
    }

}
  




?>