	<?php !defined("index.php") ? die("hacking"):null; ?>
<?php

if($_SESSION){
   
   ?>

   <div class="sag3" > 
	<h2 style="background: #eceff1;">User Profil</h2>
	<div style="border:1px solid #eee;padding:7px;font-size:19px;font-weight:bold;">
	Welcome: <?php echo $_SESSION["uye"];?></div>
	<ul> 
   <?php
   if( $_SESSION['order'] == 1){

   		echo '<li><a href="/admin/">Admin Panel</a></li>';

   }


   ?>

	<li><a href="?sec=profil&uye=<?php echo $_SESSION["uye"];?>">Profil</a></li>
    <li><a href="?sec=mesaj">Message</a>
    <?php
    $v=$db->prepare("select * from mesajlar where mesaj_whom=? and mesaj_read=?");
$v->execute(array($_SESSION["id"],0) );
$c=$v->fetchALL(PDO :: FETCH_ASSOC);
$x=$v->rowCount();
echo "(".$x.")";

    $v=$db->prepare("select * from mesajlar where mesaj_whom=? and mesaj_read=?");
$v->execute(array($_SESSION["id"],1) );
$c=$v->fetchALL(PDO :: FETCH_ASSOC);
$x=$v->rowCount();
echo "(".$x.")";

    ?>

    </li>
	<li><a href="?sec=add_topic">Add Topic</a></li>
	<li><a href="?sec=exit">Exit</a></li>
	</ul>
	</div>
   <?php
}
else{
	?>

<div class="sag2"  > 
	<h2  style=" background:#eceff1;">Log In Place</h2>
	<ul> 
  <form action="?sec=uye" method="post">	
	<li>User Name</li>
	<li><input type="text" name="name" /></li>
	<li>Password</li>
	<li><input type="password" name="password" /></li>

	<li><button type="submit">Log In</button></li>
	</form>	
	</ul>
	</div>

<?php
}

?>

	