<?php !defined("index.php") ? die("hacking"):null; ?>
<div class="sag2"> 
	<h2 style="background: #eceff1;">Famous Topics</h2>

<?php

$v=$db->prepare("select *from topics where topic_condi=? order by topic_hit desc limit 5");
$v->execute(array(1));
$fav=$v->fetchALL(PDO:: FETCH_ASSOC);
$s=$v->rowCount();
if($s){
  
  foreach($fav as $a){
  	echo '<h3 style="background: #fff8e1 ;"><a href=?sec=devam&id='.$a['topic_id'].'">'.$a['topic_head']."</a></h3>";
  }

}

else{
  echo "There is no favori";
}
?>






	</div>