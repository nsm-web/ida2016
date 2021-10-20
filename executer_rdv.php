<?php 
include('connexion.php'); 
$id=$_GET['id'];

$requete="UPDATE  rendez_vous  SET etat_rdv=? WHERE id_rdv=?";

$prepare=$connexion->prepare($requete);
$etat =($_GET['et']==1?0:1);
$execute=$prepare->execute(array($etat,$id));


if($execute==1){
	header("location:liste_rdv.php");
	}else{
    header("location:liste_rdv.php");
	}

?>