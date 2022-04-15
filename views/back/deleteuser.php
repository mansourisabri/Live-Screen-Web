<?PHP
include_once '../../core/UserC.php';



if (isset($_GET['id'])){
	$UserC=new UserC();
	$UserC->Supprimeruser($_GET["id"]);


header('Location: users.php');
}

?>