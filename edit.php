<?php !defined("index.php") ? die("hacking"):null; ?>
<?php

if($_SESSION){
$uye=@$_GET['uye'];
   if($_SESSION['uye']==$uye){
	
	$v = $db->prepare("select * from uyeler where uye_name=?");
        $v->execute(array($uye));
		   $m = $v->fetch(PDO::FETCH_ASSOC);
		   $x = $v->rowcount(); 
          
          if($x){
                
                if($_POST){
                	$email = strip_tags (trim($_POST["email"]));
			   $password = strip_tags(trim($_POST["password"]));
			   $hakkimda = strip_tags(trim($_POST["about"]));
			   if(!$email){
			   	echo "Cannot be empty";
			   }
			   elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)){
			  
			  
			  echo '<div>The email is wrong</div>';

                }

                else{

                	   if($password){
				  
				  $password = md5($password);
				  
			  }else {
				  
				  $password = $m["uye_password"];
				  
			  }
			  
			  $update = $db->prepare("update uyeler set 
			  
			               uye_eposta=?,
						   uye_password=?,
						   uye_about=? where uye_name=?
			  
			  ");

			     $qeyd =  $update->execute(array($email,$password,$hakkimda,$_SESSION["uye"]));

           if($qeyd){
			   
			   echo '<div >Successfully updated</div>';
			   
			   header("refresh: 2; url=?sec=profil&uye=$uye");
			   
		   }else {
			   
			   echo '<div>There is problem</div>';
			   
		   }		 
                }

               

       


}

        else{
           
              ?>


<div class="sol2">
   <form action="" method="post">
   	<h2>Profil Edit</h2>
	<ul> 
	<li>email</li>
	<li><input type="text" value="<?php echo $m["uye_eposta"];?>" name="email" /></li>
	<li>Change password</li>
	<li><input type="password" name="password" placeholder="New Password" /></li>
	<li>About</li>
	<li><textarea name="about" id="" cols="50" rows="10"><?php echo $m['uye_about'];?></textarea></li>
	
	<li><button type="submit">Profili duzenle</button></li>
	</ul>
	</form>
	</div>




                  <?php
                  }

          

}
          else{

          	echo "The user cannot find";
          }

   
}

   else{
   	echo "You are in wrong way";
   	die();

   	session_destroy();

   }

}

?>








