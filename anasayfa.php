<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.aktif {
	
	border:1px solid #ddd;
	padding:7px;
	background:white;
	margin-right:7px;
}

.sayfa {
	
	border:1px solid #ddd;
	padding:7px;
	background:lightpink;
	margin-right:7px;
}



	</style>
</head>
<body>


<?php !defined("index.php") ? die("hacking"):null; ?>


<?php

$sayfa=intval(@$_GET['sayfa']);
if(!$sayfa){
	$sayfa=1;
}
$v=$db->prepare("select * from topics inner join category on category.categori_id=topics.topic_catagory inner join uyeler 
on uyeler.uye_name=topics.topic_added  where topic_condi=? ");
$v->execute(array(1));
$v->fetchALL(PDO :: FETCH_ASSOC);
$cem=$v->rowCount();
$limit=3;
$forlimit=2;
$goster=$sayfa*$limit-$limit;
$sayfa_sayi= ceil($cem/$limit);


$konu=$db->prepare("select * from topics inner join category on category.categori_id=topics.topic_catagory inner join uyeler on uyeler.uye_name = topics.topic_added  where topic_condi=? order by topic_id desc limit $goster,$limit");
$konu->execute(array(1));
$x= $konu->fetchALL(PDO :: FETCH_ASSOC);

foreach ($x as $a) {
   $comment=$db->prepare("select *from comments where comment_topic_id=? AND  comment_per=?");
   $comment->execute(array($a['topic_id'],1));
   $comment->fetchALL(PDO :: FETCH_ASSOC);
   $z=$comment->rowCount();
?>


<div class="sol2" style="background:white;"> 
	<h2 style="background: #abc;"><?php echo $a["topic_head"];?></h2>
	<div class="bilgi">Category :<a href="?sec=kategori&id=<?php echo $a["categori_id"];?>">
		<?php echo $a["categori_name"]; ?></a>
		Written : <a href="?sec=profil&uye=<?php echo $a["uye_name"];?>">
			<?php echo $a["uye_name"]; ?> </a>
		Readable : <?php  echo $a["topic_hit"]; ?>
		 Comment :  <?php  echo $z;?>


	<span style="float:right;"> Date : <?php echo $a["topic_date"];?></span></div>
	<div class="resim"> 
	<img src="<?php echo $a["topic_resim"]; ?>" alt="" />
	</div>
	<p> 
	<?php echo mb_substr($a["topic_yazi"],0,350); ?>....
	</p>
	
	<div class="devam" style="background:skyblue;"> 
	<a href="?sec=devam&id=<?php echo $a["topic_id"];?>" >Continue</a>
	</div>
	<div style="clear:both;"></div>
	</div>

<?php













}

echo '<div class="sayfalama" style="background:#84ffff;"> ';

for($i=$sayfa-$forlimit;$i<$sayfa+$forlimit+1;$i++){
	if($i>0 && $i<=$sayfa_sayi){
		if($i==$sayfa){
       echo $i;
		}
		else{
			echo '<a href="?sayfa='.$i.'">'.$i."</a>";

		}
	}
}


if($sayfa!=$sayfa_sayi){

	echo '<a href="?sayfa='.$sayfa_sayi.'"> <span style="float:right">END</span></a>';
}


?>

	
	 
	<div style="clear:both;"></div>

</div>



</body>
</html>