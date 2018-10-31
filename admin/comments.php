<!DOCTYPE html>
<html>
<head>
	<title></title>
		<style type="text/css">
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

$v = $db->prepare("select * from comments order by comment_id desc limit 20");
$v->execute(array());
$k = $v->fetchALL(PDO::FETCH_ASSOC);
$x = $v->rowCount();



?>

<div class="admin-icerik-sag"> 
			<h2> Comments</h2>
			<div class="konular"> 
			<table cellspacing="0" cellpadding="0"> 
			<thead> 
			<tr> 
			<th width="600">Comments</th> <th width="300">Comment Adder</th>
			<th width="200">Comments Checking</th> <th width="250">Date</th>
			<th width="200">Operations</th>
			</tr>
			</thead>
			<?php 
			 if($x){
				
                foreach($k as $m){
					?>
					<tbody> 
					<tr> 
					<td><?php echo mb_substr($m["comment_mesaj"],0,40);?></td> <td><?php echo $m["commen_added"];?></td>
					<td> 
					<?php 
					
					if($m["comment_per"] == 1){
						
						echo '<span style="color:green">Checkly</span>';
						
					}else {
						
						echo '<span style="color:red">Not Checkly</span>';
						
					}
					
					?>
					
					</td>
					<td><?php echo $m["comment_date"];?></td> 
					<td><span style="margin-left:10px;"><a href="/admin/?do=comment_edit&id=<?php echo $m['comment_id'];?>">Edit</a></span> <span style="margin-left:10px;"><a href="/admin/?do=comment_del&id=<?php echo $m['comment_id'];?>">Delete</a></span>
						<form  style="display:inline" action="/admin/?do=all_check" method="post">
						<input type="checkbox" name="check[]" value="<?php echo $m["comment_id"]; ?>" />
					</td>
					</tr>
					</tbody>
					<?php
					
					
				}				
				 
			 }else {
				 
				echo '<tr><td colspan="5"><div class="xeta">There is no topic </div></td></tr>'; 
				 
			 }
			
			?>
			</table>
			<button type="submit" style="float: right;padding: 5px; margin: 5px; background:skyblue; cursor: pointer;">Check the choosing comments</button>
		</form>
			</div>
			</div>

</body>
</html>