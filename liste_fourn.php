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
  	             <td>   Liste des Fournisseurs 
</td>
                </tr>
            </table></td>
  </tr>
  <tr>
    <td><?php include("connexion.php"); ?>
<?php
   $requet="SELECT * FROM fournisseur ORDER BY num_fourn ASC";
   $prepare=$connexion->prepare($requet);
   $reponse=$prepare->execute();
?>
    <table border="1">
        <tr><td rowspan="2"> Numero Fournisseur </td>
	     <td rowspan="2"> Nom Fournisseur </td>
	     <td rowspan="2"> Prenoms Fournisseur </td>
	     <td rowspan="2"> Tel1 Fournisseur </td>
	     <td rowspan="2"> Tel2 Fournisseur </td>
		 <td rowspan="2"> E-mail Fournisseur </td>
	     <td rowspan="2"> Adresse Fournisseur </td>
	     <td colspan="2"> Action </td>
	    </tr>
	    <tr><td> Modifier </td><td> Supprimer </td></tr>
	   <?php
	    while ($donnee=$prepare->Fetch()){ ?>
			<tr><td><?php echo $donnee['num_fourn'];?></td>
			 <td><?php echo $donnee['nom_fourn'];?></td>
			 <td><?php echo $donnee['prenom_fourn'];?></td>
			 <td><?php echo $donnee['tel1_fourn'];?></td>
			 <td><?php echo $donnee['tel2_fourn'];?></td>
			 <td><?php echo $donnee['email_fourn'];?></td>
			 <td><?php echo $donnee['adress_fourn'];?></td>
			 <td><a href="modifier_fourn.php? num=<?php echo $donnee['num_fourn'];?>"> Modifier </a></td>
			 <td><a href="suppression_fourn.php? num=<?php echo $donnee['num_fourn'];?>"> Supprimer </a></td>
			</tr>
			<?php 
	    } ?>
	</table></td>
  </tr>
</table>
</body>
</html>
