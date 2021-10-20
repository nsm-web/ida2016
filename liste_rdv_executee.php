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
  	             <td>  Liste des Rendez-Vous </td>
                </tr>
            </table></td>
  </tr>
  <tr>
    <td><?php
include("connexion.php");
   $requet="SELECT * FROM rendez_vous ORDER BY id_rdv ASC";
   $prepare=$connexion->prepare($requet);
   $reponse=$prepare->execute();
?>
    <table border="1">
        <tr><td rowspan="2"> Numero Rendez-Vous </td>
		 <td rowspan="2"> Date Rendez-Vous </td>
		 <td rowspan="2"> Numero Client </td>
	     <td rowspan="2"> Numero Personnel </td>
	     <td rowspan="2"> Date Execution </td>
	     <td rowspan="2"> Caissiere </td>
	     <td colspan="3"> Action </td>
	    </tr>
	    <tr>
	      <td> Services</td>
	      <td> Produits</td>
        <td> Executer </td></tr>
		<?php
	    while ($donnee=$prepare->Fetch()){ ?>
			<tr><td><?php echo $donnee['id_rdv'];?></td>
			 <td><?php echo $donnee['date_rdv'];?></td>
			 <td><?php echo $donnee['num_clt'];?></td>
			 <td><?php echo $donnee['num_person'];?></td>
			 <td><?php echo $donnee['date_exe'];?></td>
			 <td><?php echo $donnee['caissiere'];?></td>
			 <td><a href="liste_avoir.php? num=<?php echo $donnee['id_rdv'];?>"> Detail Services~RDV </a></td>
			 <td><a href="liste_achete.php? num=<?php echo $donnee['id_rdv'];?>"> Detail Produits~RDV </a></td>
			 <td>
             
             
             <input name="actif<?php echo $i++; ?>" type="checkbox" value="<?php echo $donnee['id_rdv']?>" <?php echo($donnee['etat_rdv']==1?'checked':"")?> onClick="javascript:location.href='executer_rdv.php?id=<?php echo  $donnee['id_rdv']?>&et=<?php echo $donnee['etat_rdv']; ?>'">
             
             
             </td>
		    </tr>
			<?php 
	    } ?>
	</table></td>
  </tr>
</table>

</body>
</html> 
