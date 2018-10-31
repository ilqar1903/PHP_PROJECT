
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
<?php

$id=@$_GET['id'];
$v = $db->prepare("select * from category where categori_id=?");
$v->execute(array($id));

$m = $v->fetch(PDO::FETCH_ASSOC);

?>

<div class="admin-icerik-sag"> 
			<h2>Add Topic</h2>
           <?php
              if($_POST){
              	$name=@$_POST['name'];
              	$yazi=@$_POST['yazi'];
              	
              	
              	
              	if(!$name || !$yazi){
					
					echo '<div class="xeta">You must  be filled empty areas...</div>';
					
				}
				else{
					$kontrol = $db->prepare("select * from category where categori_name=?");
					$kontrol->execute(array($name));
					$listele = $kontrol->fetch(PDO::FETCH_ASSOC);
					$x = $kontrol->rowCount();
					
					if($x){
					
					   echo '<div class="xeta"><span style="color:red;">'.$name.'</span> The same category has in the system</div>';
					}
					else{
                         $update = $db->prepare("insert category set 
					
						 categori_name=?,
						 categori_yazi=?
						 
						  
					
					");
                         $up = $update->execute(array($name,$yazi));

                         if($up){
						
						echo '<div class="suc">Succesfully inserted...</div>';
						
						header("refresh: 2; url=/admin/?do=categories");
						
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
				<li>Category Name</li>
				<li><input type="text" name="name"  /></li>
				
			    
				<li>Category Written</li>
				<li><textarea name="yazi" id="" cols="30" rows="10"></textarea></li>

				<li><button type="submit"  style="border: 1px solid black; width:110px; background-color: lightgreen; color:white;">Add Category</button></li>
				</ul>
				</form>
              	</div>
              	<?php
              }


                 ?>
</body>
</html>