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
! isset($_SESSION["public_access"])  ? exit("403 You dont have permission to access / on this server.") : "";
  
/**
* 
*/
class GF_String 
{

    public  $url_path     = "garudaframework";
    public  $hosting_name = "localhost";
    public  $app_dir      = "garudaframework";
      
    public  function strToLow($str){ // String to Lower
        return strtolower(trim($str));
      }
   public function strToUp($str){ // String to Upper
        return strtoupper(trim($str));
      }

    public function strReplaceSq($str){ // Extreme Replace Single Quote 
      //  $res = str_replace("'", "", trim($str));
         $res = addslashes($str);
        $res = str_replace("@HASTAG@", "#",$res);
        return $res;
      }
    public function singleQuote($str){ // Standart Replace Single Quote
        $res = addslashes($str);

        return $res;
      }

     public function md5Mdrn($str){ // MD5 + length string
        $tot = $this->lengthStr($str);
        return md5($str.$tot);
      }

    public  function lengthStr($str){ // Length String
        return strlen(trim($str));
      }

    public  function uEncode($str){  // Raw Url Encode
        $result = rawurlencode($str);
        return $result;
      }

     public function htmlEn($str){
        return htmlentities(trim($str));
      }

   

    public  function getRandomString($length)// Get Random String with argument length
      {
          $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
          $charactersLength = strlen($characters);
          $randomString = '';
          for ($i = 0; $i < $length; $i++) {
              $randomString .= $characters[rand(0, $charactersLength - 1)];
          }
          return $randomString;
      }

    public  function encrypt_64($str){
        return base64_encode(trim($str));
      }

     public function decrypt_64($str){
        return base64_decode(trim($str));
      }

     public function AppDir(){ // name of directory if this web testing on offline server, if testing on hosting, clear AppDir -> ""
       
        return $this->app_dir;
      }

    public  function hostName(){ // if upload to hosting, change to url -> example : https://name.com
        return $this->hosting_name;
      }

    public  function getFullUrl(){

        return $this->hosting_name."/".$this->app_dir."/";
    }


     public function messageHTML($color,$message){
          return '<font color="'.$color.'">'.$message.'</font>';
      }
       
}
