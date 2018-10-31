<?php

if($_POST){

	$name=@$_POST['name'];
	$topic=@$_POST['topic'];
	$whom=@$_POST['whom'];
	$mesaj=@$_POST['mesaj'];
		if(!$mesaj || !$topic || !$name){

		echo '<div> You must be filled non empty areas</div>';
	}
	else{

		$insert=$db->prepare("insert into mesajlar set 
                  mesaj_send=?,
                  mesaj_head=?,
                  mesaj_whom=?,
                  mesaj_yazi=?
                

			");
		$i=$insert->execute(array($name,$topic,$whom,$mesaj));

		if($i){
			echo "Successfully sended....";
		}
		else{
			echo "There is problem";
		}
	}


}
else{
if($_SESSION){
?>
	<div class="sol2">
   	<h2>Connect With Us</h2>
   	 <form action="" method="post">
	<ul> 
	
	<li><input type="hidden" value="<?php echo $_SESSION['uye']; ?>" name="name" /></li>
	<li>Topic Head</li>
	<li><input type="text" name="topic" /></li>
	<li>Message to Admin</li>
	<li>
		<select name="whom">
      
      <?php
         $v=$db->prepare("select * from uyeler where uye_order=?");
         $v->execute(array(1));
         $c=$v->fetchALL(PDO :: FETCH_ASSOC);
    foreach ( $c as $m) {
    	echo '
    	
    	<option value="'.$m["uye_id"].'">'.$m["uye_name"].'</option>'
            
    	;

    }
     
      ?>
      </select>
	</li>	
	<li>Written Us</li>
	<li><textarea name="mesaj" id="" cols="50" rows="10"></textarea></li>
	
	<li><button type="submit">gonder</button></li>
	</ul>
	</form>
	</div>


	<?php

}
else{

	?>
	<div class="sol2">
   	<h2>Connect With Us</h2>
   	 <form action="" method="post">
	<ul> 
	<li>Name</li>
	<li><input type="text" name="name" /></li>
	<li>Topic Head</li>
	<li><input type="text" name="topic" /></li>
	<li>Message to Admin</li>
	<li>
		<select name="whom">
      
      <?php
         $v=$db->prepare("select * from uyeler where uye_order=?");
         $v->execute(array(1));
         $c=$v->fetchALL(PDO :: FETCH_ASSOC);
    foreach ( $c as $m) {
    	echo '
    	
    	<option value="'.$m["uye_id"].'">'.$m["uye_name"].'</option>'
            
    	;

    }
     
      ?>
      </select>
	</li>	
	<li>Written Us</li>
	<li><textarea name="mesaj" id="" cols="50" rows="10"></textarea></li>
	
	<li><button type="submit">gonder</button></li>
	</ul>
	</form>
	</div>


	<?php
}

}



?>