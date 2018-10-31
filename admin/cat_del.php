
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

$id=$_GET['id'];
$v = $db->prepare("select * from category where categori_id=?");
$v->execute(array($id));

$m = $v->fetch(PDO::FETCH_ASSOC);

?>

<div class="admin-icerik-sag"> 
			<h2>Delete Category</h2>

			<div class="konular">
				<?php
			$v = $db->prepare("delete from category where categori_id=?");
			$del = $v->execute(array($id));
			if($del){
				
				echo '<div class="suc">Successfully deleted... directing....</div>';
				header("refresh: 2; url=/admin/?do=categories");
			}else {
				
				echo '<div class="xeta">There is problem</div>';
				
			}
			?>

			</div>
			</div>

</body>
</html>