<div class="admin-icerik-sag"> 
			<h2>Exit from Admin Panel</h2>
<?php
session_destroy();
echo "<div style='padding:10px; font-size:19px; background:red; color:lightyellow;'> You successfully exiting from Admin Panel... Directing to Home Page</div>";

header("refresh:2; url=/index.php");

?>
</div>