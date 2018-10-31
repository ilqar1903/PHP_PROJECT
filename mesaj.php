<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.mesaj{
border: 1px solid #eee;
padding: 10px;
font-size: 20px;
background-color:lightyellow;
font-weight: bold;
margin-bottom: 10px;
		}
		.mesajlar ul li{
border: 1px solid #eee;
padding: 10px;
		font-size: 20px;
		background-color:lightgreen;
    margin-bottom: 10px;	
		}
        .mesajlar2 ul li{
border: 1px solid #eee;
padding: 10px;
    font-size: 20px;
    background-color:lightblue;
    margin-bottom: 10px;  
    }

	</style>
</head>
<body>


<?php
if($_SESSION){

$v=$db->prepare("select * from mesajlar where mesaj_whom=? order by mesaj_id desc");
$v->execute(array($_SESSION["id"]) );
$c=$v->fetchALL(PDO :: FETCH_ASSOC);
$x=$v->rowCount();
    echo '<div class="mesaj">
        <h2>messages <a href="?sec=mesaj_send"><span style="float:right;">Send message<span></a></h2>
        </div>';
    
    if($x){
       
     foreach ($c as $m) {
          
          if($m['mesaj_whom']==$_SESSION["id"]){
          	if($m["mesaj_read"] == 1){
              ?>
             <div class="mesajlar2">
              <ul>
                 <li>
                  <a href="?sec=messageRead&id=<?php echo $m["mesaj_id"];?>">
                  <span style="font-weight: bold">Sender: </span><?php echo $m['mesaj_send'];?>
                  <span style="font-weight: bold">Header: </span><?php echo mb_substr($m['mesaj_head'],0,25);?></a>
                  <span style="float:right;"><?php echo $m["mesaj_date"]; echo "  "; ?>
                    <a href="?sec=delMessage&id=<?php echo $m["mesaj_id"];?>"><span style="font-weight:bold;font-size: 20px;">Delete Message</span></a></span>
                 </li>
              </ul> 

             </div>
            <?php
            }
            else{
                    ?>
             <div class="mesajlar">
              <ul>
                 <li>
                  <a href="?sec=messageRead&id=<?php echo $m["mesaj_id"];?>">
                  <span style="font-weight: bold">Sender: </span><?php echo $m['mesaj_send'];?>
                  <span style="font-weight: bold">Header: </span><?php echo mb_substr($m['mesaj_head'],0,25);?></a>
                  <span style="float:right;"><?php echo $m["mesaj_date"]; echo "  "; ?>
                    <a href="?sec=delMessage"><span style="font-weight:bold;font-size: 20px;">Delete Message</span></a></span>
                 </li>
              </ul> 

             </div>
             <?php

            }

          }

          else{
               echo "You entered unknown place";
          }
     	
     }
    }

    else{


    	echo "You have not any message";

    }


}
?>

</body>
</html>