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
! isset($_SESSION["DB_ACCESS"]) ? exit('403 You dont have permission to access / on this server.') :"";


//  Check Session public access if is not SET then exit
! isset($_SESSION["public_access"]) ? exit("403 You dont have permission to access / on this server.") : "";



class db{
 
    // database information
    private $server     = 'localhost';
    private $db         = 'db_example';   
    private $user       = 'root';
    private $password   = '';

    private $conn       =   false;


    // last id user 
    private $last_id = "";

    public function connectServer()
    {
        try {
            $con = new mysqli($this->server, $this->user, $this->password);
            return ($con -> connect_error) ? false && die("Something is Wrong, We Cannot Connecting To Server") : true;

        }catch (Exception $e){
             return ($this->fontRed($e." Something Is Wrong, We Cannot Connecting To Server !"));   
        }
    }

    function __construct()
    {
     
        if (! $this->connectDB()){
            exit("Something is wrong ! Cannot Connecting To Database Server");
        }
    }

    public function connectDB() { // connect to database and return mysqli
    
        try {
              $this->conn = $this->mysqli = new mysqli($this->server,$this->user,$this->password,$this->db);
              if ($this->conn != false)
              {
                return true;
              }
              else
              {
                return false;
              }
        } 
        catch (Exception $e) {
            $this->conn = false;
            return ($this->fontRed($e." Something Is Wrong, We Cannot Connecting Database !"));        
        }

       
    }

    public function selectData($sql){ // select data from table and return result 
       if ($this->conn != false )
        {
            $result = $this-> mysqli->query($sql);
            return ! $result  ? $this->showErrorQuery() && exit() : $result;
        }else { return false; }
    }

   

    private function showErrorQuery(){ // message wrong query
        echo '<strong>Something is wrong!<font color="red"> Please, check the QUERY !</font></strong>';
    }

    public function UpDelData($sql){ // function for delete and update data
        if ($this->conn != false )
        {
            $result = $this-> mysqli->query($sql);
            return ! $result  ? $this->showErrorQuery() && exit() : $result;    
        }
    }

    public function selectCount($sql){ // select data and return count 
        if ($this->conn != false )
        {
            $result = $this-> mysqli->query($sql);
            return ! $result  ? $this->showErrorQuery() && exit() : $result->num_rows;
        }
    }



    public function resetIdAuto($tblname){
       $query = "ALTER TABLE $tblname AUTO_INCREMENT = 1";

        if ($this->conn != false )
        {
          $result = $this->mysqli->query($query);
           return ! $result  ? $this->showErrorQuery() && exit() : $result; 
       }
    }

 
    // check column name 
    // and get id 
    public function checkGetId($column,$tblname,
                                $column1,$value1,
                                $column2=false,$value2=false,
                                $column3=false,$value3=false){

        $query_master = "";

        if (empty($column) || empty($tblname) || empty($column1) || empty($value1) )
        {
            exit($this->fontRed("Column PK and Tabel Name & Column 1 & Value 1 Cannot Be Empty"));
        }

        if ($column1 != false && $value1 != false 
             && $column2 ==false && $value2 == false
             && $column3 ==false && $value3 == false)
        {

           
            if (is_int($value1))
            {
                    $query_master = $this->
                    querySelect("$column","$tblname","$column1",$value1)." limit 1";

            }
            else
            {
                    $query_master = $this->
                    querySelect("$column","$tblname","$column1","$value1")." limit 1";

            }
           
        }
       else if ($column1 != false && $value1 != false 
                 && $column2!= false && $value2 != false
                 && $column3 ==false && $value3 == false ){
            
           
          if (is_int($value1) && is_int($value2))
            {
                    $query_master = $this->
                querySelect("$column","$tblname","$column1",$value1)." and $column2=$value2 limit 1";
            }
            else
            {
                    $query_master = $this->
                querySelect("$column","$tblname","$column1","$value1")." and $column2='$value2' limit 1";
            }
           
        }
        else if ($column1 != false && $value1 != false 
                 && $column2!= false && $value2 != false
                 && $column3 !=false && $value3 != false ){
            
            $query_master = $this->
        querySelect("$column","$tblname","$column1","$value1")." and $column2='$value2' and $column3='$value3' limit 1";

           
        }
        else
        { exit("Only 3 column !"); } 

        $count = $this->selectCount($query_master);

        if ($count>0)
        {
            $data_id                = $this->selectData($query_master);
            $data_id                = mysqli_fetch_array($data_id,MYSQLI_ASSOC);

    
            if ($data_id)
            {
                $this->last_id          = ($data_id[$column]);
                return true;
            }
            else
            {
                return false;
            }
            
        }
        else
        {
            return false;
        }
    

    }

