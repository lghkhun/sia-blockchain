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

// Use this class Log for testing on localhost

! isset($_SESSION["public_access"]) ? exit("403 You dont have permission to access / on this server.") : "";

class Log {

    private $log_file, $fp;

    public function lfile($path) 
    {
        $this->log_file = $path;
    }

    public function lwrite($message) 
    {

        if (!is_resource($this->fp)) 
        {
            $this->lopen();
        }

        $script_name = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);

        $time = @date('[d/M/Y H:i:s]');

        fwrite($this->fp, "$time ($script_name) $message" . PHP_EOL);

    }

    public function lclose() 
    {
        fclose($this->fp);
    }

    private function lopen() 
    {

    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') 
    {
        $log_file_default = 'logfile.txt'; // set name of file logfile.txt
    }
    else 
    {
        $log_file_default = '/tmp/logfile.txt';
    }

    $lfile = $this->log_file ? $this->log_file : $log_file_default;

    $this->fp = fopen($lfile, 'a') or exit("Can't open $lfile!");
    }
}

