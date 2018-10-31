<?php !defined("index.php") ? die("hacking"):null; ?>
<?php

if($_SESSION){
	if($_POST){
   
   $head=strip_tags(trim(@$_POST['head']));
   $image=strip_tags(trim(@$_POST['resim']));
   $cate=@$_POST['category'];
   $topic=strip_tags(@$_POST['topic']);

   if(!$head || !$image || !$topic){
   	echo "The areas cannot be empty";
   }

   else{

$k=$db->prepare("select * from topics where topic_head = ?");
$k->execute(array($head));
$v=$k->fetch(PDO::FETCH_ASSOC);
$r=$k->rowCount();


if($r){
	echo "Cannot insert the same topic";
}
else{

	$v=$db->prepare(" insert into topics set
       
        topic_head=?,
        topic_resim=?,
        topic_catagory=?,
        topic_yazi=?,
        topic_added=?

		");

	$load=$v-> execute(array($head,$image,$cate,$topic,$_SESSION["uye"]));

	if($load){
		
		echo "The topics loaded successfully";

	}
	else{
		echo "There is problem";
	}
}
   }

	}
	else{
     ?>

<div class="sol2">
   <h2>ADD TOPIC</h2>
   <form action="" method="post">
	<ul> 
	<li>Topic heading</li>
	<li><input type="text" name="head" /></li>
	<li>Topic_image</li>
	<li><input type="text" name="resim"  placeholder="insert image link" /></li>
	<li>Category</li>
	<li>
    <select name="category" >
    	
<?php
$k=$db->prepare("select * from category");
$k->execute(array());
$v=$k->fetchAll(PDO::FETCH_ASSOC);
foreach ($v as $d) {
	
	echo '<option value="'.$d["categori_id"].'">'.$d['categori_name'].'</option>';

}

?>
    </select>


	</li>	
	<li>About Topic</li> 
	<li><textarea name="topic"  cols="50" rows="10"></textarea></li>
	
	<li><button type="submit">gonder</button></li>
	</ul>
	</form>
	</div>


     <?php
	}
}

else{
	echo "Non-user cannot be insert topic";
}


?>