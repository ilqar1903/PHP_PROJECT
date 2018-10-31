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
$v = $db->prepare("select * from topics where topic_id=?");
$v->execute(array($id));

$m = $v->fetch(PDO::FETCH_ASSOC);

?>

<div class="admin-icerik-sag"> 
			<h2>Add Topic</h2>
           <?php
              if($_POST){
              	$topic=@$_POST['topic'];
              	$image=@$_POST['image'];
              	$category=@$_POST['category'];
              	$yazi=@$_POST['yazi'];
              	$check=@$_POST['check'];
              	$date=@$_POST['date'];
              	
              	
              	if(!$topic || !$image || !$yazi){
					
					echo '<div class="xeta">You must  be filled empty areas...</div>';
					
				}
				else{
                         $update = $db->prepare("insert topics set 
					
					      topic_head   = ?,
						  topic_resim    = ?,
						  topic_catagory = ?,
						  topic_yazi = ?,
						 topic_condi   = ?,
						 topic_date=?,
						  topic_added = ?
					
					");
                         $up = $update->execute(array($topic,$image,$category,$yazi,$check,$date,$_SESSION['uye']));

                         if($up){
						
						echo '<div class="suc">Succesfully inserted...</div>';
						
						header("refresh: 2; url=/admin/?do=topics");
						
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
				<li><input type="text" name="topic"  /></li>
				<li>Image Url</li>
				<li><input type="text" name="image" /></li>
				<li>Category</li>
				<li>
			    <select name="category" >
                     <?php
				
				$b = $db->prepare("select * from  category order by categori_id desc");
				$b->execute(array()); 
				$c = $b->fetchALL(PDO::FETCH_ASSOC);
				
				foreach($c as $z){
					
					echo '<option value="'.$z["categori_id"].'">'.$z["categori_name"].'</option>';
					
				}
				
				?>
				
				</select></li>
				<li>Date</li>
				<li><input type="timelapse" name="date"></li>
			    
				<li>Written</li>
				<li><textarea name="yazi" id="" cols="30" rows="10"></textarea></li>
				<li><select name="check" id=""> 
				<option value="1">Check</option>
				<option value="0" >Not Checkly</option>
				</select></li>
				<li><button type="submit">Add Topic</button></li>
				</ul>
				</form>
              	</div>
              	<?php
              }


                 ?>

</body>
</html>