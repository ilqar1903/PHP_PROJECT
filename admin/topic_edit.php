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
$v = $db->prepare("select * from topics where topic_id=?");
$v->execute(array($id));

$m = $v->fetch(PDO::FETCH_ASSOC);

?>

<div class="admin-icerik-sag"> 
			<h2>Topic Edit</h2>
           <?php
              if($_POST){
              	$topic=@$_POST['topic'];
              	$image=@$_POST['image'];
              	$category=@$_POST['category'];
              	$yazi=@$_POST['yazi'];
              	$check=@$_POST['check'];
              	$date=@$_POST['date'];
              	
              	$topic_added=$m['topic_added'];
              	if(!$topic || !$image || !$yazi){
					
					echo '<div class="xeta">You must  be filled empty areas...</div>';
					
				}
				else{
                         $update = $db->prepare("update topics set 
					
					      topic_head   = ?,
						  topic_resim    = ?,
						  topic_catagory = ?,
						  topic_yazi = ?,
						 topic_condi   = ?,
						 topic_date=?,
						  topic_added = ? where topic_id =?
					
					");
                         $up = $update->execute(array($topic,$image,$category,$yazi,$check,$date,$topic_added,$id));

                         if($up){
						
						echo '<div class="suc">Succesfully updated...</div>';
						
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
				<li><input type="text" name="topic" value="<?php echo $m["topic_head"];?>" /></li>
				<li>Image Url</li>
				<li><input type="text" name="image" value="<?php echo $m["topic_resim"];?>" /></li>
				<li>Category</li>
				<li>
			    <select name="category" >
                     <?php
				
				$b = $db->prepare("select * from  category order by categori_id desc");
				$b->execute(array());
				$c = $b->fetchALL(PDO::FETCH_ASSOC);
				
				foreach($c as $z){
					
					echo '<option value="'.$z["categori_id"].'"';
					
					echo $m["topic_catagory"] == $z["categori_id"] ? 'selected' : null;
					echo '>'.$z["categori_name"].'</option>';
					
				}
				
				?>
				
				</select></li>
				<li>Date</li>
				<li><input type="timelapse" name="date"></li>
			    
				<li>Written</li>
				<li><textarea name="yazi" id="" cols="30" rows="10"><?php echo $m["topic_yazi"];?> </textarea></li>
				<li><select name="check" id=""> 
				<option value="1"<?php echo $m["topic_condi"] == 1 ? 'selected' : null;?>>Check</option>
				<option value="0" <?php echo $m["topic_condi"] == 0 ? 'selected' : null;?> >Not Check</option>
				</select></li>
				<li><button type="submit">Edit Topic</button></li>
				</ul>
				</form>
              	</div>
              	<?php
              }


                 ?>

			</div>


</body>
</html>