     private function querySelect($primary_key,$tblname,$column,$value){
        if (is_int($value))
        {

             return "select $primary_key from $tblname where $column=$value";
        }
        else
        {
              return "select $primary_key from $tblname where $column='$value'";
        }
       
    }

    // Check Id Of Data
    public function checkId($column, $tblname,
                            $column1 , $value1,
                            $column2 = false, $value2 = false,
                            $column3 = false, $value3 = false,
                            $column4 = false, $value4 = false)
    {
        $query_master= "";

        if (empty($column) || empty($tblname) || empty($column1) || empty($value1))
        {
            exit($this->fontRed("Column PK and Tabel Name & Column 1 & Value 1 Cannot Be Empty"));
        }

        if ($column1 != false && $value1 != false 
            && $column2==false && $value2 == false
            && $column3 == false && $value3  == false
            && $column4 == false && $value4  == false ){

           
            if (is_int($value1))
            {
               $query_master = $this->querySelect("$column","$tblname","$column1",$value1)." limit 1";

            }
            else
            {
                $query_master = $this->querySelect("$column","$tblname","$column1","$value1")." limit 1";

            }
           
        }
        else if ($column1 != false && $value1 != false 
                && $column2 != false && $value2 != false
                && $column3 == false && $value3  == false
                  && $column4 == false && $value4  == false ){
        
            
            if (is_int($value1) && is_int($value2))
            {
                 $query_master = $this->querySelect("$column","$tblname","$column1",$value1)." and $column2=$value2 limit 1";
            }
            else
            {
               $query_master = $this->querySelect("$column","$tblname","$column1","$value1")." and $column2='$value2' limit 1";

            }
            
        }   
        else if ($column1 != false && $value1 != false 
                && $column2 != false && $value2 != false
                && $column3 != false && $value3  != false
                  && $column4 == false && $value4  == false ){
        
            $query_master = $this->
        querySelect("$column","$tblname","$column1","$value1")." and $column2='$value2' and $column3='$value3' limit 1";

            $count = $this->selectCount($query_master);

        }
         else if ($column1 != false && $value1 != false 
                && $column2 != false && $value2 != false
                && $column3 != false && $value3  != false
                  && $column4 !=  false && $value4  != false ){
        
            $query_master = $this->
        querySelect("$column","$tblname","$column1","$value1")." and $column2='$value2' and $column3='$value3' and $column4='$value4' limit 1";

            $count = $this->selectCount($query_master);

        }
        else
        { exit("Only 3 column !"); }   

        $count = $this->selectCount($query_master);

        if ($count>0)
        {
            
            return true;
        }
        else
        {
            return false;
        }

    }


    public function getId(){
        return $this->last_id;
    }





