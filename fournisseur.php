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
  	             <td> Creer un Fournisseur </td>
                </tr>
            </table></td>
  </tr>
  <tr>
    <td>
		    
			<form>
		        <table border="0">
				 <tr><td> Numero Fournisseur: </td><td><input name="num_fourn" type="text"/> </td></tr>
				 <tr><td> Nom Fournisseur: </td><td><input name="nom_fourn" type="text"/> </td></tr>
				 <tr><td> Prenoms Fournisseur: </td><td><input name="prenom_fourn" type="text"/> </td></tr>
			     <tr><td> Tel1 Fournisseur: </td><td><input name="tel1_fourn" type="text"/> </td></tr>
				 <tr><td> Tel2 Fournisseur: </td><td><input name="tel2_fourn" type="text"/> </td></tr>
				 <tr><td> E-mail Fournisseur: </label></td><td><input name="email_fourn" type="text"/> </td></tr>
			     <tr><td> Adresse Fournisseur: </label></td><td><input name="adress_fourn" type="text"/> </td></tr>
				 <tr><td> <input type="submit" value="Valider"/> <input type="reset" value="Annuler"/> </td></tr>
			    </table>
			</form></td>
  </tr>
</table>

	    </body>
	</html>