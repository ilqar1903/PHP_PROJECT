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
			font-size: 17px;
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

	<?php

$id=$_GET['id'];
$v = $db->prepare("select * from uyeler where uye_id=?");
$v->execute(array($id));

$m = $v->fetch(PDO::FETCH_ASSOC);

?>

<div class="admin-icerik-sag"> 
			<h2>User Edit</h2>
           <?php
              if($_POST){
              	$name=@$_POST['name'];
              	$pass=@$_POST['password'];
              	$email=@$_POST['email'];
                $order=@$_POST['order'];
                $date=@$_POST['date'];
              	$yazi=@$_POST['yazi'];
              	$check=@$_POST['check'];
              	if(!$name|| !$email){
					
					echo '<div class="xeta">You must  be filled empty areas...</div>';
					
				}
				    else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){

                             echo "This is noncorrect email";
               
                   }
				else{
				if($pass){
					$pass=md5($pass);
				}
				else{
					$pass=$m['uye_password'];
				}
                 

                   
                         $update = $db->prepare("update uyeler set 
					
					      uye_name  = ?,
						  uye_password   = ?,
						  uye_eposta = ?,
						  uye_order = ?,
						  uye_date  = ?,
						  uye_about=?,
						  uye_onay = ? where uye_id =?
					
					");
                         $up = $update->execute(array($name,$pass,$email,$order,$date,$yazi,$check,$id));

                         if($up){
						
						echo '<div class="suc">User succesfully updated...</div>';
						
						header("refresh: 2; url=/admin/?do=users");
						
					}else {
						
						echo '<div class="xeta">There is problem</div>';
						
					}
 
				}
			

              }
              
              else{

              	?>
              	<div class="konular">
              	<form action="" method="post">
				<ul> 
				<li>User Name</li>
				<li><input type="text" name="name" value="<?php echo $m["uye_name"];?>" /></li>
				<li>Password</li>
				<li><input type="text" name="password"  placeholder="Enter new password" /></li>
				<li>User Email</li>
				<li><input type="text" name="email" value="<?php echo $m["uye_eposta"];?>" /></li>
				<li>Order</li>
				<li>
					<select name="order">
						<option value="0" <?php echo $m['uye_order']==0 ? 'selected' :null; ?>> User </option>
						<option value="1" <?php echo $m['uye_order']==1 ? 'selected' :null; ?>>Admin</option>

					</select>
				</li>
				<li>Date</li>
				<li><input type="timelapse" name="date"></li>
			    
				<li>About User</li>
				<li><textarea name="yazi" id="" cols="30" rows="10"><?php echo $m["uye_about"];?> </textarea></li>
				<li><select name="check" id=""> 
				<option value="1"<?php echo $m["uye_onay"] == 1 ? 'selected' : null;?>>Check</option>
				<option value="0" <?php echo $m["uye_onay"] == 0 ? 'selected' : null;?> >Not Check</option>
				</select></li>
				<li><button type="submit">Edit User</button></li>
				</ul>
				</form>
              	</div>
              	<?php
              }


                 ?>

			</div>

</body>
</html>