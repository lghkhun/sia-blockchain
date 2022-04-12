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


include $_SESSION['___GF_Prepare___'].'.php';
// create new object
$GF_Prepare = new GF_Prepare("?");


$GF_Prepare -> load_GF_Function();

 if (isset($_GET['id']))
 {

    $GF_String = new GF_String();
    $GF_Function = new GF_Function();

    $idfile = $GF_String->strReplaceSq($_GET['id']);  

   

    $db_obj =  new db();


    $checkfile = $db_obj->selectCount("select id from t_file where id='$idfile' limit 1");

    if ($checkfile>0)
    {
        $getfile  = $db_obj->selectData("select filename from t_file where id='$idfile'");
        $row = mysqli_fetch_array($getfile,MYSQLI_ASSOC);

        $filename    = trim($row['filename']);

        $filename    = $GF_String->decrypt_64($filename);

        $pathdownload = "data/".$filename;

        $GF_Function->downloadFile($pathdownload);
    }
    else
    {
        exit("Nothing");
    }

   

 }