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
  	             <td>   Liste des Depenses</td>
                </tr>
            </table></td>
  </tr>
  <tr>
    <td><?php include("connexion.php"); ?>
<?php
   $requet="SELECT * FROM depense ORDER BY id_depense ASC";
   $prepare=$connexion->prepare($requet);
   $reponse=$prepare->execute();
?>
    <table border="1">
        <tr><td rowspan="2"> Id Depense </td>
	     <td rowspan="2"> Id Type Depense </td>
	     <td rowspan="2"> Date Depense </td>
	     <td rowspan="2"> Facture Depense </td>
	     <td colspan="2"> Action </td>
	    </tr>
		<tr><td> Detail~Detail~Detail </td><td> Modifier </td><td> Supprimer </td></tr>
	   <?php
	    while ($donnee=$prepare->Fetch()){ ?>
			<tr><td><?php echo $donnee['id_depense'];?></td>
			 <td><?php echo $donnee['id_type_depense'];?></td>
			 <td><?php echo $donnee['dates_depense'];?></td>
			 <td><?php echo $donnee['montant'];?></td>
			 <td><a href="liste_concerne.php?num=<?php echo $donnee['id_rdv'];?>"> Detail Produits~RDV </a></td>
			 <td><a href="modifier_depense.php?num=<?php echo $donnee['id_depense'];?>"> Modifier </a></td>
			 <td><a href="suppression_depense.php?num=<?php echo $donnee['id_depense'];?>"> Supprimer </a></td>
			</tr>
			<?php 
	    } ?>
	</table></td>
  </tr>
</table>
</body>
</html>
             
