<?php

if($_SESSION){
   
   if($_POST){
	$name=@trim($_POST['name']);
	$sender=@trim($_POST['sender']);
	$head=@trim($_POST['head']);
	$yazi=@trim($_POST['mesaj']);

	if(!$name|| !$sender || !$head){

		echo '<div> You must be filled non empty areas</div>';
	}
else{

	      $v=$db->prepare("select *from uyeler where uye_name=?");
	      $v->execute(array($name));
	      $m=$v->fetch(PDO :: FETCH_ASSOC);
	      $x=$v->rowCount();

	      if($x){
                $insert=$db->prepare("insert into mesajlar set 
                   
                     mesaj_whom=?,
                     mesaj_send=?,
                     mesaj_head=?,
                     mesaj_yazi=?

                	");
                $i=$insert->execute(array($m['uye_id'],$sender,$head,$yazi));
              
              if($i){
              	echo "Successfully sended....";
              	header("refresh: 2, url=?sec=mesaj");
              }
              else{
              	echo "There is problem";
              }
	      }

	      else{
	      	echo $name."-> "." In the system The user doesn't find";
	      }

}

   }
   else{

   	?>
<div class="sol2">
   <form action="" method="post">
   	<h2>Send Message</h2>
	<ul> 
	<li>Your Name</li>
	<li><input type="text" name="name" /></li>

	<li><input type="hidden" value="<?php echo $_SESSION["uye"];?>"  name="sender" /></li>
	<li><input type="text" name="head" placeholder="topic head" /></li>
	<li>Write Message</li>
	<li><textarea name="mesaj" id="" cols="50" rows="10"></textarea></li>
	<li><button type="submit">gonder</button></li>
	</ul>
	</form>
	</div>

   	<?php
   }

}
else{

	echo "You must be log in for messaging";

}
?>