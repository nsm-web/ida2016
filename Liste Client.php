<?php include_once 'connexion.php' ?>
<!DOCTYPE.HTML>
<html> 
<head>
<meta charset="utf-8"/>
<title>Liste Client</title>
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
  	             <td> Liste clients </td>
                </tr>
            </table></td>
  </tr>
  <tr>
    <td> 



	
	
	
	<?php 
 $requete="SELECT * FROM client ORDER BY num_clt ASC";
 $prep=$connexion->prepare($requete);
 $resultat=$prep->execute();?>
 <table border="1">
 <tr> <td rowspan="2">N°:</td> <td rowspan="2">CIVILITE</td> <td rowspan="2">NOM:</td> <td rowspan="2">PRENOM</td> <td rowspan="2">TELEPHONE1</td> <td rowspan="2">TELEPHONE2</td> <td rowspan="2">E-MAIL</td> <td rowspan="2">METIER</td> <td rowspan="2">ADRESSE</td> </tr>
 <tr><td colspan="2">ACTION</td> </tr>

 <?php
  while($donnee=$prep->fetch())
  {?>
	 <tr><td><?php echo $donnee['num_clt']?></td>
    <td><?php echo $donnee['civilite']?></td> <td><?php echo $donnee['nom_clt']?></td> <td><?php echo $donnee['prenom_clt']?></td> <td><?php echo $donnee['tel1_clt']?></td> <td><?php echo $donnee['tel2_clt']?></td> <td><?php echo $donnee['email_clt']?></td> <td><?php echo $donnee['fonct_clt']?></td> <td><?php echo $donnee['adress_clt']?></td> 
	<td><a href="modCLT.php? modf=<?php echo $donnee['num_clt'];?>">Modifier</a></td><td><a href="suprClient.php? id=<?php echo $donnee['num_clt'];?>">Supprimer</a></td></tr>
	 <?php
 } ?>
 </table>
  <p><a href="index.php">RETOUR</a></p></td>
  </tr>
</table>

 </body>
</html>