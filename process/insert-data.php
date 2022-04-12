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


// include prepare php


include '../'.$_SESSION['___GF_Prepare___'].'.php';
// create new object
$GF_Prepare = new GF_Prepare("?");

// create new object for GF_Function and GF_String
$GF_Function = new GF_Function();
$GF_String = new GF_String();



if (isset($_GET['name']) && isset($_GET['email']) && isset($_GET['phone']) && isset($_GET['address']) )// check if GET ID is already set or not
{
    $name       = $GF_String->strReplaceSq($_GET['name']); 
    $email      = $GF_String->strReplaceSq($_GET['email']); 
    $phone      = $GF_String->strReplaceSq($_GET['phone']); 
    $address    = $GF_String->strReplaceSq($_GET['address']); 

    if (empty($name)) { exit("F"); } 
    if (empty($email)) { exit("F"); } 
    if (empty($phone)) { exit("F"); } 
    if (empty($address)) { exit("F"); } 

  
    
    ! isset($db_obj) ? $db_obj = new db() : ""; //create new object

   
    $insert_data = $db_obj->insert("t_example","username",$name,"email",$email,"phone",$phone,"address",$address);
    if ($insert_data)
    { 
        // if success then echo T
        echo "T";  // echo T
    }
    else
    {
        echo "F";  // echo F
    }

}

else { exit("404 Page Not Found"); }


