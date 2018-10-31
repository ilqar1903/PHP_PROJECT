
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
$v = $db->prepare("select * from category where categori_id=?");
$v->execute(array($id));

$m = $v->fetch(PDO::FETCH_ASSOC);

?>

<div class="admin-icerik-sag"> 
			<h2> Category Edit</h2>
           <?php
              if($_POST){
              	$name=@$_POST['name'];
              	$yazi=@$_POST['yazi'];
              
              	
              	
              	
              	
              	if(!$name || !$yazi){
					
					echo '<div class="xeta">You must  be filled empty areas...</div>';
					
				}
				else{
                         $update = $db->prepare("update category set 
					
					      categori_name  = ?,
						  categori_yazi = ?
						 where categori_id =?
					
					");
                         $up = $update->execute(array($name,$yazi,$id));

                         if($up){
						
						echo '<div class="suc">Succesfully updated...</div>';
						
						header("refresh: 2; url=/admin/?do=categories");
						
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
				<li>Topic Head</li>
				<li><input type="text" name="name" value="<?php echo $m["categori_name"];?>" /></li>
				
				<li>Written</li>
				<li><textarea name="yazi" id="" cols="30" rows="10"><?php echo $m["categori_yazi"];?> </textarea></li>
				
				<li><button type="submit"  type="submit" style="border: 1px solid black; width:120px; background-color: lightgreen; color:white;">Edit Category</button></li>
				</ul>
				</form>
              	</div>
              	<?php
              }


                 ?>

			</div>

</body>
</html>