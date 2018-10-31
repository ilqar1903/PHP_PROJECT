<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.bilgi {
	
	border:1px solid #ddd;
	margin:2px;
	padding:4px;
	background:#eee;
	font-size:20px;
	
	
}
.sol2 p img{
	width: 600px;
	margin-left: 30px;
	padding: 5px;
	display: block;

	
}
</style>
</head>
<body>



	<?php !defined("index.php") ? die("hacking"):null; ?>
<?php
$id=@$_GET["id"];

$konu=$db->prepare("select * from topics inner join category on category.categori_id=topics.topic_catagory where topic_id=? and topic_condi=? ");
$konu->execute(array($id,1));
$x= $konu->fetchALL(PDO :: FETCH_ASSOC);

if(!@$_COOKIE['hit'.$id]){
$hit=$db->prepare("update topics set topic_hit=topic_hit+1 where topic_id=?");
$hit->execute(array($id));
setcookie('hit'.$id," ",time ()+9673663664646646464);
}
foreach ($x as $a) {
	   $comment=$db->prepare("select *from comments where comment_topic_id=? and comment_per=?");
   $comment->execute(array($a['topic_id'],1));
   $comment->fetchALL(PDO :: FETCH_ASSOC);
   $z=$comment->rowCount();

?>
<div class="sol2"> 
	<h2><?php echo $a["topic_head"];?></h2>
	<div class="bilgi">Category : <?php echo $a["categori_name"]; ?>
	 Write : <?php echo $a["topic_added"]; ?> 
	  Read : <?php  echo $a["topic_hit"]; ?> 
	 Comment : <?php echo $z; ?>
	<span style="float:right;">tarih : <?php echo $a["topic_date"];?></span></div>
	
	<p> 
	<img src="<?php echo $a["topic_resim"]; ?>">
	<?php echo nl2br($a["topic_yazi"]); ?>....
	</p>
	
	
	<div style="clear:both;"></div>
	</div>
	<?php

}


 $yorum = $db->prepare("select * from comments where comment_topic_id=? and comment_per=?");
 $yorum->execute(array($id,1));
 $b = $yorum->fetchALL(PDO::FETCH_ASSOC);
 $x = $yorum->rowCount();
 
   if($x){
	   
     foreach($b as $m){
		 
		 ?>
		 <div > 
		 <h2>ADDED COMMENTS : <?php echo $m["commen_added"];?> 
		 <span style="float:right;">date: <?php echo $m["comment_date"];?> </span></h2>
		 <p> 
		 <?php echo $m["comment_mesaj"];?>
		 </p>
		 </div>
		 <?php
		 
		 
		 
	 }	  
	  
	   
   }else {
	   
	   echo '<div class="bilgi">There is no comment</div>';
	   
   }

if($_POST){
	$name=@trim($_POST['name']);
	$email=@trim($_POST['email']);
	$mesaj=@trim($_POST['mesaj']);
	if(!$mesaj || !$email || !$name){

		echo '<div class="xeta" > You must be filled non empty areas</div>';
	}
	else{

       $comment=$db->prepare("insert into comments set
              
              commen_added=?,
              comment_eposta=?,
              comment_mesaj=?,
              comment_topic_id=?

       	");

     $insert = $comment->execute(array($name,$email,$mesaj,$id));
     if($insert){
             echo '<div> The comment  successfully added!! The comment is showed after checking   directing.... </div>';

             $url=$_SERVER["HTTP_REFERER"];
             header("refresh:2; url=$url");
     }
     else{

     	echo '<div class="xeta" > There are some problems</div>';
     }

	}
}

else{
	if($_SESSION){
?>
	<div style="font-size:19px;padding:10px;">Send Comment</div>
<div class="sol2">
   <form action="" method="post">
	<ul> 
	
	<li><input type="hidden"  value="<?php echo $_SESSION["uye"];?>" name="name" /></li>
	
	<li><input type="hidden"  value="<?php echo $_SESSION["eposta"];?>" name="email" /></li>
	
	
	<li><textarea name="mesaj" id="" cols="50" rows="10"></textarea></li>
	
	<li><button type="submit">Continue</button></li>
	</ul>
	</form>
	</div>
	<?php
		

	}
   else{
   	?>

<div style="font-size:19px;padding:10px;">Send Message</div>
<div class="sol2">
   <form action="" method="post">
	<ul> 
	<li>Your name</li>
	<li><input type="text" name="name" /></li>
	<li>Email</li>
	<li><input type="text" name="email" /></li>
	
	
	<li><textarea name="mesaj" id="" cols="50" rows="10"></textarea></li>
	
	<li><button type="submit">Send</button></li>
	</ul>
	</form>
	</div>


	<?php

   }
	


}
   









?>



</body>
</html>