
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
  	             <td width="52%"> <?php include('menu.php'); ?> </td>
  	             <td width="48%"> Liste des Produits pour a une Depense </td>
                </tr>
            </table></td>
  </tr>
  <tr>
    <td>  
            
				<?php
include("connexion.php");
$id=$_GET["num"];
   $requet="SELECT * FROM concerne, depense WHERE concerne.id_depense=depense.id_depense AND concerne.num_prodt=?";
   $prepare=$connexion->prepare($requet);
   $reponse=$prepare->execute(array($id));
?>
    <table border="1">
        <tr><td rowspan="2"> Numero Depense </td>
		 <td rowspan="2"> Numero Produit </td>
		 <td rowspan="2"> Quantite </td>
		 <td rowspan="2"> Date Achat </td>
	     <td rowspan="2"> Prix Unitaire </td>
	     <td colspan="4"> Action </td>
	    </tr>
	    <tr><td> Modifier </td><td> Supprimer </td></tr>
		<?php
	    while ($donnee=$prepare->Fetch()){ ?>
			<tr><td><?php echo $donnee['id_depense'];?></td>
			 <td><?php echo $donnee['num_prodt'];?></td>
			 <td><?php echo $donnee['qte'];?></td>
			 <td><?php echo $donnee['date_achat'];?></td>
			 <td><?php echo $donnee['pu'];?></td>
			 <td><a href="modifier_concerne.php? num=<?php echo $donnee['id_depense'];?>"> Modifier </a></td>
			 <td><a href="suppression_concerne.php? num=<?php echo $donnee['id_depense'];?>"> Supprimer </a></td>
			</tr>
			<?php 
	    } ?>
	</table></td>
  </tr>
</table>

</body>
</html>