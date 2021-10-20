<?php
include("connexion.php");
 if (isset($_POST['id_depense'])){
	 $id_depense=$_POST['id_depense'];
	 $num_prodt=$_POST['num_prodt'];
	 $qte=$_POST['qte'];
	 $date_achat=$_POST['date_achat'];
	 $pu=$_POST['pu'];
	 $requet1="UPDATE concerne SET  qte=? , date_achat=? , pu=? WHERE id_depense=? and num_prodt=?";
	 $prepare1=$connexion->prepare($requet1);
	 $reponse1=$prepare1->execute(array($qte,$date_achat,$pu,$id_depense,$num_prodt));
	  echo $reponse1;
	    if($reponse1==true){
			header("location:liste_approv.php");
	    }
	} 
	
 $num=$_GET['num'];
   $requet="SELECT * FROM concerne WHERE id_depense=?";
   $prepare=$connexion->prepare($requet);
   $reponse=$prepare->execute(array($num));
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
  	             <td> Modification d'un Produit Concernant les Approvisionnements </td>
                </tr>
            </table></td>
  </tr>
  <tr>
    <td>
			<form method="POST" action="modifier_aprrov.php?num=<?php echo $num ;?>">
		        <table border="0">
				 <tr><td colspan="2"> <u> Modifier un Produit Concernant les Approvisionnements </u></td></tr>
				 <tr><td> Numero Depense: </td><td> <input type="text" readonly name="id_depense" value="<?php echo $donnees['id_depense']; ?>"/></td></tr>
				 <tr><td> Numero Produit: </td><td> <input type="text" readonly name="num_prodt" value="<?php echo $donnees['num_prodt']; ?>"/></td></tr>
				 <tr><td> Quantite: </td><td> <input type="text" name="qte" value="<?php echo $donnees['qte']; ?>"/></td></tr>
				 <tr><td> Date Achat: </td><td> <input type="date" name="date_achat" value="<?php echo $donnees['date_achat']; ?>"/></td></tr>
				 <tr><td> Prix Unitaire: </td><td> <input type="text" name="pu" value="<?php echo $donnees['pu']; ?>"/></td></tr>
				 <tr><td> <input type="submit" value="Modifier"/> <input type="reset" value="Annuler"/> </td></tr>
			    </table>
			</form></td>
  </tr>
</table>

	    </body>
	</html>