 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>

<body  style="background-image: url(images/fond.jpg);" >
      
  <table width="1010" border="1"   style="border-collapse:collapse; background-color:#FFF"  align="center" >
  <tr>
    <td><img src="images/baniere.jpg" width="1010" height="225"></td>
  </tr>
  <tr>
    <td> <table width="100%" height="33" border="1">
	 	        <tr  style="background-color: #F90">
  	             <td> <?php include('menu.php'); ?> </td>
  	             <td>  Liste des Clients </td>
                </tr>
            </table></td>
  </tr>
  <tr>
    <td> 
        <br />

	<form action="" method="post"><table width="108" border="0">
      <tr>
    <td colspan="3">Rechercher un Client :</td>
   
  </tr>
  <tr>
    <td nowrap="nowrap">Le Nom ou Prénom contient : </td>
    <td><input name="valeur_rech" type="text" placeholder="Saisir le client à rechercher" value="<?php echo(isset($_POST['valeur_rech'])? $_POST['valeur_rech']:"") ?>"></td>
    <td><input name="" type="submit" value="Rechercher"></td>
  </tr>
</table></form><br />

			<?php include("connexion.php"); ?>
<?php
   
   if(isset($_POST["valeur_rech"])){
	   
	   $nom_prenom="%".$_POST['valeur_rech']."%";
	   
	   $requet="SELECT * FROM client WHERE nom_clt LIKE ?    OR prenom_clt LIKE ? ORDER BY num_clt ASC";
   $prepare=$connexion->prepare($requet);
   $reponse=$prepare->execute(array($nom_prenom,$nom_prenom));
	   
	   }else{
	    $requet="SELECT * FROM client ORDER BY num_clt ASC";
   $prepare=$connexion->prepare($requet);
   $reponse=$prepare->execute();
	   }
   
  
?>
    <table border="1">
        <tr><td rowspan="2"> Numero Client </td>
        <td rowspan="2"> Civilite Client </td>
	     <td rowspan="2"> Nom Client </td>
	     <td rowspan="2"> Prenoms Client </td>
	     <td rowspan="2"> Tel1 Client </td>
	     <td rowspan="2"> Tel2 Client </td>
	     <td rowspan="2"> Adresse Client </td>
	     <td rowspan="2"> E-mail Client </td>
	     <td rowspan="2"> Fonction Client </td>
	     <td colspan="2"> Action </td>
	    </tr>
	    <tr><td> Modifier </td><td> Supprimer </td></tr>
	   <?php
	    while ($donnee=$prepare->Fetch()){ ?>
			<tr><td><?php echo $donnee['num_clt'];?></td>
            <td><?php echo $donnee['civilite_clt'];?></td>
			 <td><?php echo $donnee['nom_clt'];?></td>
			 <td><?php echo $donnee['prenom_clt'];?></td>
			 <td><?php echo $donnee['tel1_clt'];?></td>
			 <td><?php echo $donnee['tel2_clt'];?></td>
			 <td><?php echo $donnee['adress_clt'];?></td>
			 <td><?php echo $donnee['email_clt'];?></td>
			 <td><?php echo $donnee['fct_clt'];?></td>
			 <td><a href="modifier_clt.php?num=<?php echo $donnee['num_clt'];?>"> Modifier </a></td>
			 <td><a href="suppression_clt.php?num=<?php echo $donnee['num_clt'];?>"> Supprimer </a></td>
			</tr>
			<?php 
	    } ?>
	</table></td>
  </tr>
</table>
</body>
</html>
 
