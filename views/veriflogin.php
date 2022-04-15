<?php
include_once '../core/UserC.php';

	if(isset($_POST['login']) && isset($_POST['mdp']))
{
	$UserC = new UserC();
	$result = $UserC->verifierLogin($_POST['login'],$_POST['mdp']);

	if($result->count==0)
	{
	header("location:login.html"); 
	
	}
	else
	{
		session_start();
		$_SESSION['id'] = $result->id;
		$_SESSION['nom'] = $result->nom;
	$_SESSION['prenom'] = $result->prenom;
$_SESSION['mail'] = $result->mail;
$_SESSION['username'] = $result->username;

$role = $result->role;
$_SESSION['role'] = $role;
if ( $role == 'role_admin')
{
	header("location:back/profile.php"); 
}
else
{
	header("location:front/index.php"); 
}


}
}
else
{
		header("location:login.html"); 
}



 ?>