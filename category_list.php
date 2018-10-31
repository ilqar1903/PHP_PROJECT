<?php !defined("index.php") ? die("hacking"):null; ?>


<?php
$id=@$_GET["id"];
$konu=$db->prepare("select * from topics inner join category on category.categori_id=topics.topic_catagory where topic_catagory=? and topic_condi=? ");
$konu->execute(array($id,1));
$x= $konu->fetchALL(PDO ::FETCH_ASSOC);
$v=$konu->rowCount();

if($v){
	foreach ($x as $a) {
      $comment=$db->prepare("select *from comments where comment_topic_id=? AND  comment_per=?");
   $comment->execute(array($a['topic_id'],1));
   $comment->fetchALL(PDO :: FETCH_ASSOC);
   $z=$comment->rowCount();

?>
<div class="sol2"> 
	<h2><?php echo $a["topic_head"];?></h2>
	<div class="bilgi">Category :<?php echo $a["categori_name"]; ?>
		Written : <?php echo $a["topic_added"]; ?> 
		Read : <?php  echo $a["topic_hit"]; ?>
		 Comments : <?php echo $z;?>
	<span style="float:right;">tarih : <?php echo $a["topic_date"];?></span></div>
	<div class="resim"> 
	<img src="<?php echo $a["topic_resim"]; ?>" alt="" />
	</div>
	<p> 
	<?php echo substr($a["topic_yazi"],0,350); ?>....
	</p>
	
	<div class="devam"> 
	<a href="?sec=devam&id=<?php echo $a["topic_id"];?>">devam</a>
	</div>
	<div style="clear:both;"></div>
	</div>

<?php




}

}
else{

	echo "There is no";
}



?>