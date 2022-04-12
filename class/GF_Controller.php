<?php

! isset($_SESSION["public_access"]) ? exit("403 You dont have permission to access / on this server.") : "";


// Check constant __MYSQLI__ &  __PDO__ if already set then SKIP
// if not then create constant for __MYSQLI__ &  __PDO__
! defined("__MYSQLI__") ? define("__MYSQLI__", "mysqli", TRUE) : false;
! defined("__PDO__") ? define("__PDO__", "pdo", TRUE) : false;

/**
*   GF Controller Class for call the view page 
*/
class GF_Controller extends GF_Prepare
{


    // method load view direct page "view index.php" & return boolean
    protected function LoadView($file)
    { 
        return $this->checkFile(__VIEW_PATH__.$file) ? $this->setReqView($file) && true : false;
    }


    // return value first_load
    private function getFirstLoad() 
    { 
        return $this->first_load;
    }


    // set argumen for this constructor 
    function __construct($type="")
    {

        if (isset($type)){
        // check if value of argument is not empty then 
            if (! empty($type)) 
            {

            // create define __LOAD__ 
               $this->def('__LOAD__','TRUE');

          
                // always check value of multi language
                // if TRUE then call file "class/language.php"
                // else FALSE then SKIP
                if (___MULTI_LANGUANGE__){  
                    // check require file "class/language.php", if FALSE then
                    if (! $this->setReqClass($this->language_file)) 
                    {
                        //show error
                        echo showError("#1",__CLASS_PATH__.$this->language_file); 

                        exit();
                    } 
                }
                      
                      
                      
            // ===========================================================================================================
            // check variabel first_load
            // if first_load is TRUE then 
            if ($this->getFirstLoad()==TRUE) {  } // do nothing
            
            // if first_load is FALSE then 
            else if ($this->getFirstLoad()==FALSE)
            {

                // Load view direct file "view/index.php" , if FALSE then
                if (! $this->LoadView($this->view_direct_file)) 
                {
                    //show error
                    echo showError("#ViewDirect",__VIEW_PATH__.$this->view_direct_file); 

                    exit();
                }


            }
            // ===========================================================================================================

        } else if (empty($type)) { /* echo "DO NOTHING";  if argument $type is empty then do nothing*/ }
    }
}




}


