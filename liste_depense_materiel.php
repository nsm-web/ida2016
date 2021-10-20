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
  	             <td>   Liste des Depenses Liées aux Materiels 
</td>
                </tr>
            </table></td>
  </tr>
  <tr>
    <td>          
<?php
include("connexion.php");
   $requet="SELECT * FROM concerne , depense WHERE  
   concerne.id_depense=depense.id_depense AND depense.nature='1'
   
   ";
   $prepare=$connexion->prepare($requet);
   $reponse=$prepare->execute();
?>
    <table border="1">
        <tr>
		 <td rowspan="2"> Numero Personnel </td>
		 <td rowspan="2"> Date </td>
		 <td rowspan="2"> Produit </td>
	     <td rowspan="2"> Quantite </td>
	     <td rowspan="2"> Prix Unitaire </td>
	     <td colspan="2"> Action </td>
	    </tr>
	    <tr><td> Modifier </td><td> Supprimer </td></tr>
		<?php
	    while ($donnee=$prepare->Fetch()){ ?>
			<tr>
			 <td>
             
             <?php   $id_rdv=$donnee['caissier'];     
             
   
  $requetE="SELECT * FROM personnel WHERE  num_person=?";
   $prepare1=$connexion->prepare($requetE);
   $reponse=$prepare1->execute(array($id_rdv));
   $reponse=$prepare1->Fetch()
  
   ?>
     <?php echo $reponse['nom_person']." ".$reponse['prenom_person'];?>        
             </td>
			 <td><?php echo $donnee['dates_depense'];?></td>
			 <td><?php //echo ;?>
             
              <?php   $id_rdv=$donnee['num_prodt'];     
             
   
  $requetE="SELECT * FROM produit WHERE  num_prodt=?";
   $prepare1=$connexion->prepare($requetE);
   $reponse=$prepare1->execute(array($id_rdv));
   $reponse=$prepare1->Fetch()
  
   ?>
             <?php echo $reponse['designation'];?> 
             
             </td>
			 <td><?php echo $donnee['qte'];?></td>
			 <td><?php echo $donnee['pu'];?></td>
			 <td><a href="modifier_depense_materiel.php?num=<?php echo $donnee['id_depense'];?>&pdt=<?php echo $donnee['num_prodt'];?>"> Modifier </a></td>
			 <td><a href="suppression_depense_materiel.php?num=<?php echo $donnee['id_depense'];?>&pdt=<?php echo $donnee['num_prodt'];?>"> Supprimer </a></td>
			</tr>
			<?php 
	    } ?>
	</table></td>
  </tr>
</table>
</body>
</html>
 