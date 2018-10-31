<?php !defined("index.php") ? die("hacking"):null; ?>

<?php


$host   = "localhost";
$dbname = "site";
$yazi="root";
$sifre  = "";

try{

$db=new PDO("mysql:host = $host; dbname=$dbname;","$yazi","$sifre");

}catch( PDOException $mesaj){
 
 echo $mesaj->getmessage();
}
?>