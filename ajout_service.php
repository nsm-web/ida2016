<?php include("connexion.php"); ?>
<?php
    if (isset($_POST['prime_service'])){
	 $type_service=$_POST['type_service'];
	 $prix_service=$_POST['prix_service'];
	 $prime_service=$_POST['prime_service'];
	 /*$connexion=new PDO("mysql:host=localhost;dbname=bd_salon_coif","root","");*/
	  if (($type_service=="") OR ($prix_service=="") OR ($prime_service=="")){
		 echo "Remplir correctement tous les champs du formulaire";
	    } 
		else{
	        $requete="INSERT INTO service(type_service,prix_service,prime_service) VALUES(?,?,?)";
	        $prepare=$connexion->prepare($requete);
	        $reponse=$prepare->execute(array($type_service,$prix_service,$prime_service));
	        if ($reponse==1){
		     echo "Succes! Service Ajouter";
	        }
	    } 
	}
?>
<!DOCTYPE HTML>
	<html>
		<head>
		 <meta charset="utf-8"/>
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
  	             <td> Creer un Service </td>
                </tr>
            </table></td>
  </tr>
  <tr>
    <td>
			<form method="POST" action="ajout_service.php">
		        <table border="0">
				<tr><td colspan="2"> <u> Ajouter un Service </u></td></tr>
				 <tr>
				   <td> Libéllé Service: </td><td><input name="type_service" type="text" required/> </td></tr>
				 <tr><td> Prix Service: </td><td><input name="prix_service" type="number" min="0" required/> </td></tr>
			     <tr><td> Prime Service: </td><td><input name="prime_service"  type="number" min="0" /> </td></tr>
				 <tr><td> <input type="submit" value="Valider"/> <input type="reset" value="Annuler"/> </td></tr>
			    </table>
			</form></td>
  </tr>
</table>

	    </body>
	</html>