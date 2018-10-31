
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

$v = $db->prepare("select * from category order by categori_id desc limit 20");
$v->execute(array());
$k = $v->fetchALL(PDO::FETCH_ASSOC);
$x = $v->rowCount();



?>

<div class="admin-icerik-sag"> 
			<h2> Categories <a href="/admin/?do=cat_add"><span style="float: right;color:green;">Add Category</span></a></h2>
			<div class="konular"> 
			<table cellspacing="0" cellpadding="0"> 
			<thead> 
			<tr> 
			<th width="500">Category</th> <th width="500">Category About Written</th>
			<th width="200">Operations</th>
			</tr>
			</thead>
			<?php 
			 if($x){
				
                foreach($k as $m){
					?>
					<tbody> 
					<tr> 
					<td><?php echo $m["categori_name"];?></td> <td><?php echo $m["categori_yazi"];?></td>
					
					
					<td><span style="margin-left:10px;"><a href="/admin/?do=cat_edit&id=<?php echo $m['categori_id'];?>">Edit</a></span> <span style="margin-left:10px;"><a href="/admin/?do=cat_del&id=<?php echo $m['categori_id'];?>">Delete</a></span></td>
					</tr>
					</tbody>
					<?php
					
					
				}				
				 
			 }else {
				 
				echo '<tr><td colspan="5"><div class="xeta">There is no topic </div></td></tr>'; 
				 
			 }
			
			?>
			</table>
			</div>
			</div>
</body>
</html>