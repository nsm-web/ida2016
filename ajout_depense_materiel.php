<?php include("connexion.php"); ?>
<?php
		 if (isset($_POST['num_fourn'])){
			 $num_fourn=$_POST['num_fourn'];
	         $num_person=$_POST['num_person'];
	         $id_type_depense=$_POST['id_type_depense'];
		     $date=$_POST['date'];
		     $num_prodt=$_POST['num_prodt'];
		     $qte=$_POST['qte'];
		     $pu=$_POST['pu'];
		     if (($num_fourn=="") OR ($num_person=="")){
			     echo "Remplir correctement tous les champs du formulaire";
		        }
				else{
			     $requete="INSERT INTO depense (id_depense,id_type_depense,date,num_prodt,qte,pu,num_person ,num_fourn) VALUES(?,?,?,?,?,?,?)";
			     $prepare=$connexion->prepare($requete);
	             $reponse=$prepare->execute(array($num_fourn,$num_person,$id_type_depense,$date,$num_prodt,$qte,$pu));
	                if ($reponse==1){
		             echo "Succes! Ajoute Effectuer";
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
  	             <td> Ajouter la Depense d'un Materiel </td>
                </tr>
            </table></td>
  </tr>
  <tr>
    <td  valign="top" height="450">    <br>
<br> 
		    <form method="POST" action="ajout_depense_materiel.php">
            <table border="0">
               <tr><td> Numero Fournisseur: </td> 
					    <td>
				         <?php
                         $requete="SELECT * FROM fournisseur ORDER BY num_fourn";
                         $pre=$connexion->prepare($requete);
                         $reponse=$pre->execute();
                         ?>
				            <select name="num_fourn" required>
			                 <option value="liste_des_fournisseurs"> Choisir un Fournisseur: </option>
					         <?php
					          while($donnee=$pre->Fetch()){ ?>
						     <option value="<?php echo $donnee['num_fourn']?>"> <?php echo $donnee['nom_fourn']." ".$donnee['prenom_fourn'];?> </option>
						     <?php } ?>
				            </select> 
					    </td>
				    </tr>
				<tr><td> Numero Personnel: </td> 
					    <td>
				         <?php
                         $requ="SELECT * FROM personnel ORDER BY num_person";
                         $prep=$connexion->prepare($requ);
                         $repo=$prep->execute();
                         ?>
				            <select name="num_person" required>
			                 <option value="liste_du_personnel"> Choisir un Membre du Personnel: </option>
					         <?php
					          while($donnee=$prep->Fetch()){ ?>
						     <option value="<?php echo $donnee['num_person']?>"> <?php echo $donnee['nom_person']." ".$donnee['prenom_person'];?> </option>
						     <?php } ?>
				            </select> 
					    </td>
				    </tr>
			    <tr>
			      <td> Type Depense: </td><td>
				     <?php
                     $requet="SELECT * FROM type_depense WHERE libelle LIKE 'ACHA%'";
                     $prepare=$connexion->prepare($requet);
                     $reponse=$prepare->execute();
                     ?>
				    <select name="id_type_depense" required>
			         <option value=""> Choisir le Type de Depense: </option>
					   <?php
					  while($donnee=$prepare->Fetch()){ ?>
						  <option value="<?php echo $donnee['id_type_depense']?>"> <?php echo $donnee['libelle'];?> </option>
						  <?php } ?>
				    </select> </td>
				</tr>
                <tr><td> Date : </td><td> <input type="date" name="date" required/></td></tr>
            </table>
            <fieldset>
            <legend>Info Produits:</legend>
                <table>
                    <tr><td> Produit 1:
				     <?php
                     $requet="SELECT * FROM produit ORDER BY designation";
                     $prepare=$connexion->prepare($requet);
                     $reponse=$prepare->execute();
                     ?>
				     <select name="num_prodt">
			         <option value=""> Choisir un Produit: </option>
					   <?php
					  while($donnee=$prepare->Fetch()){ ?>
						  <option value="<?php echo $donnee['num_prodt']?>"> <?php echo $donnee['designation'];?> </option>
						  <?php } ?>
				     </select> </td><td> Quantité: <input type="text" name="qte" /></td><td> Prix Unitaire: <input type="text" name ="pu"  /></td>
				    </tr>
                    <tr><td> Produit 2:
				     <?php
                     $requet="SELECT * FROM produit ORDER BY designation";
                     $prepare=$connexion->prepare($requet);
                     $reponse=$prepare->execute();
                     ?>
				     <select name="num_prodt">
			         <option value=""> Choisir un Produit: </option>
					   <?php
					  while($donnee=$prepare->Fetch()){ ?>
						  <option value="<?php echo $donnee['num_prodt']?>"> <?php echo $donnee['designation'];?> </option>
						  <?php } ?>
				     </select> </td><td> Quantité: <input type="text" name="qte" /></td><td> Prix Unitaire: <input type="text" name ="pu" /></td>
				    </tr>
                    <tr><td> Produit 3:
				     <?php
                     $requet="SELECT * FROM produit ORDER BY designation";
                     $prepare=$connexion->prepare($requet);
                     $reponse=$prepare->execute();
                     ?>
				     <select name="num_prodt">
			         <option value=""> Choisir un Produit: </option>
					   <?php
					  while($donnee=$prepare->Fetch()){ ?>
						  <option value="<?php echo $donnee['num_prodt']?>"> <?php echo $donnee['designation'];?> </option>
						  <?php } ?>
				     </select> </td><td> Quantité: <input type="text" name="qte" /></td><td> Prix Unitaire: <input type="text" name ="pu" /></td>
				    </tr>
                   <tr><td> Produit 4:
				     <?php
                     $requet="SELECT * FROM produit ORDER BY designation";
                     $prepare=$connexion->prepare($requet);
                     $reponse=$prepare->execute();
                     ?>
				     <select name="num_prodt">
			         <option value=""> Choisir un Produit: </option>
					   <?php
					  while($donnee=$prepare->Fetch()){ ?>
						  <option value="<?php echo $donnee['num_prodt']?>"> <?php echo $donnee['designation'];?> </option>
						  <?php } ?>
				     </select> </td><td> Quantité: <input type="text" name="qte" /></td><td> Prix Unitaire: <input type="text" name ="pu" /></td>
				    </tr>
                   <tr><td> Produit 5:
				     <?php
                     $requet="SELECT * FROM produit ORDER BY designation";
                     $prepare=$connexion->prepare($requet);
                     $reponse=$prepare->execute();
                     ?>
				     <select name="num_prodt">
			         <option value=""> Choisir un Produit: </option>
					   <?php
					  while($donnee=$prepare->Fetch()){ ?>
						  <option value="<?php echo $donnee['num_prodt']?>"> <?php echo $donnee['designation'];?> </option>
						  <?php } ?>
				     </select> </td><td> Quantité: <input type="text" name="qte" /></td><td> Prix Unitaire: <input type="text" name ="pu" /></td>
				    </tr>
                </table>
             </fieldset>
              <input type="submit" value="Valider" > <input type="reset" value="Annuler"/> 
            </form></td>
  </tr>
</table>

        </body>
    </html>