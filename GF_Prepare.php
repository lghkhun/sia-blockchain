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

// Check constant __MYSQLI__ &  __PDO__ if already set then SKIP
// if not then create constant for __MYSQLI__ &  __PDO__
! defined("__MYSQLI__") ? define("__MYSQLI__", "mysqli", TRUE) : false;
! defined("__PDO__") ? define("__PDO__", "pdo", TRUE) : false;

class GF_Prepare
{
      public 		   $extension_name         = ".php";

      public 		   $_GF_Controller_Name    = "GF_Controller";
      public       $GF_Prepare_File        = "GF_Prepare";


      public 		   $cookie_lang            = "language-Garuda-Framework" ; // set name of cookie language-Garuda-Framework

      public  	   $default_lang           = "IND";


      protected    $first_load             = FALSE;             // Don't change this value, Let it to be FALSE

      protected    $view_direct_file       = "index";           // set name of file -> "view/index.php"

      protected    $maintenance_file       = "maintenance";     // set name of file -> "view/maintenance.php"
      protected    $pdo_file               = "pdo";             // set name of file -> "class/pdo.php"
      protected    $my_sqli_file           = "mysqli";          // set name of file -> "class/db.php"
      public       $language_file          = "language";        // set name of file -> "class/language.php"
      protected    $GF_String              = "GF_String";       // set name of file -> "class/GF_String.php"
      protected    $GF_Function            = "GF_Function";     // set name of file -> "class/GF_Function.php"
      protected    $error_file             = "error";           // set name of file -> "class/error.php"

      public       $gf_Ver                 = "v.1.4";            // set version of garudaframework
      public       $name_FW                = "Garuda Framework";// set name of Framework garudaframework

      protected    $function_error         = "showError";       // set name of function error

      protected    $database_start         = TRUE;              // Set database_start to be TRUE if using database
      private      $_notice_error          = false;
      public       $maintenance_start      = false;             // if Maitenance TRUE then direct to "View/Maintenance.php" 
      public       $multi_language_start   = TRUE;
      public       $database_type          = __MYSQLI__;        // change to "__PDO__" if you want to use PDO, "__MYSQLI__" if you want to use MYSQLI

      public       $token_app              = "1232asdasd2";
      protected    $class_name_mysqli      = "db";
      protected    $class_name_pdo         = "pdo";
      public       $protocol               = false;


    public function getNameWeb(){
        return $this->name_FW;
    }


    public function getTokenApp(){
        return $this->token_app;
    }
    	
    	function __construct($var="")
    	{
      		// check session if already START then skip
      		( session_status() == PHP_SESSION_NONE) ? session_start() : false;

      		// call method _showErrorPHP
      		$this->_showNoticeErrorPHP($this->_notice_error);

          // set directory web server constant
          ! defined('__SERVER__') ? define('__SERVER__', dirname( __FILE__ )."/",true) : false ;

          // if protocol equal false
           if ($this->protocol == false)
          {
            // call method check protocol
             $this->checkProtocol();
          }


          // set directory CLASS constant
          $this->_def('__CLASS_PATH__','class'); 	    
          // set directory VIEW  constant        
          $this->_def('__VIEW_PATH__','view');   	 
          // directory file
          $this->_def('__DATA_PATH__','data');
          // set directory PROCCESS constant          
          $this->_def('__PROCCESS_PATH__','process'); 
          $this->_def('__LOAD__','');

          // Defined Value
          $this->def('___COOKIE_LANGUANGE___' , $this->cookie_lang);
          $this->def('___MULTI_LANGUANGE__'   , $this->multi_language_start);
          $this->def('___EXTENSION_FILE___'   , $this->extension_name);
      
          $this->def('__MYSQLI__'             , $this->database_type);
          $this->def('__PROTOCOL__'           ,$this->protocol);
          $this->def('__FRAMEWORK_TITLE__',$this->name_FW);
             
            
          // set session for saving path of directory class, Use this session for directory "proccess/...php"
          $this->_sess("CLASS_PATH",__CLASS_PATH__); 
          $this->_sess("VIEW_PATH",__VIEW_PATH__); 
          // set special session for protect database file on -> "class/db.php"
          $this->_sess("DB_ACCESS",true); 
          // set session "PUBLIC ACCESS" for Directory -> "proccess/...php"
          $this->_sess("public_access",true); 
          // set sesion ___GF_Prepare___ 
          $this->_sess("___GF_Prepare___",$this->GF_Prepare_File); 
          // set session for "GET PATH Directory" -> "proccess/...php"
          $this->_sess("PROCCESS_PATH",__PROCCESS_PATH__); 
          // 
          $this->_sess("DATA_PATH",__DATA_PATH__);
          //$this->_sess("__PROTOCOL__",__PROTOCOL__);

       
          // if function error already set then skip, 
          // if not then require error file 
          if (! function_exists($this->function_error))
          {
              $this->setReqClass($this->error_file);
          }

          // always call method checkMaintenance
          $this->checkMaintenance();



          // always check cookie 
          if ($this->multi_language_start)
          {
            if (! $this->checkCookie(___COOKIE_LANGUANGE___))
            {   
                $this->createCookie(___COOKIE_LANGUANGE___,$this->default_lang);
                header("Refresh:0");
                exit();
            }
          }

          // check database
          if ($this->database_start){
              // call method check database type
              $this->checkDatabaseType();
          }
      	
      

          // if argument is set ,

          if (isset($var))
          {
              // if value of argument equal to  ______LOAD______
              if ($var=="______LOAD______")
              {
                // call method load gf controller
              	$this->_Load_GF_Controller();

              }
          }
          // and the last
          // call method gf function
          // and gf-string
          $this->load_GF_Function();
          $this->load_GF_String();

    	}
   	
