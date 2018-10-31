<!DOCTYPE html>
<html>
<head>
	<title></title>
		<style type="text/css">
	.konular ul li{
		font-size:20px;
		margin:2px;
		font-weight:bold;
	}
		.konular ul li input{
			width: 240px;
			font-size: 20px;
			height: 25px;
		}
		.konular ul li select{
			width: 120px;
			height: 30px;
			font-size: 17px;
			margin-top:5px;
		}
		.konular ul li textarea{
			width:450px;
			height: 200px;
			font-size: 18px;
		}
		.konular ul li button{
                  width:100px;
                  margin-top: 5px;
                  padding: 10px;
                  background-color: lightblue;
                  margin-left: 356px;
                  cursor:pointer;
                  border: 1px solid skyblue;
                  font-size:16px;
                  border-radius:5px;
		}

			.xeta{
            background-color:red;
            font-size: 21px;
         padding: 5px;
              text-align: center;
              color: lightyellow;

		}
		.suc{
            background-color:green;
            font-size: 22px;
            
              text-align: center;
              color: lightyellow;
              padding: 5px;

		}
	</style>
</head>
<body>


<div class="admin-icerik-sag"> 
			<h2>Add User</h2>
           <?php
              if($_POST){
              	$name=@$_POST['name'];
              	$pass=@$_POST['password'];
              	$email=@$_POST['email'];
              	$order=@$_POST['order'];
              	$yazi=@$_POST['yazi'];
              	$date=@$_POST['date'];
              	$check=@$_POST['check'];
              
              	
              	
              	if(!$name || !$pass || !$email){
					
					echo '<div class="xeta">You must  be filled empty areas...</div>';
					
				}
				   else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){

                             echo "This is noncorrect email";
               
                   }
				else{
					$pass=md5($pass);

					$control=$db->prepare("select *from uyeler where uye_name=?");
					$control->execute(array($name));
					$c=$control->fetch(PDO :: FETCH_ASSOC);
					$x=$control->rowCount();
					if($x){
                       echo '<div class="xeta">'.$name.'----There is same name in the system</div>';
					}
					else{
                         $insert = $db->prepare("insert uyeler set 
					
					      uye_name  = ?,
						  uye_password    = ?,
						  uye_eposta = ?,
						  uye_order=?,
						  uye_about = ?,
						  uye_date=?,
						  uye_onay=?
					
					");
                         $in = $insert->execute(array($name,$pass,$email,$order,$yazi,$date,$check));

                         if($in){
						
						echo '<div class="suc">User successfully inserted...</div>';
						
						header("refresh: 2; url=/admin/?do=users");
						
					}else {
						
						echo '<div class="xeta">There is problem</div>';
						
					}
				}
 
				}

              }
              
              else{

              	?>
              	<div class="konular">
              	<form action="" method="post">
				<ul> 
				<li>Name</li>
				<li><input type="text" name="name"  /></li>
				<li>Password</li>
				<li><input type="password" name="password" /></li>
				<li>Email</li>
				<li><input type="text" name="email"  /></li>
				<li>Order</li>
				<li><select name="order">
					<option value="0">user</option>
					<option value="1">admin</option>
				</select></li>
				
				<li>Date</li>
				<li><input type="timelapse" name="date"></li>
			    
				<li>About</li>
				<li><textarea name="yazi" id="" cols="30" rows="10"></textarea></li>
				<li><select name="check" id=""> 
				<option value="1">Check</option>
				<option value="0" >Not Checkly</option>
				</select></li>
				<li><button type="submit">Add User</button></li>
				</ul>
				</form>
              	</div>
              	<?php
              }


                 ?>

</body>
</html>