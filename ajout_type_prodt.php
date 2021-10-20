<?php include("connexion.php"); ?>
<?php
    if (isset($_POST['libelle'])){
	 $libelle=$_POST['libelle'];
	 //$connexion=new PDO("mysql:host=localhost;dbname=bd_salon_coif","root","");
	  if (( $libelle=="")){
		 echo "Remplir correctement tous les champs du formulaire";
	    } 
		else{
	        $requete="INSERT INTO type_produit (libelle) VALUES(?)";
	        $prepare=$connexion->prepare($requete);
	        $reponse=$prepare->execute(array($libelle));
	        if ($reponse==1){
		     echo "Succes! Type de Produit Ajouter";
	        }
	    } 
	}
?>
<!DOCTYPE HTML>
	<html>
		<head>
		 <meta charset="utf-8">
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
  	             <td> Creer Type de Produit </td>
                </tr>
            </table></td>
  </tr>
  <tr>
    <td>
			<form method="POST" action="ajout_type_prodt.php">
		        <table border="0">
				<tr><td colspan="2"> <u> Ajouter un Type de Produit </u></td></tr>
			     <tr><td> Libelle: </td><td><input name="libelle" type="text"/> </td></tr>
			     <tr><td> <input type="submit" value="Valider"/> <input type="reset" value="Annuler"/> </td></tr>
			    </table>
			</form></td>
  </tr>
</table>

	    </body>
	</html>