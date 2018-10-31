<?php

if($_SESSION){

    $id=@$_GET['id'];
    $v=$db->prepare("delete from mesajlar where mesaj_id=? and mesaj_whom=?");
   $del= $v->execute(array($id,$_SESSION['id']));
    $x=$v->rowCount();
    if($x){

    	if($del){
           echo "Successfully deleted";
           header("refresh: 2; url=?sec=mesaj");
    	}

    	else{

    		echo "There is problem";
    	}

    }

    else{

    	echo "Undefined operation There is no message for deleting";
    }

}



?> 