
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
$v = $db->prepare("select * from comments where comment_id=?");
$v->execute(array($id));

$m = $v->fetch(PDO::FETCH_ASSOC);

?>

<div class="admin-icerik-sag"> 
			<h2>Comment Edit</h2>
           <?php
              if($_POST){
              	$message=@$_POST['mesaj'];
              	$check=@$_POST['check'];
              	$date=@$_POST['date'];
              	
              	
              	if(!$message){
					
					echo '<div class="xeta">You must  be filled empty areas...</div>';
					
				}
				else{
                         $update = $db->prepare("update comments set 
					
					      comment_mesaj  = ?,
						 
						 comment_per   = ?,
						 comment_date=?  where  comment_id =?
					
					");
                         $up = $update->execute(array($message,$check,$date,$id));

                         if($up){
						
						echo '<div class="suc">Succesfully updated...</div>';
						
						header("refresh: 2; url=/admin/?do=comments");
						
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
				
				<li>Date</li>
				<li><input type="timelapse" name="date"></li>
			    
				<li>Comment</li>
				<li><textarea name="mesaj" id="" cols="30" rows="10"><?php echo $m["comment_mesaj"];?> </textarea></li>
				<li><select name="check" id=""> 
				<option value="1"<?php echo $m["comment_per"] == 1 ? 'selected' : null;?>>Check</option>
				<option value="0" <?php echo $m["comment_per"] == 0 ? 'selected' : null;?> >Not Check</option>
				</select></li>
				<li ><button type="submit" style="border: 1px solid black; width:130px; background-color: lightgreen; color:white;">Edit Comment</button></li>
				</ul>
				</form>
              	</div>
              	<?php
              }


                 ?>

			</div>


</body>
</html>