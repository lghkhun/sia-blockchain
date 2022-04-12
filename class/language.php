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
	

/* 	============================================================================
                                Variabel language
 	============================================================================ */
//  Change the $var or $val if you want to using currency format 
//  This is just for example . . .  
 							// Good Country In The World
							$IND 	= "IND";  // Indonesia 
							$ENG 	= "ENG";  // English
							$GRM	= "GRM";  // Germany
							$CHN	= "CHN";  // china

							// Some Culture in Indonesian
							$BTK    = "BTK";  // BATAK
							$JWA 	= "JWA";  // JAWA
							$DYK	= "DYK";  // DAYAK
							$SND    = "SND";  // SUNDA
/* 	============================================================================
             Variabel file of language "garudaframework/class/language/...php"
             Only filename without extension 
 	============================================================================ */
							$file_indonesia = "indonesia";
							$file_english   = "english";		
/* 	============================================================================  
			You can use Only One language or More for the Web 
   	============================================================================ */

       
$languange = new GF_Prepare();

// check if cookie language is already set or not
if (isset($_COOKIE[$languange->cookie_lang])){ 
	// get cokkie 
	$cookie = $_COOKIE[$languange->cookie_lang];
	

	switch ($cookie)
	{
		case $IND:
			$languange->setLanguangePage(($file_indonesia));
			break;
		case $ENG:
			$languange->setLanguangePage(($file_english));
			break;
		default: // set default to Indonesia language
			$languange->setLanguangePage(($file_indonesia));
			break;
	}
}
else

{ exit(""); }




