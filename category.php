<?php !defined("index.php") ? die("hacking"):null; ?>

<div class="sag3"> 
	<h2 style="background: #eceff1;">Categories</h2>
	<ul > 

<?php


$kategori=$db->prepare("select *from category");
$kategori->execute(array());
$v=$kategori->fetchAll(PDO::FETCH_ASSOC);

$x=$kategori->rowcount();
if($x){

foreach ( $v as $a) {
	echo '<li style="background: #fff8e1 ;"><a href="?sec=kategori&id='.$a["categori_id"].'">'.$a['categori_name'].'</a></li>';
}

}

else{
	echo "There is no category";
}
?>


	</ul>
	</div>