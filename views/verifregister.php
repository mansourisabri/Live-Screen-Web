<?php
include_once '../core/UserC.php';
include_once '../entities/user.php';
	if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['nom']) && isset($_POST['username']) && isset($_POST['prenom']) )
{
$u = new User(0,$_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['password'],"role_user",$_POST['username']);
	$UserC = new UserC();
$UserC->ajouteruser($u);
	header("location:login.html"); 
	


}





 ?>