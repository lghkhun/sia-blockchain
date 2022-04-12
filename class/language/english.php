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


defined('__LOAD__') OR exit('403 You dont have permission to access / on this server.');

$languange = new GF_Prepare();

$languange->def('__TITTLE__',$languange->name_FW);
$languange->def('__WELCOME__','Welcome to '.$languange->name_FW);

$languange->def('__HOME__','HOME');
$languange->def('__FITURE__','FEATURE');
$languange->def('__VIEW__','VIEW');
$languange->def('__ABOUT__','ABOUT');
$languange->def('__CONTACT__','CONTACT');


$languange->def('__ADD__','Add');
$languange->def('__EDIT__','Edit');
$languange->def('__DELETE__','Delete');

$languange->def('__DATE__','Date');
$languange->def('__TIME__','Time');


$languange->def('__COUNTDATA__','limit 50 ');
$languange->def('__COUNTDATALL__','Count All Data ');  

$languange->def('__EXG__','View data from Database PDO / MySqli');

$languange->def('__NAME__','Name');
$languange->def('__EMAIL__','Email');
$languange->def('__PHONE__','Phone Number');
$languange->def('__ADDRESS__','Address');

$languange->def('__CHANGETO__','Change Language To');
$languange->def('__EXAMPLEFUNCTION__','Only Show Example Function');

$languange->def('____','Style');
$languange->def('__STYLEMD5T__','Traditional '.____);

$languange->def('__DOWNLOAD__','DOWNLOAD');
$languange->def('__INFODOWNLOAD__','Download source code from GitHub : ');
$languange->def('__LINKDOWNLOAD__','https://github.com/lamhotsimamora/garudaFrameWork');

$languange->def('__STYLEMD5M__','Modern '.____);

$languange->def('__ZONETIME__','Time Zone :');

$languange->def('__INFO1__','For this page look at the location of file on this below : ');
$languange->def('__INFO2__','For the controller of garudaframework page look at the location of file on this below : ');
$languange->def('__INFO2a__','For the page that preparing anything what needed like class, method, constanta, session, cooike, file name, & more  is "GF_Prepare.php" look at the location of file on this below : ');
$languange->def('__INFO3__','For the direct page of view look at the location of file on this below : ');

$languange->def('__mySQLiC__','Example using mySQLi class');
$languange->def('__pdoC__','Example using PDO class');

$languange->def('__B3__','EXAMPLE BOOTSTRAP PAGE');

$languange->def('__B4__','Data');

$languange->def('__DIRECTORY__','Directory Path');

$languange->def('__HTTPS__','Protocol HTTP / HTTPS ');

$languange->def('__SAVE__','Save');

$languange->def('__xFUNCTION__','FUNCTION');

$languange->def('__UPLOAD__','UPLOAD');




