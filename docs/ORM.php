<?php
//include configuration file
require 'appconf.php';

class ORM {

    static $conn;
    private $dbconn;
    protected $table;
    protected $table1;

    static function getInstance(){
        if(self::$conn == null){
            self::$conn = new ORM();
        }
        return self::$conn;
    }
    
    protected function __construct(){    
        extract($GLOBALS['conf']);
        $this->dbconn = new mysqli($host, $username, $password, $database);
    }
        
    function getConnection(){
        return $this->dbconn;
    }
    
    function setTable($table){
        $this->table = $table;
    }

    function setTable1($table12){
        $this->table1 = $table12;
    }

     function insert($data){
        $query = "insert into $this->table set ";
        foreach ($data as $col => $value) {
            $query .= $col."= '".$value."', ";   
        }
        $query[strlen($query)-2]=" ";


        //echo "g ====> ".$query;
        $state = $this->dbconn->query($query);
        if(! $state){
            return $this->dbconn->error;
        }
        
        return $this->dbconn->affected_rows;   
    }
    
    function selectAll(){
      $users = array();
    	$query = "select * from $this->table";
    	$result = mysqli_query($this->dbconn,$query);
        if(! $result){
            return $this->dbconn->error;
        }
        
        for($i=0; $i < $this->dbconn->affected_rows ; $i++){
        	$row = mysqli_fetch_assoc($result);
		//$user = array_values($row);
		$users[]=$row; 
        } 

        if ($users == NULL) {
            return "fadyyyy";
        }else {
          return $users;
        }
        
    
    }



    function selectwhere($key,$id){
      $users = array();
    	$query = "select * from $this->table where $key=";
        $query .= "'".$id."';";
    	$result = mysqli_query($this->dbconn,$query);
        if(! $result){
            return $this->dbconn->error;
        }
        
        for($i=0; $i < $this->dbconn->affected_rows ; $i++){
        	$row = mysqli_fetch_assoc($result);
		
		$users[]=$row; 
        } 
        return $users;
    
    }



    


   function delete($key ,$id){
        $query = "delete from $this->table where $key=";
       
            $query .=$id.';';   
       
        $state = $this->dbconn->query($query);
       
        return $state;   
    }



     function update($data,$id)
     {
         $query = "update $this->table set ";
         foreach ($data as $col => $value) {
             $query .= $col."= '".$value."', ";
         }
          $query[strlen($query)-2]=" ";
          $query.='where id='.$id.';';

          
          $state = $this->dbconn->query($query);
          if(! $state){ 
            return $this->dbconn->error;
         }
        return $query;
     }

 }


