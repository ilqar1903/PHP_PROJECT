<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.read{
			border: 1px solid #ddd;
			min-height: 110px;
			background-color:#121342 ;
		}

		.read h2{
			border: 1px solid #ddd;
			background-color: white;
			font-size: 20px;
			padding: 10px;
		}
		.read p{
			padding: 10px;
			font-size: 19px;
			font-family: verdana;
			color:lightyellow;
		}
	</style>
</head>
<body>
<?php

if($_SESSION){

    $id=(int) $_GET['id'];
    $v=$db->prepare("select * from mesajlar where mesaj_id=? and mesaj_whom=?");
$v->execute(array($id,$_SESSION["id"]) );
$m=$v->fetch(PDO :: FETCH_ASSOC);
$x=$v->rowCount();
   if($x){
   	$c=$db->prepare("update mesajlar set mesaj_read=? where mesaj_id=? and mesaj_whom=?");
   	$c->execute(array(1,$id,$_SESSION['id']));
    ?>
<div class="read">
<h2><span style="font-weight:bold">Heading :</span> <?php echo mb_substr($m["mesaj_head"],0,30);?>
<span style="float:right;"><?php echo $m["mesaj_date"];?></span></h2>
<p>
<span style="font-weight:bold;"><?php echo $m["mesaj_send"];?></span><br><br>
<?php echo $m["mesaj_yazi"];?>
</p>


</div>
<?php
   }

   else{
 
   	echo "The problem-> Message may be has been deleted.";
   }

}

else{



}
?>
</body>
</html>
