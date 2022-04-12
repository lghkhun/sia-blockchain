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
                  
! isset($_SESSION["public_access"]) ? exit("403 You dont have permission to access / on this server.") : "";

// if you change this name function . you should change on "class/index.php" line  58
function showError($val,$info) 
{ 
	 $db_missing 	= "#db";
	 $file_missing	= "#1";
	 $view_missing	= "#ViewDirect";
	 $class_missing = "#class";
	 $e 			= "";
	 $maintenance   = "#maintenance";
	switch ($val) 
	{
		case $db_missing:
			$e =
			'<b>Hi ! Something is wrong ! #db </p>
			garudaFramework cannot found mysqli or pdo File -> <font color="red">{ '.$info.'.php }</font>
			Please check the name of file and check on directory !
			</b>';
			break;
		case $view_missing:
			$e =
			'<b>Hi ! Something is wrong ! #View </p>
			garudaFramework cannot found file direct VIEW page -> <font color="red">{ '.$info.'.php }</font>
			Please check the file and check on directory !
			</b>';
			break;	
		case $file_missing:
			$e =
			'<b>
			Hi ! Something is wrong ! #1 </p>
			garudaFramework Failed while try to load this file -> <font color="red">{ '.$info.'.php }</font>
			Please check the name of file or check on directory !
			</b>';
			break;
		case $maintenance:
			$e =
			'garudaFramework is MAINTENANCE';
			break;
		default:
			break;

	} 
	return $e;
	
}
