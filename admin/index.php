
<!DOCTYPE HTML>
<html lang="en-US">
<head>

	<meta charset="UTF-8">
	<title>The News of Guardian ---- Admin Panel </title>
	<link rel="stylesheet" href="../css/styles.css" />
	<link rel="stylesheet" href="../css/reset.css" />
	<link rel="stylesheet" href="../css/admin.css" />
</head>
<body>

	<?php session_start();?>
<?php include("ayar.php");?>
	<?php 
	if($_SESSION){
		
		if($_SESSION["order"] == 1){
			?>
			<div class="admin-genel"> 
			<div class="admin-header" style="background: #37474f; height: 180px;"> 
			<h2><a href="/admin/" style="color:#dfa; margin: 10px 0 0 30px; font-size: 27px;">The News of Guardian <span style="color:#DFF;">Admin Panel</span></a>
			<span style="float:right; margin-right:30px; "><a href="/index.php" style="color:lightyellow;">Return the site</a></span>
			</h2>
			<div class="uye" style="color:lightyellow; margin-left: 60px;">
			Welcome to admin panel : <?php echo $_SESSION["uye"];?></div>
			</div>
			<div class="admin-icerik"> 
			<div class="admin-menu" style="background: #61B49E; min-height: 458px;"> 
			<ul> 
		    <li><a href="/admin/" style="color:#000;">Home</a></li>
			<li><a href="/admin/?do=topics"  style="color: #000;">Topics</a></li>
			<li><a href="/admin/?do=users"  style="color: #000;">Users</a></li>
			<li><a href="/admin/?do=comments"  style="color:#000;">Comments</a></li>
			<li><a href="/admin/?do=categories" style="color: #000;">Categories</a></li>
			<li><a href="/admin/?do=exit"  style="color: #000;">Exit</a></li>
			</ul>
			</div>
			<?php 
			  
			  $do = @$_GET["do"];
			  
			  if(file_exists("{$do}.php")){
				  
				  include("{$do}.php");
				  
			  }else {
				  
				 include("anasayfa.php"); 
				  
			  }
			  
			
			?>
			</div>
			</div>
			<?php
			
			
		}else {
			
			echo '<div class="hata">You dont responsive in Admin Panel</div>';
		}
		
	}else{
		
		echo '<div class="hata">For entering to Admin Panel Must be log in</div>';
	}
	
	?>
	
	
</body>
</html>


















