<?php include("connexion.php"); ?>
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
  	             <td> Creer une Depense </td>
                </tr>
            </table></td>
  </tr>
  <tr>
    <td> 
			<form>
		        <table border="0">
				  <tr><td> Id Depense: </td><td><input name="id_depense" type="text"/> </td></tr>
				  <tr><td> Id Type Produit: </td><td>
				  <?php
                     $requet="SELECT * FROM type_produit ORDER BY id_type_prodt";
                     $prepare=$connexion->prepare($requet);
                     $reponse=$prepare->execute();
                     ?>
				 <select name="">
			     <option value=""> Choisir le Type de Produit: </option>
					   <?php
					  while($donnee=$prepare->Fetch()){ ?>
						  <option value="<?php $donnee['id_type_prodt']?>"> <?php echo $donnee['libelle'];?> </option>
						  <?php } ?>
						  </select> </td></tr>
				  <tr><td> Date Depense: </td><td><input name="dates_depense" type="text"/> </td></tr>
			      <tr><td> Facture Depense: </td><td><input name="facture_depense" type="text"/> </td></tr>
				 <tr><td> <input type="submit" value="Valider"/> <input type="reset" value="Annuler"/> </td></tr>
			    </table>
			</form></td>
  </tr>
</table>

	    </body>
	</html>