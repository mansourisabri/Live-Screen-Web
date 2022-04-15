<?php
  class config {
    private static $instance = NULL;

    public static function getConnexion() {
      if (!isset(self::$instance)) {
		try{
        self::$instance = new PDO('mysql:host=localhost;dbname=projet;charset=utf8;port=3308', 'root', 'password');
		self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch(Exception $e){
            die('Erreur: '.$e->getMessage());
		}
      }
      return self::$instance;
    }
  }


class  UserC {
	



	function ajouteruser($user)
	{

 	$sql="INSERT INTO `user`( `nom`, `prenom`, `mail`, `mdp`, `role`, `username`) VALUES (:nom,:prenom,:mail,:mdp,:role,:username)";
 	$db = config::getConnexion();
 		try{
		$req=$db->prepare($sql);		
		$nom=$user->getnom();
		$mdp=$user->getmdp(); 
		$prenom=$user->getprenom();     
		$mail=$user->getmail();  
		$role=$user->getrole();     
		$username=$user->getusername();   
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':mail',$mail);
		$req->bindValue(':mdp',$mdp);
			$req->bindValue(':role',$role);
	$req->bindValue(':username',$username);
            $req->execute();
        }
        catch (Exception $e){

            echo 'Erreur: '.$e->getMessage();
        }
	}
function modifieruser($user,$id)
	{
 	$db = config::getConnexion();
 	$sql="UPDATE `user` SET `nom`=:nom,`prenom`=:prenom,`mail`=:mail,`mdp`=:mdp,`username`=:username WHERE `id`=:id";
 		try{

        $req=$db->prepare($sql);		
       		$nom=$user->getnom();
		$mdp=$user->getmdp(); 
		$prenom=$user->getprenom();     
		$mail=$user->getmail();    
		$username=$user->getusername();   
		$req->bindValue(':id',$id);
			$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':mail',$mail);
		$req->bindValue(':mdp',$mdp);
	$req->bindValue(':username',$username);
		
			

            $req->execute();
        }
        catch (Exception $e){

            echo 'Erreur: '.$e->getMessage();
        }
	}
	function modifieruser_client($user,$id)
	{
 	$db = config::getConnexion();
 	$sql="UPDATE `user` SET `nom`=:nom,`prenom`=:prenom,`mail`=:mail,`username`=:username WHERE `id`=:id";
 		try{

        $req=$db->prepare($sql);		
       		$nom=$user->getnom();

		$prenom=$user->getprenom();     
		$mail=$user->getmail();    
		$username=$user->getusername();   
		$req->bindValue(':id',$id);
			$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':mail',$mail);
	$req->bindValue(':username',$username);
		
			

            $req->execute();
        }
        catch (Exception $e){

            echo 'Erreur: '.$e->getMessage();
        }
	}



		function recupereruser($id){
		$sql="SELECT * FROM `user` WHERE  id=:id ";
		$db = config::getConnexion();
		try{
		$req=$db->prepare($sql);
		$req->bindValue(':id',$id);
 	    $req->execute();
 		$user= $req->fetchALL(PDO::FETCH_OBJ);
		return $user;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
        function Supprimeruser($id){
		$sql="DELETE  from user where  id=:id ";
		$db = config::getConnexion();
		try{
		$req=$db->prepare($sql);
			$req->bindValue(':id',$id);
 	    $req->execute();
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	    function afficherlist_users(){

		$sql="SELECT * FROM `user` where role='role_user' ";

		$db = config::getConnexion();
		try{
			$req=$db->prepare($sql);
	

 	    $req->execute();
 		$form= $req->fetchALL(PDO::FETCH_OBJ);
		return $form;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	
	 function verifierLogin($login,$mdp)
		{
			$db = config::getConnexion();
			$sql = 'SELECT id, nom, prenom, mail, mdp, role, username, COUNT(*) AS count FROM user WHERE ( mail  = :mail OR username = :username )  AND mdp = :mdp  LIMIT 1';
			$req = $db->prepare($sql);
			$req->bindValue(':mail',$login);
			$req->bindValue(':username',$login);
			$req->bindValue(':mdp',$mdp);
			$req->execute();
			$result = $req->fetch(PDO::FETCH_OBJ);
			return $result;
		}
		

		
	
}


?>