    // Method insert data
    // $tblname = Name of tabel
    // $column1 = Column 1
    // $value1 = Value of Colum 1
    // ..
    public function insert($tblname,$column1,$value1,
                                    $column2=false,$value2=false,
                                    $column3=false,$value3=false,
                                    $column4=false,$value4=false,
                                    $column5=false,$value5=false,
                                    $column6=false,$value6=false,
                                    $column7=false,$value7=false,
                                    $column8=false,$value8=false ){

         if (empty($tblname) || empty($column1) || empty($value1))
        {
            exit($this->fontRed("Tabel Name & Column 1 &  Value 1  Cannot Be Empty !"));
        }

        $query = "";

        $query_insert = "insert into $tblname($column1";

        // Column 1 Value 1
        if ($column2 == false && $value2==false 
            && $column3 == false && $value3 == false 
            && $column4 == false && $value4 == false 
            && $column5 == false && $value5 == false
            && $column6 == false && $value6 == false
            && $column7 == false && $value7 == false
            && $column8 == false && $value8 == false  ) {
 
         $query = $query_insert.") VALUES ('$value1')";

       
        }
         // Column 2 Value 2
        else if ($column2 != false && $value2 != false 
                && $column3 == false && $value3 == false 
                && $column4 == false && $value4 == false 
                && $column5 == false && $value5 == false
                && $column6 == false && $value6 == false
                && $column7 == false && $value7 == false
                && $column8 == false && $value8 == false ) {
 

        $query = $query_insert.",$column2) VALUES ('$value1','$value2')";

       
        }
         // Column 3 Value 3
       else if ($column2 != false && $value2 != false 
                && $column3 != false && $value3 != false 
                && $column4 == false && $value4 == false 
                && $column5 == false && $value5 == false
                && $column6 == false && $value6 == false
                && $column7 == false && $value7 == false
                && $column8 == false && $value8 == false) {
 

        $query = $query_insert.",$column2,$column3) VALUES ('$value1','$value2','$value3')";

        
        }
        // Column 4 Value 4
        else if ($column2 != false && $value2 != false 
                && $column3 != false && $value3 != false 
                && $column4 != false && $value4 != false 
                && $column5 == false && $value5 == false
                && $column6 == false && $value6 == false
                && $column7 == false && $value7 == false
                 && $column8 == false && $value8 == false) {

        $query = $query_insert.",$column2,$column3,$column4) VALUES ('$value1','$value2','$value3','$value4')";

        }
         // Column 5 Value 5
        else if ($column2 != false && $value2 != false 
                && $column3 != false && $value3 != false 
                && $column4 != false && $value4 != false 
                && $column5 != false && $value5 != false
                && $column6 == false && $value6 == false
                && $column7 == false && $value7 == false
                 && $column8 == false && $value8 == false) {
 

        $query = $query_insert.",$column2,$column3,$column4,$column5) 
                    VALUES ('$value1','$value2','$value3','$value4','$value5')";

        }
         // Column 6 Value 6
        else if ($column2 != false && $value2 != false 
                && $column3 != false && $value3 != false 
                && $column4 != false && $value4 != false 
                && $column5 != false && $value5 != false
                && $column6 != false && $value6 != false
                && $column7 == false && $value7 == false
                 && $column8 == false && $value8 == false) {
 

        $query = $query_insert.",$column2,$column3,$column4,$column5,$column6) 
                VALUES ('$value1','$value2','$value3','$value4','$value5','$value6')";

        }
         // Column 7 Value 7
         else if ($column2 != false && $value2 != false 
                && $column3 != false && $value3 != false 
                && $column4 != false && $value4 != false 
                && $column5 != false && $value5 != false
                && $column6 != false && $value6 != false
                && $column7 != false && $value7!= false
                && $column8 == false && $value8 == false) {
 

        $query = $query_insert.",$column2,$column3,$column4,$column5,$column6,$column7) 
                VALUES ('$value1','$value2','$value3','$value4','$value5','$value6','$value7')";

        }
         // Column 8 Value 8
         else if ($column2 != false && $value2 != false 
                && $column3 != false && $value3 != false 
                && $column4 != false && $value4 != false 
                && $column5 != false && $value5 != false
                && $column6 != false && $value6 != false
                && $column7 != false && $value7 != false
                && $column8 != false && $value8 != false) {
 

        $query = $query_insert.",$column2,$column3,$column4,$column5,$column6,$column7,$column8) 
                VALUES ('$value1','$value2','$value3','$value4','$value5','$value6','$value7','$value8')";

        }


        if ($this->conn != false )
        {   
             if (! empty($query)) 
            {
                $result = $this-> mysqli->query($query);
                return ! $result  ? $this->showErrorQuery() && exit() : true;   
            }
            else
            {
                return false;
            }  
        }

    }

    private function fontRed($str){
        return '<font color="red"><b> '.$str.' </b></font>';
    }


