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

$v = $db->prepare("select * from uyeler  order by uye_id desc limit 20");
$v->execute(array());
$k = $v->fetchALL(PDO::FETCH_ASSOC);
$x = $v->rowCount();



?>

<div class="admin-icerik-sag"> 
			<h2> Users <a href="/admin/?do=user_add"><span style="float: right;color:green;">Add User</span></a></h2>
			<div class="konular"> 
			<table cellspacing="0" cellpadding="0"> 
			<thead> 
			<tr> 
			<th width="600">User Name</th> <th width="300">User Email</th>
			<th width="200">User Check</th> <th width="250">Date</th>
			<th width="200">Operations</th>
			</tr>
			</thead>
			<?php 
			 if($x){
				
                foreach($k as $m){
					?>
					<tbody> 
					<tr> 
					<td><?php echo $m["uye_name"];?></td> <td><?php echo $m["uye_eposta"];?></td>
					<td> 
					<?php 
					
					if($m["uye_onay"] == 1){
						
						echo '<span style="color:green">Checkly</span>';
						
					}else {
						
						echo '<span style="color:red">Not Checkly</span>';
						
					}
					
					?>
					
					</td>
					<td><?php echo $m["uye_date"];?></td> 
					<td>



						<span style="margin-left:10px;"><a href="/admin/?do=uye_edit&id=<?php echo $m['uye_id'];?>">Edit</a></span> <span style="margin-left:10px;"><a href="/admin/?do=uye_del&id=<?php echo $m['uye_id']; ?>"><?php if($m['uye_order']==0){ echo "Delete"; }?></a></span></td>
					</tr>
					</tbody>

					<?php

					
					
				}				
				 
			 }else {
				 
				echo '<tr><td colspan="5"><div class="xeta">There is no user </div></td></tr>'; 
				 
			 }
			
			?>
			</table>
			</div>
			</div>
</body>
</html>