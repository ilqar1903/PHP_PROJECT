<!DOCTYPE html>
<html>
<head>
	<title></title>

	<style type="text/css">
		.profil{
			border:  1px solid #eee;
			background-color: skyblue;
		}
		.profil h2{
			font-weight: bold;
			padding: 10px;
			border: 1px solid #eee;
			font-size: 20px;
			background-color: white;
		}
		.profil ul li{
			border: 1px solid #ddd;
			padding: 10px;
			font-size: 20px;

		}

	</style>
</head>
<body>
<?php !defined("index.php") ? die("hacking"):null; ?>
	<?php


if($_SESSION){
     $uye=@$_GET['uye'];

     $a=$db->prepare("select * from uyeler where uye_name=?");
     $a->execute(array($uye));
    $s= $a->fetch(PDO :: FETCH_ASSOC);
     $m=$a->rowCount();

    if($m){
       
       ?>
       <div class="profil">
       <h2>Profil Information
       <?php
       if($_SESSION['uye']==$uye){
    echo '<span style="float:right;"><a href="?sec=edit&uye='.$_SESSION["uye"].'">Edit</a></span>';
}
       ?>
   </h2>
       <ul>
      <li><span style="font-weight: bold;">User Name: </span><?php echo $s["uye_name"];?></li>
      <li><span style="font-weight: bold;">User Email: </span><?php echo $s["uye_eposta"];?></li>
      <li><span style="font-weight: bold;">User About: </span><?php echo $s["uye_about"];?></li>
      <li><span style="font-weight: bold;">User Sign-Date: </span><?php echo $s["uye_date"];?></li>
       </ul>



       </div>
       


       <?php
    


    } 
    else{

    	echo "There is no any user";
    }
}
else{

	echo "Non-user cannot see own profil";
}

?>

</body>
</html>