    // delete data
    // $column1 is primary key or Unique
    public function delete($tblname,$column1,$value1,
                                    $column2=false,$value2=false,
                                    $column3=false,$value3=false,
                                    $column4=false,$value4=false){

        if (empty($tblname) || empty($column1) || empty($value1))
        {
            exit($this->fontRed("Tabel Name & Column 1 &  Value 1  Cannot Be Empty !"));
        }

         $query_master = "";

        $query_delete = "delete from $tblname where $column1='$value1'";
        $query_count  = "select $column1 from $tblname where $column1='$value1'";
        // column 1 Value 1
        if ($column2 == false && $value2==false 
                && $column3 == false && $value3==false 
                && $column4 == false && $value4==false ) {

          
           $query_master = $query_delete;
           $query_check  = $query_count." limit 1";

        // column 2 Value 2
        }
        else if ($column2 != false && $value2 != false 
                    && $column3 == false && $value3 == false 
                    && $column4 == false && $value4 == false ) {
 
            if ($column1 == $column2)
            {
                exit($this->fontRed("Duplicat Column Name"));
            }
   
        $query_master =  $query_delete." and $column2='$value2'";
        $query_check  = $query_count." and $column2='$value2' limit 1";

        // column 3 Value 3
        }
         else if ($column2 != false && $value2 != false 
                    && $column3 != false && $value3 != false 
                    && $column4 == false && $value4 == false ) {
    
             if ($column1 == $column2 || $column2 == $column3 || $column1 == $column3)
            {
                exit($this->fontRed("Duplicat Column Name"));
            }

            $query_master =  $query_delete." and $column2='$value2' and $column3 ='$value3'"; 
            $query_check  = $query_count." and $column2='$value2' and $column3='$value3' limit 1";     
        }
        // column 4 Value 4
        else if ($column2 != false && $value2 != false 
                    && $column3 != false && $value3 != false 
                    && $column4 != false && $value4 != false) {
            
             if ($column1 == $column2 || $column2 == $column3 || $column1 == $column3 || $column1 == $column4 || $column2 == $column4 || $column3 == $column4)
            {
                exit($this->fontRed("Duplicat Column Name"));
            }

             $query_master =  $query_delete." and $column2='$value2' and $column3='$value3' and $column4 = '$value4'";
              $query_check  = $query_count." and $column2='$value2' and $column3='$value3' and $column4 = '$value4' limit 1";   
         
        }

        if ($this->conn != false )
        {     
            //  if query master and query check is not empty
            if (! empty($query_master) && !empty($query_check)) 
            {
                // check data first, before delete
                 $count = $this->selectCount($query_check);
                 // if data found 
                 if ($count>0)
                 {
                    // delete data
                    $result = $this->mysqli->query($query_master);
                    return ! $result  ? $this->showErrorQuery() && exit() : true;  
                 }
                 else
                 {
                    return false;
                 }
                
            }
            else
            {
                return false;
            }  
        }

    }
          
     public function update($tblname,$parameter1,$value_parameter1,
                                    $column1,$value1,
                                    $column2=false,$value2=false,
                                    $column3=false,$value3=false,
                                    $column4=false,$value4=false,
                                    $column5=false,$value5=false){

         if (empty($tblname) || empty($column1) || empty($value1) || empty($parameter1) || empty($value_parameter1))
        {
            exit($this->fontRed("Tabel Name & Column 1 &  Value 1 & Parameter1 & Value Paramater1  Cannot Be Empty !"));
        }


        $query_master = "";

        $query_update ="update $tblname set $column1='$value1'";



        if ($column2 == false && $value2==false 
            && $column3 == false && $value3== false 
            && $column4 == false && $value4 ==false 
             && $column5 == false && $value5 ==false) {
                    
            $query_master = $query_update." where $parameter1='$value_parameter1'";
        }
       else if ($column2 != false && $value2 !=  false 
                && $column3 == false && $value3 == false 
                && $column4 == false && $value4 == false
                 && $column5 == false && $value5 ==false) {

             $query_master = $query_update.",$column2='$value2' where $parameter1='$value_parameter1'";
        }
        else if ($column2 != false && $value2 !=  false 
                && $column3 != false && $value3 != false 
                && $column4 == false && $value4 == false
                 && $column5 == false && $value5 == false ) {

             $query_master = $query_update.",$column2='$value2', $column3='$value3' where $parameter1='$value_parameter1'";
        }
        else if ($column2 != false && $value2 !=  false 
                && $column3 != false && $value3 != false 
                && $column4 != false && $value4 != false
                && $column5 == false && $value5 == false) {

           $query_master = 
           $query_update.",$column2='$value2', $column3='$value3',$column4='$value4' where $parameter1='$value_parameter1'";
        }
         else if ($column2 != false && $value2 !=  false 
                && $column3 != false && $value3 != false 
                && $column4 != false && $value4 != false
                && $column5 != false && $value5 != false) {

           $query_master = 
           $query_update.",$column2='$value2', $column3='$value3',$column4='$value4',$column5='$value5' where $parameter1='$value_parameter1'";
        }

         if ($this->conn != false )
        {    
            //  if query master and query check is not empty
            if (! empty($query_master) ) 
            {
               
                $result = $this->mysqli->query($query_master);
                return ! $result  ? $this->showErrorQuery() && exit() : true;  
            
                
            }
            else
            {
                return false;
            }  
        }


    }      

}