      public function checkMaintenance(){
          if ($this->maintenance_start)
          {
              $this->MaintenancePage();
              exit();
          }
          
      }

       // metohod set constant for define anything value
      public function def($var,$val) 
      {   
          // return constant 
          return (defined($var) ? false : define("$var","$val", true));
      }    

      // method set constant for define path location of app
  	public function _def($var,$val)
  	{
  		return (defined($var) ? false : define("$var",__SERVER__."$val/", true));
  	}

  	  // method include maintenance page
      public function MaintenancePage()
      {
            
           $this->setReqView($this->maintenance_file);
      }

      public   function checkProtocol(){
        // checking $protocol in HTTP or HTTPS
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') 
        {
            // HTTPS 
            $this->protocol = "https://";
            return $this->protocol;
        } 
        else 
        {
            // HTTP
            $this->protocol = "http://";
            return $this->protocol;
        }

    }

  	// method set sesion 
      public function _sess($var,$val)
      {
  		// check session, if not set then create session
  		return ! isset($_SESSION[$var]) ? $_SESSION[$var] = $val : false;
  	}

    // method check file exist on directory return boolean
    public function checkFile($file)
    { 
        return (file_exists($file.___EXTENSION_FILE___)) ? true : exit(showError("#1",$file));
    }
    


      // method load gf controller
    	private function _Load_GF_Controller(){
    	 // check file first, 
        // then require file gf controoler
        // and set new object with parameter "?"
    		$this->setReqClass($this->_GF_Controller_Name);
    		! isset($GF_Controller) ? $GF_Controller = new GF_Controller("?") : false ;
    	}


      

           // method require file on directory class
        public function setReqClass($file)
        {    // method set require file for directory class
            if ($this->checkFile(__CLASS_PATH__.$file)) // if check file is true then
            {
                // return TRUE if require file is true

                return (require __CLASS_PATH__.$file.___EXTENSION_FILE___) ? true : false;
            }else { return false; }
        }

          // method require file on directory class
        public function setLanguangePage($file)
        {    // method set require file for directory class
            if ($this->checkFile(__CLASS_PATH__."language/".$file)) // if check file is true then
            {
                // return TRUE if require file is true

                return (require __CLASS_PATH__."language/".$file.___EXTENSION_FILE___) ? true : false;
            }else { return false; }
        }


        // method require file on directory view
        public function setReqView($file)
        { // method set require file for directory view
            if ($this->checkFile(__VIEW_PATH__.$file)) // if check file is true then
            {
                 // return TRUE if require file is true
                 return (require __VIEW_PATH__.$file.___EXTENSION_FILE___) ? true : false ;
            }else { return false; }
        }


         public function createCookie($var,$val)
        { 
            return setcookie("$var", "$val", time() + (10 * 365 * 24 * 60 * 60), "/") ? true : false;
        }

         public function checkCookie($val) 
        { 
            return isset($_COOKIE[$val]) ? true : false ;
        }

          public function destroyCookie($var) 
        {
            return setcookie("$var", "", -1, "/") ? true : false;
        }



            public function _showNoticeErrorPHP($val)
        {
          // if val is FALSE then, Turn off error reporting
          if (! $val)
            {
              // create new session _ERROR_REPORTING_ -> FALSE
              $this->_sess("_ERROR_NOTICE_",FALSE);
              error_reporting(0);
            } 
            else
            {
              session_unset("_ERROR_NOTICE_");
              /* 
               *  @Report runtime errors *
               *   error_reporting(E_ERROR | E_WARNING | E_PARSE); /*
              */

              /*
               *  @ Report all errors */
                  error_reporting(E_ALL); /*
              */

              /*
               *  @Same as error_reporting(E_ALL);
               *  ini_set("error_reporting", E_ALL);
              */


              /*
               *  @Report all errors except E_NOTICE 
               *  error_reporting(E_ALL & ~E_NOTICE); /*
              */

            }
            
        }




        public function load_GF_Function() {
            if (! class_exists($this->GF_Function))
            {
                 $this->setReqClass($this->GF_Function);
            }
            
            ! isset($GF_Function_Obj) ? $GF_Function_Obj = new GF_Function() : false;

        }
        public function load_GF_String() {
           if (! class_exists($this->GF_String))
            {
                  $this->setReqClass($this->GF_String);
            }
           ! isset($GF_String_Obj) ? $GF_String_Obj = new GF_String():false;
        }


         // method check file database is ready or not 
    protected function checkDatabaseType()
    { 

        if ($this->database_type == __MYSQLI__)
        {
            // if check file database is true then
            if ($this->checkFile(__CLASS_PATH__.$this->my_sqli_file))
            {
                // if require file database is true then return true
                if (! class_exists($this->class_name_mysqli))
                {
                     return  $this->setReqClass($this->my_sqli_file) ? true : false ;
                }
             
            }
            else { return false; } // if check file database is FALSE return FALSE
        }
        else if ($this->database_type==__PDO__)
        {
            // if check file database is true then
            if ($this->checkFile(__CLASS_PATH__.$this->pdo_file))
            {
                // if require file database is true then return true

                if (! class_exists($this->pdo_file))
                {
                   return  $this->setReqClass($this->pdo_file) ? true : false ;
                }
               
            }
            else { return false; } // if check file database is FALSE return FALSE
        }
     
    }   

}





