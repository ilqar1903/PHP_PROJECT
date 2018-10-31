<?php !defined("index.php") ? die("hacking"):null; ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
    .xeta {
	border: 1px solid #ddd;
	padding: 5px;
	font-size: 20px;
	background-color: green;
    text-align: center;
    color: lightyellow;
}
</style>
</head>
<body>
<?php

if($_POST){

$name=trim($_POST['name']);
$password=trim(md5($_POST['password']));


if(!$name || !$password){

	echo '<div class="xeta" > user name and password cannot empty </div>';

}

else{
 
$uye=$db->prepare("select * from uyeler where uye_name=? and uye_password=? and uye_onay=?");
$uye->execute(array($name,$password,1));
$z=$uye->fetch(PDO :: FETCH_ASSOC);
$x=$uye->rowcount();

if($x){

$_SESSION['uye']=$z['uye_name'];
$_SESSION['eposta']=$z['uye_eposta'];
$_SESSION['order']=$z['uye_order'];
$_SESSION['id']=$z['uye_id'];

header("Location:index.php");

}




 if(   $z['uye_onay'] == 0  ){
		
	
  echo '<div class="xeta"> Waiting  for check your membership from admin</div>';



}


else{
	echo '<div class="xeta" > user name and password is wrong </div>' ;
}


}


}



?>
</body>
</html>
