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
  	             <td> Creer un Client </td>
                </tr>
            </table></td>
  </tr>
  <tr>
    <td>
			<form>
		        <table border="0">
				    <tr><td> Civilite: </td><td>
				     <label> <input name="Civilite" type="radio" value="Mr"/> Mr
				     <label> <input name="Civilite" type="radio" value="Mme"/> Mme
		             <label> <input name="Civilite" type="radio" value="Mlle"/> Mlle </td>
				    </tr>
			     <tr><td> Numero Client: </td><td><input name="num_clt" type="text"/> </td></tr>
			     <tr><td> Nom Client: </td><td><input name="nom_clt" type="text"/> </td></tr>
		         <tr><td> Prenoms Client: </td><td><input name="prenom_clt" type="text"/> </td></tr>
			     <tr><td> Tel1 Client: </td><td><input name="tel1_clt" type="text"/> </td></tr>
			     <tr><td> Tel2 Client: </td><td><input name="tel2_clt" type="text"/> </td></tr>
		         <tr><td> Adresse Client: </td><td><input name="adress_clt" type="text"/> </td></tr>
			     <tr><td> E-mail Client: </td><td><input name="email_clt" type="text"/> </td></tr>
			     <tr><td> Fonction Client: </label></td><td><input name="fct_clt" type="text"/> </td></tr>
		         <tr><td> <input type="submit" value="Valider"/> <input type="reset" value="Annuler"/> </td></tr>
			    </table>
			</form></td>
  </tr>
</table>

	    </body>
	</html>