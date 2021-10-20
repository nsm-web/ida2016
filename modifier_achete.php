<?php
include("connexion.php");
 if (isset($_POST['id_rdv'])){
	 $id_rdv=$_POST['id_rdv'];
	 $num_prodt=$_POST['num_prodt'];
	 $num_prodtcacher=$_POST['num_prodtcache'];
	 $qte=$_POST['qte'];
	 $pu=$_POST['pu'];
	 
	if($num_prodt!=$num_prodtcacher){ 
	 
   $requet="SELECT * FROM achete WHERE id_rdv=? AND num_prodt=?";
   $prepare=$connexion->prepare($requet);
   $reponse=$prepare->execute(array($id_rdv,$num_prodt));
   $nb=$prepare->rowCount();
   
   if($nb!=0){
	   echo " Ce produit existe d&eacute;j&agrave; pour ce RDV ! Moiffication impossible.";
	   }else{
	 
	 
	 $requet1="UPDATE achete SET  qte=? , pu=? , num_prodt=? WHERE id_rdv=? and num_prodt=?";
	 $prepare1=$connexion->prepare($requet1);
	 $reponse1=$prepare1->execute(array($qte,$pu,$num_prodt,$id_rdv,$num_prodtcacher));
	  //echo $reponse1;
	  
	 
	  
	    if($reponse1==true){
			header("location:liste_achete.php?num=".$id_rdv);
	    }
	   }
	}
	 if($num_prodt==$num_prodtcacher){ 
	    $requet1="UPDATE achete SET  qte=? , pu=?  WHERE id_rdv=? and num_prodt=?";
	 $prepare1=$connexion->prepare($requet1);
	 $reponse1=$prepare1->execute(array($qte,$pu,$id_rdv,$num_prodtcacher));
	  //echo $reponse1;
	  
	 
	  
	    if($reponse1==true){
			header("location:liste_achete.php?num=".$id_rdv);
	    }
	   }
	   }
	   
	
	
 $num=$_GET['num'];
  $id=$_GET['id'];
   $requet="SELECT * FROM achete WHERE id_rdv=? AND num_prodt=?";
   $prepare=$connexion->prepare($requet);
   $reponse=$prepare->execute(array($num,$id));
   $donnees=$prepare->Fetch();
?>
<!DOCTYPE HTML>
	<html>
		<head>
		 <meta charset="utf_8">
		  <link type="text/css" rel="stylesheet" href="style.css"/>
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
  	             <td> Modification d'un Produit Concernant le Rendez-Vous </td>
                </tr>
            </table></td>
  </tr>
  <tr>
    <td>
			<form method="POST" action="modifier_achete.php?num=<?php echo $num ;?>">
		        <table border="0">
				 <tr><td colspan="2"> <u> Modifier un Service Concernant le Rendez-Vous </u></td></tr>
				 <tr>
				   <td> N&deg; Rendez-Vous: </td><td> <input type="text" readonly name="id_rdv" value="<?php echo $donnees['id_rdv']; ?>"/></td></tr>
				 <tr><td> Numero Produit: </td><td> <input type="hidden" readonly name="num_prodtcache" value="<?php echo $donnees['num_prodt']; ?>"/>
                 
                 
                 <?php 
	   $requete="SELECT*FROM produit ORDER BY designation ASC";
	   $pre=$connexion->prepare($requete);
	   $exe=$pre->execute();
	   ?>
	  <select name="num_prodt"><option value=""> Choisir le Produit: </option>
       
        <?php
	   while ($donnee=$pre->Fetch()){
		?>
		<option value="<?php echo $donnee["num_prodt"]?>"  <?php echo ($donnees['num_prodt']==$donnee['num_prodt'] ? "selected" :"") ?> ><?php echo $donnee["designation"];?></option>
	   <?php }?>
       </select>
                 
                 
                 </td></tr>
				 <tr><td> Quantite: </td><td> <input type="number" min="0" name="qte" value="<?php echo $donnees['qte']; ?>"/></td></tr>
				 <tr><td> Prix Unitaire: </td><td> <input type="number"  min="0" name="pu" value="<?php echo $donnees['pu']; ?>"/></td></tr>
				 <tr><td> <input type="submit" value="Modifier"/> <input type="reset" value="Annuler"/> </td></tr>
			    </table>
			</form></td>
  </tr>
</table>

	    </body>
	</html>