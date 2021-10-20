<?php include("connexion.php"); ?>
<?php
		 if (isset($_POST['num_fourn'])){
			 $num_fourn=$_POST['num_fourn'];
		     $date=$_POST['date'];
			 $num_prodt1=$_POST['num_prodt1'];
			 $num_prodt2=$_POST['num_prodt2'];
			 $num_prodt3=$_POST['num_prodt3'];
			 $num_prodt4=$_POST['num_prodt4'];
			 $num_prodt5=$_POST['num_prodt5'];
			 $qte1=$_POST['qte1'];
			 $qte2=$_POST['qte2'];
			 $qte3=$_POST['qte3'];
		     $qte4=$_POST['qte4'];
			 $qte5=$_POST['qte5'];
			 $pu1=$_POST['pu1'];
			 $pu2=$_POST['pu2'];
			 $pu3=$_POST['pu3'];
			 $pu4=$_POST['pu4'];
			 $pu5=$_POST['pu5'];
		     if (($num_fourn=="") OR ($date=="") OR ($prodt1=="") OR ($prodt2=="") OR ($prodt3=="") OR ($prodt4=="") OR ($prodt5=="") OR ($qte1=="") OR ($qte2=="") OR ($qte3=="") OR ($qte4=="") OR ($qte5=="") OR ($pu1=="") OR ($pu2=="") OR ($pu3=="") OR ($pu4=="") OR ($pu5=="")){
			     echo "Remplir correctement tous les champs du formulaire";
		        }
				
?>
<!DOCTYPE HTML>
	<html>
		<head> 
		 <meta charset="utf-8">
		 <link type="text/css" rel="stylesheet" href="style.css"/>
		</head>
 <body  style="background-image: url(images/fond.jpg);" >
      
  <table width="1010" border="1"   style="border-collapse: collapse; background-color:#FFF; "  align="center" >
  <tr>
    <td><img src="images/baniere.jpg" width="1010" height="225"></td>
  </tr>
  <tr>
    <td> <table width="100%" height="33" border="1">
	 	        <tr  style="background-color: #F90">
  	             <td> <?php include('menu.php'); ?> </td>
  	             <td> Ajouter un Approvisionnement </td>
                </tr>
            </table></td>
  </tr>
  <tr>
    <td>
		    <form method="POST" action="">
		        <table border="0">
            <table>
               <tr><td> Numero Fournisseur: </td> 
					    <td>
				         <?php
                         $requete="SELECT * FROM fournisseur ORDER BY num_fourn";
                         $pre=$connexion->prepare($requete);
                         $reponse=$pre->execute();
                         ?>
				            <select name="num_fourn">
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
				            <select name="num_person">
			                 <option value="liste_du_personnel"> Choisir un Membre du Personnel: </option>
					         <?php
					          while($donnee=$prep->Fetch()){ ?>
						     <option value="<?php echo $donnee['num_person']?>"> <?php echo $donnee['nom_person']." ".$donnee['prenom_person'];?> </option>
						     <?php } ?>
				            </select> 
					    </td>
				    </tr>
			    <tr><td> Id Type Depense: </td><td>
				     <?php
                     $requet="SELECT * FROM type_depense WHERE libelle LIKE 'ACHA%'";
                     $prepare=$connexion->prepare($requet);
                     $reponse=$prepare->execute();
                     ?>
				    <select name="id_type_depense">
			         <option value=""> Choisir le Type de Depense: </option>
					   <?php
					  while($donnee=$prepare->Fetch()){ ?>
						  <option value="<?php echo $donnee['id_type_depense']?>"> <?php echo $donnee['libelle'];?> </option>
						  <?php } ?>
				    </select> </td>
				</tr>
                <tr><td> Date : </td><td> <input type="date" name="date"/></td></tr>
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
				     <select name="num_prodt1">
			         <option value=""> Choisir un Produit: </option>
					   <?php
					  while($donnee=$prepare->Fetch()){ ?>
						  <option value="<?php echo $donnee['num_prodt']?>"> <?php echo $donnee['designation'];?> </option>
						  <?php } ?>
				     </select> </td><td> Quantité: <input type="text" name="qte" /></td><td> Prix Unitaire: <input type="text" name ="pu" /></td>
				    </tr>
                    <tr><td> Produit 2:
				     <?php
                     $requet="SELECT * FROM produit ORDER BY designation";
                     $prepare=$connexion->prepare($requet);
                     $reponse=$prepare->execute();
                     ?>
				     <select name="num_prodt2">
			         <option value=""> Choisir un Produit: </option>
					   <?php
					  while($donnee=$prepare->Fetch()){ ?>
						  <option value="<?php echo $donnee['num_prodt']?>"> <?php echo $donnee['designation'];?> </option>
						  <?php } ?>
				     </select> </td><td> Quantité: <input type="text" name="qte2" /></td><td> Prix Unitaire: <input type="text" name ="pu2" /></td>
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
              <input type="submit" value="Modifier" > <input type="reset" value="Annuler"/> 
            </form></td>
  </tr>
</table>

        </body>
    </html>