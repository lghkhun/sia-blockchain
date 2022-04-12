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
$languange->def('__WELCOME__','Selamat Datang '.$languange->name_FW);

$languange->def('__HOME__','BERANDA');
$languange->def('__FITURE__','FITUR');
$languange->def('__VIEW__','TAMPIL');
$languange->def('__ABOUT__','TENTANG');
$languange->def('__CONTACT__','KONTAK');


$languange->def('__ADD__','Tambah');
$languange->def('__EDIT__','Ubah');
$languange->def('__DELETE__','Hapus');


$languange->def('__DATE__','Tanggal');
$languange->def('__TIME__','Jam');

$languange->def('__COUNTDATA__','batas 50 ');
$languange->def('__COUNTDATALL__','Jumlah Seluruh Data ');

$languange->def('__EXG__','Menampilkan data dari database PDO / MySqli');

$languange->def('__DOWNLOAD__','DOWNLOAD');
$languange->def('__INFODOWNLOAD__','Dapatkan sumber code dari GitHub : ');
$languange->def('__LINKDOWNLOAD__','https://github.com/lamhotsimamora/garudaFrameWork');

$languange->def('__NAME__','Nama');
$languange->def('__EMAIL__','Email');
$languange->def('__PHONE__','Nomor Handphone');
$languange->def('__ADDRESS__','Alamat');

$languange->def('__CHANGETO__','Ubah bahasa ke');
$languange->def('__EXAMPLEFUNCTION__','Contoh Function');

$languange->def('____','Gaya');
$languange->def('__STYLEMD5T__',____.' Traditional');

$languange->def('__STYLEMD5M__',____.' Modern ');

$languange->def('__ZONETIME__','Zona Waktu :');

$languange->def('__INFO1__','Untuk halaman ini lihat lokasi file di bawah ini :');
$languange->def('__INFO2__','Untuk halaman controller garudaframework lihat lokasi file di bawah ini : ');
$languange->def('__INFO2a__',
    'Untuk halaman yang mempersiapkan segala kebutuhan seperti class, method, constanta, session, cookie, nama file, & lainnya adalah "GF_Prepare.php" lihat lokasi file di bawah ini :');
$languange->def('__INFO3__','Untuk halaman pengalihan tampilan lihat lokasi file di bawah ini : ');

$languange->def('__mySQLiC__','Contoh menggunakan class mySQLi ');
$languange->def('__pdoC__','Contoh menggunakan class PDO ');

$languange->def('__B3__','CONTOH HALAMAN BOOTSTRAP');

$languange->def('__B4__','Data');

$languange->def('__DIRECTORY__','Path Direktori');


$languange->def('__HTTPS__','Protocol HTTP / HTTPS ');

$languange->def('__SAVE__','Simpan');
$languange->def('__xFUNCTION__','FUNCTION');


$languange->def('__UPLOAD__','UPLOAD');

