<?php
/* ############################################################################
          ================== sia blockchain v.1.1 ================== 
   ############################################################################
                Update Released 12 Januari 2022 / Yogyakarta, Indonesia
                            Written by LGH Khun
                             lghkhun@gmail.com  
                 https://github.com/lghkhun/sia-blockchain
                        OPEN SOURCE & FREE LICENSE    
                  YOU CAN USE THIS FRAMEWORK FOR EVERYTHING 
  ############################################################################
*/

// Check Session db access if is not SET then exit 
! isset($_SESSION["DB_ACCESS"]) ? exit('403 You dont have permission to access / on this server.') :false;


//  Check Session public access if is not SET then exit
! isset($_SESSION["public_access"]) ? exit("403 You dont have permission to access / on this server.") :false;

class pdo{
  private $server   = "localhost";
  private $db       = "db_garudaFramework";
  private $user     = "root";
  private $pass     = "";
  
  private $dbh;
  private $error;
  private $qError;
  
  private $stmt;
  
  public function __construct()
  {
        //dsn for mysql
      $dsn = "mysql:host=".$this->server.";dbname=".$this->db;
      $options = array(
      PDO::ATTR_PERSISTENT    => true,
      PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION
      );

      try{
      $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
      }
      //catch any errors
      catch (PDOException $e){
      $this->error = $e->getMessage();
      }
  }

  public function testConnection()
  {
     try 
     {
      
        return new PDO("mysql:host=$this->server;dbname=$this->db", $this->user, $this->pass) ? true : false;
       
     } 
     catch (Exception $e) 
     {
       exit('Hi ! Something is wrong! GF failed connecting to server ! </br> 
        Check <font color="red">Server name, Database name, Username & Password</font> <> Type PDO Exception');
     }
      
   
  }
  public function connectDB()
  {
      //dsn for mysql
      $dsn = "mysql:host=".$this->server.";dbname=".$this->db;
      $options = array(
      PDO::ATTR_PERSISTENT    => true,
      PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION
      );

      try{
      $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
      }
      //catch any errors
      catch (PDOException $e){
      $this->error = $e->getMessage();
      }
  }
  
  public function query($query){
      $this->stmt = $this->dbh->prepare($query);
  }
  
  public function bind($param, $value, $type = null){
      if(is_null($type)){
          switch (true){
              case is_int($value):
                $type = PDO::PARAM_INT;
                break;
              case is_bool($value):
                  $type = PDO::PARAM_BOOL;
                  break;
              case is_null($value):
                  $type = PDO::PARAM_NULL;
                  break;
              default:
                  $type = PDO::PARAM_STR;
          }
      }
    $this->stmt->bindValue($param, $value, $type);
  }
  
  public function execute(){
      return $this->stmt->execute() ? TRUE : exit("Something is wrong with your Query");
  }
  
  public function resultset(){
      $this->execute();
      return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  
  public function single(){
      $this->execute();
      return $this->stmt->fetch(PDO::FETCH_ASSOC);
  }
  
  public function rowCount(){
      return $this->stmt->rowCount();
  }
  
  public function lastInsertId(){
      return $this->dbh->lastInsertId();
  }
  
  public function beginTransaction(){
      return $this->dbh->beginTransaction();
  }
  
  public function endTransaction(){
      return $this->dbh->commit();
  }
  
  public function cancelTransaction(){
      return $this->dbh->rollBack();
  }
  
  public function debugDumpParams(){
      return $this->stmt->debugDumpParams();
  }
  
  public function queryError(){
      $this->qError = $this->dbh->errorInfo();
      if(!is_null($qError[2])){
          echo $qError[2];
      }
  }
  
}
// end class myPDO


//$myPDO = new myPDO();

/*
* example insert multi data to mysql
*/
/*
$myPDO->beginTransaction();
$myPDO->query('insert into t_data(name,email,phone,address) VALUES(:name, :email, :phone, :address)');

$myPDO->bind(':name', 'Melissa');
$myPDO->bind(':email', 'melisa@gmail.com');
$myPDO->bind(':phone', '2323232');
$myPDO->bind(':address', 'New York');

$myPDO->execute();

$myPDO->bind(':name', 'Lamhot');
$myPDO->bind(':email', 'Lamhot@gmail.com');
$myPDO->bind(':phone', '23232323');
$myPDO->bind(':address', 'New York');

$myPDO->execute();

$myPDO->endTransaction();*/

// end of insert data

/*
* select single row
*/

/*$myPDO->query("SELECT name, email, phone,address FROM t_data WHERE name = :name");
$myPDO->bind(':name','lamhot');
$row = $myPDO->single();
echo '<pre>';
print_r($row);
echo '</pre>';*/

// end of select single row

/*
* Select multi data
*/

/*$myPDO->query('SELECT * FROM t_data');
$row = $myPDO->resultset();
echo '<pre>';
print_r($row);
echo '</pre>';
echo $myPDO->rowCount();*/

// end of select multi data


/*
* Delete data
*/
/*
$myPDO->query('delete from t_data where name=:name');

$myPDO->bind(':name', 'melissa');

$myPDO->execute();
*/
// end of select multi data


/*
* Update Data
*/
/*
$myPDO->query('update t_data set name=:name,email=:email,phone=:phone,address=:address where id=:id');

$myPDO->bind(':id', '213');
$myPDO->bind(':name', 'ganti');
$myPDO->bind(':email', 'ganti@yahoo.co.id');
$myPDO->bind(':phone', '23232');
$myPDO->bind(':address', 'Jambi');
$myPDO->execute();*/
// end of update data


/*$myPDO = new myPDO();

$con = $myPDO->connServerDB();
echo $con;*/

?>