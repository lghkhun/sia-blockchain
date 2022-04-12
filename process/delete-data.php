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

// check seesion start is TRUE or FALSE
( session_status() == PHP_SESSION_NONE) ? session_start() : "";

// check session public access is already SET or NOT
! isset($_SESSION["public_access"]) ? exit("403 You dont have permission to access / on this server.") : "";

// include GF_Prepare with Session ___GF_Prepare___
include '../'.$_SESSION['___GF_Prepare___'].'.php';

$GF_Prepare = new GF_Prepare("?");

// create new object for GF_Function and GF_String
$GF_Function = new GF_Function();
$GF_String = new GF_String();

if (isset($_GET['id']))// check if GET ID is already set or not
{
    $id = $GF_String->strReplaceSq($_GET['id']); // trim and replace single quote  

    if (empty($id)) { exit("F"); } // if ID is empty then echo F and exit

    
    ! isset($obj) ? $obj = new db() : ""; // if $db is not set, then create new object

   
    $delete_data = $obj->delete("t_example","id",$id);
    if ($delete_data)
    { // check result
        echo "T";  // echo T
    }
    else
    {
        echo "F";  // echo F
    }

}

else { exit("404 Page Not Found"); }


