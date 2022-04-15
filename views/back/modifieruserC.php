<?php 

include_once '../../core/UserC.php';
include_once '../../entities/user.php';


if(  isset($_POST['mail']) and isset($_POST['username'])  and isset($_POST['prenom'])  and isset($_POST['nom'])  and isset($_POST['id']))
{
	$u = new User(0,$_POST['nom'],$_POST['prenom'],$_POST['mail'],"","",$_POST['username']);
    $UserC = new UserC();
	$UserC->modifieruser_client($u,$_POST['id']);
	header('Location: users.php');
}
else{
	echo "verifier les champs";
}

 ?>



 