<?php !defined("index.php") ? die("hacking"):null; ?>


<?php
$ara=@$_POST['ara'];
$konu=$db->prepare("select * from topics inner join category on category.categori_id=topics.topic_catagory  where topic_head  like ? and topic_condi=? order by topic_id desc");
$konu->execute(array('%'.$ara.'%',1));
$x= $konu->fetchALL(PDO :: FETCH_ASSOC);

$c=$konu->rowCount();

if($c){

foreach ($x as $a) {


?>
<div class="sol2"> 
	<h2><?php echo $a["topic_head"];?></h2>
	<div class="bilgi">kategori :<?php echo $a["categori_name"]; ?>
		yazan : <?php echo $a["topic_added"]; ?> 
		okunma : <?php  echo $a["topic_hit"]; ?>
		 yorum : 2 
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

	echo "There is no any topic_head";
}



?>