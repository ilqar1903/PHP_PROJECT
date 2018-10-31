<?php !defined("index.php") ? die("hacking"):null; ?>
<?php

if(!$_SESSION){

    if($_POST){
    $name=strip_tags($_POST['name']);
    $pass=strip_tags(trim($_POST['pass']));
    $email=trim($_POST['email']);
    $mesaj=$_POST['mesaj'];
    if(!$name|| !$pass || !$email){

     echo "Cannot be empty these areas";


    }
    else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){

         echo "This is noncorrect email";
   
    }
    else{
      $pass=md5($pass);
     $a =$db->prepare("select * from uyeler where uye_name=?");
      $a->execute(array($name));
     $x = $a->fetch(PDO :: FETCH_ASSOC);
    $y=$a->rowCount();

    if($y){

    	echo '<span style="color:red;">'.$x['uye_name']."</span>  Have same name in the system... impossible";
    }

    else{
    	$x=$db->prepare("insert into uyeler   set 
                  uye_name=?,
                  uye_password=?,
                  uye_eposta=?,
                  uye_about=?

    		");
    	$s=$x->execute(array($name,$pass,$email,$mesaj));
    	if($s){
    		echo "Successfully loaded,Can log in";
    		header("refresh:2; url=index.php");
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
   <form action="" method="post">
   	<h2>SIGN UP </h2>
	<ul> 
	<li>Name</li>
	<li><input type="text" name="name" /></li>
    <li>Password</li>
	<li><input type="password" name="pass" /></li>
	<li>Email</li>
	<li><input type="text" name="email" /></li>
	
	<li>ABOUT <span style="color:red">*</span></li>
	<li><textarea name="mesaj" id="" cols="50" rows="10"></textarea></li>
	
	<li ><button type="submit">Send</button>	<span style="color:red; float: right;">*Not Important</span></li>

	</ul>
	</form>
	</div>


<?php

    }

}


?>