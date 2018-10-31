
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.sag4 {
	
	border:1px solid #ddd;
	min-height:200px;
	background:white;
	margin-bottom:20px;
	float: left;
	width: 400px;
	
}


.sag4 h2 {
	
	border:1px solid #ddd;
	padding:10px;
	background:lightgreen;
	font-size:20px;
	font-family:verdana;
	
}

.sag4 span img {
	
	width:150px;
	height:150px;
	margin:5px 5px 5px 120px;
}

.sag4 ul li {
	
	border:1px solid #ddd;
	padding:15px;
	font-size:18px;
	font-family:verdana;
	background:lightyellow;
}

.sag4 ul li:hover {
	
	background:#eee;
	
}



.sag4  h3 img {
	
	width:50px;
	float:left;
	margin:5px;
}

.sag4 h3 {
	
	border:1px solid #ddd;
	float:left;
	width:375px;
	margin:7px;
	font-size:22px;
	padding: 5px;
}


	</style>
</head>
<body>
<?php !defined("index.php") ? die("hacking"):null; ?>	

	<div class="sag4"> 
	<h2 style="background: #eceff1;">The Last Comments</h2>
<?php

	   $comment=$db->prepare("select *from comments where comment_per=? order by comment_id desc limit 5");
   $comment->execute(array(1));
  $z= $comment->fetchALL(PDO :: FETCH_ASSOC);

  foreach ($z as $a) {
  	

  	echo '<h3 style="background: #fff8e1 ;"><a href="?sec=devam&id='.$a['comment_topic_id'].'">'.$a['comment_mesaj'].'<br/><span style="font-size:17px;">'."Written from:".$a['commen_added'].'</span></a></h3>';
  }
   
?>


	
	
	</div>
</body>
</html>