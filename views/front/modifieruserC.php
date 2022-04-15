<?php 

include_once '../../core/UserC.php';
include_once '../../entities/user.php';


if(  isset($_POST['mail']) and isset($_POST['username'])  and isset($_POST['prenom'])  and isset($_POST['nom']) and isset($_POST['password'])  and isset($_POST['id']))
{
	$u = new User($_POST['id'],$_POST['nom'],$_POST['prenom'],$_POST['mail'],$_POST['password'],"role_user",$_POST['username']);
    $UserC = new UserC();
	$UserC->modifieruser($u,$_POST['id']);
	header('Location: index.php');
}
else{
	echo "verifier les champs";
}

 ?>



 