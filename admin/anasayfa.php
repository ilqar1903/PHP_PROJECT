
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="home.css" />
</head>
<body>

	<?php
	$topics = $db->prepare("select * from topics inner join category on category.categori_id=topics.topic_catagory");
	$topics->execute(array());
	$topics->fetchALL(PDO :: FETCH_ASSOC);
	$topic=$topics->rowCount();


	$top = $db->prepare("select * from topics inner join category on category.categori_id=topics.topic_catagory where topic_condi=?");
	$top->execute(array(0));
	$top->fetchALL(PDO :: FETCH_ASSOC);
	$to=$top->rowCount();

	
	$users = $db->prepare("select * from uyeler ");
	$users->execute(array());
	$users->fetchALL(PDO :: FETCH_ASSOC);
	$user=$users->rowCount();


	$uye = $db->prepare("select * from uyeler where uye_onay=?");
	$uye->execute(array(0));
	$uye->fetchALL(PDO :: FETCH_ASSOC);
	$uy=$uye->rowCount();

		$comment= $db->prepare("select * from comments ");
	$comment->execute(array());
	$comment->fetchALL(PDO :: FETCH_ASSOC);
	$com=$comment->rowCount();


	$comme = $db->prepare("select * from comments where comment_per=?");
	$comme->execute(array(0));
	$comme->fetchALL(PDO :: FETCH_ASSOC);
	$co=$comme->rowCount();

		$categ = $db->prepare("select * from category ");
	$categ->execute(array());
	$categ->fetchALL(PDO :: FETCH_ASSOC);
	$cat=$categ->rowCount();







	?>
<div class="admin-icerik-sag"> 
			<h2>Admin Panel Home Page</h2>
<div class="home">
	<h3><a href="/admin/?do=topics" style="	color: lightyellow;">Topics</a></h3>
<p style="margin-top: 10px;">Number of topics : <?php echo $topic;?> <br><br>
   Number of check to waiting of  <br> topics : <?php echo $to;?> 
	


</p>
</div>

<div class="home">
	<h3><a href="/admin/?do=uyeler" style="	color: lightyellow;">Users</a></h3>
<p style="margin-top: 10px;">

	Number of users : <?php echo $user;?> <br><br>
   Number of check to waiting of  <br> users : <?php echo $uy;?> 

</p>
</div>
<div class="home">
	<h3><a href="/admin/?do=comments" style="	color: lightyellow;">Comments</a></h3>
<p style="margin-top: 10px;"> 
	Number of comments : <?php echo $com;?> <br><br>
   Number of check to waiting of  <br> comments : <?php echo $co;?> </p>
</div>
<div class="home">
	<h3><a href="/admin/?do=categories" style="	color: lightyellow;">Categories</a></h3>
<p style="margin-top: 20px;">Number of categories : <?php echo $cat;?> <br><br>
  
</p>
</div>
			</div>
</body>
</html>