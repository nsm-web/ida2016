<?php include("connexion.php"); ?>
<?php
    if (isset($_POST['designation'])){
	 $type_produit=$_POST['id_type_prodt'];
	 $num_fourn=$_POST['num_fourn'];
	 $designation=$_POST['designation'];
	 /* $connexion=new PDO("mysql:host=localhost;dbname=bd_salon_coif","root","");*/
	  if (($type_produit=="") OR ($num_fourn=="")OR ($designation=="")){
		 echo "Remplir correctement tous les champs du formulaire";
	    }else{
	        $requete="INSERT INTO produit(id_type_prodt,num_fourn,designation) VALUES(?,?,?)";
	        $prepare=$connexion->prepare($requete);
	        $reponse=$prepare->execute(array($type_produit,$num_fourn,$designation));
	        if ($reponse==1){
		        echo "Succes! Produit Ajouter";
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
  	             <td> Ajouter un Produit </td>
                </tr>
            </table></td>
  </tr>
  <tr>
    <td>
			<form  method="POST">
		        <table border="0">
				<tr><td colspan="2"> <u> Ajouter un Produit </u></td></tr>
				 <tr><td> Id Type Produit: </td><td>
				     <?php
                     $requet="SELECT * FROM type_produit ORDER BY libelle";
                     $prepare=$connexion->prepare($requet);
                     $reponse=$prepare->execute();
                     ?>
				    <select name="id_type_prodt">
			         <option value=""> Choisir le Type de Produit: </option>
					   <?php
					  while($donnee=$prepare->Fetch()){ ?>
						  <option value="<?php echo $donnee['id_type_prodt']?>"> <?php echo $donnee['libelle'];?> </option>
						  <?php } ?>
				    </select> </td></tr> 
				
				    <tr><td> Numero Fournisseur: </td> 
					    <td>
				         <?php
                         $requet="SELECT * FROM fournisseur ORDER BY num_fourn";
                         $prepare=$connexion->prepare($requet);
                         $reponse=$prepare->execute();
                         ?>
				            <select name="num_fourn">
					
			                 <option value="liste_des_fournisseurs"> Choisir un Fournisseur: </option>
					         <?php
					          while($donnee=$prepare->Fetch()){ ?>
						     <option value="<?php echo $donnee['num_fourn']?>"> <?php echo $donnee['nom_fourn']." ".$donnee['prenom_fourn'];?> </option>
						     <?php } ?>
				            </select> 
					    </td>
				    </tr>
			      <tr><td> Designation: </td><td><input name="designation" type="text"/> </td></tr>
					<tr><td> <input type="submit" value="Valider"/> <input type="reset" value="Annuler"/> </td></tr>
			    </table>
			</form></td>
  </tr>
</table>

	    </body>
	</html>