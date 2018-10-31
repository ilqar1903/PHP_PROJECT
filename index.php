
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>The News of Guardian</title>
	<link rel="stylesheet" href="css/styles.css" />
	<link rel="stylesheet" href="css/reset.css" />
	<style type="text/css">

body{
	background: #bdbdbd ;
}

.cix{
	border: 1px solid #ddd;
	padding: 5px;
	font-size: 20px;
	background-color: red;
    text-align: center;

}
	</style>
</head>
<body>
	<?php define("index.php",true); ?>
<?php session_start();
ob_start();
?>
<?php
include("set.php");?>

	<div class="genel"> 
	<div class="header" style="height: 250px; background:#eceff1; "> 
	<h2><span style="color:#111;">The News of Guardian</span> <br><br><p style="color: #757575 ;">The most accurate and fast news</p></h2>
	
	<div class="reklam" style="margin:-20px 20px 0 0;"> 
	<img style="max-width: 476px; margin-top: -76px; margin-right: -20px;" src="images/guardian.png" alt="" />
	</div>
	</div>
	
	<div class="menu" style="background:#607d8b; "> 
	<ul> 
	<li><a href="index.php" style="color: lightyellow;">Home</a></li>
	<li><a href="" style="color: lightyellow;">News</a></li>
	<li><a href="" style="color: lightyellow;">Videos</a></li>
	<li><a href="" style="color: lightyellow;">About Us</a></li>
   <?php
if(!$_SESSION){
echo '<li><a href="?sec=login" style="color: lightyellow;">Sign Up</a></li>';
}

   ?>
	<li><a href="?sec=connect" style="color: lightyellow;">Connect</a></li>
	</ul>
	<form action="?sec=ara" method="post">
	<span><input type="text" name="ara" style="margin-top: 2px;" /><button type="submit" style="background: skyblue;">Search</button></span>
	</form>
	</div>
	<div style="clear:both;"></div>
	<div class="content"> 
	<div class="sol"> 
	<?php

$sec=@$_GET["sec"];
  
  switch($sec){

  	case "connect":
     include("connect.php");
  	break;

  	case "hakkinda":

  	break;


  	case "kategori":
   
   include("category_list.php");

  	break;

    case "ara":
 include("ara.php");
    break;

    case "delMessage":
 include("mesajSil.php");
      break;
      
  	case "uye":
  include("uye_giris.php");
  	break;
     
     case "login":
     include("login.php");
      break;

    case "profil":

    include("profil.php");

    break;

    case "mesaj":
    include("mesaj.php");
    break;
   case "messageRead":
   include("messageRead.php");
   break;

     case "mesaj_send":
     include("mesajSend.php");
     break;

    case "edit":
    include("edit.php");

    break;
  	case "add_topic":
  	include("add_topic.php");
  	break;
     
     case 'exit':

     session_destroy();
     header("refresh: 2; url=index.php");

     echo '<div class="cix"> You successfully log out.directing....</div>';

     break;

  	case "devam":
    include("devam.php");

  	break;

  	default :
   
include("anasayfa.php");

  	break;
  }

	?>
	
	
	
	
	</div>
	
	
	<div class="sag"> 
<?php include("uye.php"); ?>
	
	<?php include("category.php");?>
	
	
	
	<?php include("favori_topics.php");?>
<?php include("last_comments.php"); ?>
	</div>
	
	
	</div>
	<div style="clear:both;"></div>
	

	<div class="footer" style="text-align: center; width: 97.5%;height: 40px; background: #80cbc4; "> 
	<h2>COPY RIGHTED 2018 THE NEWS OF GUARDIAN BY ENGLAND MEDIA COMPANY </h2>
	</div>
	
	</div>
	
</body>
</html>