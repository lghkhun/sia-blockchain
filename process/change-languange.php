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




include '../'.$_SESSION['___GF_Prepare___'].'.php';

$prepare = new GF_Prepare("?");


if (isset($_GET['lang']))
{
	$type 	= ($_GET['lang']);
	$type   = strtoupper(trim($type));

	switch ($type) 
	{
		case "ENG":
			if ($prepare->createCookie(___COOKIE_LANGUANGE___,"IND")){
				echo "T";
			}
            else
            {
				echo "F";
			}
			break;
		case "IND":

		if ($prepare->createCookie(___COOKIE_LANGUANGE___,"ENG")){
				echo "T";
			}
			else
			{
			echo "F";
			}
		break;

		default:
		break;
	}
}

