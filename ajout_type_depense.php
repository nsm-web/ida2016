<?php include("connexion.php"); ?>
<?php
    if (isset($_POST['libelle'])){
	 $libelle=$_POST['libelle'];
	 $achat_prodt=$_POST['achat_prodt'];
	 $loyer=$_POST['produit'];
	 $salaire=$_POST['salaire'];
	 $facture=$_POST['facture'];
	 $societe=$_POST['societe'];
	 $id_type_prodt=$_POST['id_type_prodt'];
	 /*$connexion=new PDO("mysql:host=localhost;dbname=bd_salon_coif","root","");*/
	  if (($libelle=="") OR ($achat_prodt=="") OR ($loyer=="") OR ($salaire=="") OR ($facture=="")){
		 echo "Remplir correctement tous les champs du formulaire";
	    } 
		else{
	        $requete="INSERT INTO type_depense (libelle,achat_prodt,produit,salaire,facture,id_type_prodt) VALUES(?,?,?,?,?,?)";
	        $prepare=$connexion->prepare($requete);
	        $reponse=$prepare->execute(array($libelle,$achat_prodt,$loyer,$salaire,$facture,$id_type_prodt));
	        if ($reponse==1){
		     echo "Succes! Type de Depense Ajouter";
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
  	             <td> Creer Type Depense </td>
                </tr>
            </table></td>
  </tr>
  <tr>
    <td> 
			<form method="POST" action="ajout_type_depense.php">
		        <table border="0">
				<tr><td colspan="2"> <u> Ajouter un Type de Depense </u></td></tr>
			     <tr><td> Libelle: </td><td><input name="libelle" type="text"/ required> </td></tr>
			     <tr><td> Achat Produits: </td><td><input name="achat_prodt" type="text" required/> </td></tr>
		         <tr><td> Produit: </td><td><input name="produit" type="text" required/> </td></tr>
			     <tr><td> Salaire: </td><td><input name="salaire" type="text" required/> </td></tr>
			     <tr><td> Facture: </td><td><input name="facture" type="text" required/> </td></tr>
				    <tr><td> Id Type Produit: </td><td>
				     <?php
                     $requet="SELECT * FROM produit ORDER BY designation";
                     $prepare=$connexion->prepare($requet);
                     $reponse=$prepare->execute();
                     ?>
				    <select name="id_type_prodt">
			         <option value="liste_des_produits"> Choisir le Type de Produit: </option>
					   <?php
					  while($donnee=$prepare->Fetch()){ ?>
						  <option value="<?php echo $donnee['num_prodt']?>"> <?php echo $donnee['designation'];?> </option>
						  <?php } ?>
				    </select> </td>
					</tr> 
					<tr><td> Societe: </td><td><input name="societe" type="text" required/> </td></tr>
				    <tr><td> <input type="submit" value="Valider"/> <input type="reset" value="Annuler"/> </td></tr>
			    </table>
			</form></td>
  </tr>
</table>

	    </body>
	</html>