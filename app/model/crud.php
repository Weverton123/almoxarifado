<?php

class Crud{
         private $dsn = 'mysql:dbname=testes;host=localhost';
         private $user = 'root';
         private $password = '123456';    
         public $handle;
            
    function __construct () {
    try {
        $dbh = new PDO( $this->dsn , $this->user , $this->password );
        $this->handle = $dbh;

        return $this->handle;
    }   
    catch ( PDOException $e ) {
        echo 'Connection failed: ' . $e->getMessage( ); return false;
    }
}

    function __destruct( ) {
        $this->handle = NULL;
    }   
   
    
}