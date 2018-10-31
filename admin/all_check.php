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
	<div class="admin-icerik-sag"> 
			<h2>admin paneli anasayfa</h2>
		

			<?php
       $check=@$_POST["check"];
       $a=implode(",",$check);
       $c=$db->query("update  comments set comment_per=1 where comment_id in($a)");
if($c){
echo "<div class='suc'>The comments has been successfully checked</div>";
header("refresh:2; url=/admin/?do=comments");
}
else{
echo "<span class='xeta'>There is problem</span>";
}
         

			?>
				</div>

</body>
</html>