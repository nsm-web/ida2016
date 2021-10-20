<?php include("connexion.php"); ?>
<?php
		 if (isset($_POST['num_fourn'])){
			 $num_fourn=$_POST['num_fourn'];
		     $id_type_depense=$_POST['id_type_depense'];
			 $num_person=$_POST['num_person'];
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
		     //if (($num_fourn=="") OR ($date=="") OR ($num_prodt1=="") OR ($num_prodt2=="") OR ($num_prodt3=="") OR ($num_prodt4=="") OR ($num_prodt5=="") OR ($qte1=="") OR ($qte2=="") OR ($qte3=="") OR ($qte4=="") OR ($qte5=="") OR ($pu1=="") OR ($pu2=="") OR ($pu3=="") OR ($pu4=="") OR ($pu5=="")){
			     //echo "Remplir correctement tous les champs du formulaire";
		      //  }
				//else{
					
			$msg="";		
			if($num_prodt1!="")	{	
if (($num_prodt1==$num_prodt2) OR ($num_prodt1==$num_prodt3) OR ($num_prodt1==$num_prodt4) OR ($num_prodt1==$num_prodt5)){
$msg="Choisir des produits differents SVP !";
	}}				
if($num_prodt2!="")	{		
if (($num_prodt2==$num_prodt3) OR ($num_prodt2==$num_prodt4) OR ($num_prodt2==$num_prodt5)){	$msg="Choisir des produits differents SVP !";}}
	
if($num_prodt3!="")	{		
if (($num_prodt3==$num_prodt4) OR ($num_prodt2==$num_prodt5)){	
$msg="Choisir des produits differents SVP !";}}

if($num_prodt4!="")	{		
if (($num_prodt4==$num_prodt5)){	
$msg="Choisir des produits differents SVP !";}}

if($msg!=""){
	
	echo $msg;
	
	}else{
	     
				 
			         $requete="INSERT INTO depense (id_depense,id_type_depense,dates_depense, caissier,nature) VALUES(?,?,?,?,? )";
	                 $prepare=$connexion->prepare($requete);
 	                 $reponse=$prepare->execute(array(null,$id_type_depense,$date,$num_person,1));
			         $dernierid=$connexion->lastInsertid();


							          
					    
						if($_POST['num_prodt1']!=""){
						 $requete="INSERT INTO concerne (id_depense,num_prodt,qte,pu) VALUES(?,?,?,?)";
						 $prepare=$connexion->prepare($requete);
	                     $execute=$prepare->execute(array($dernierid,$num_prodt1,$qte1,$pu1));
						}

					 
						 
						if($_POST['num_prodt2']!=""){
						 $requete="INSERT INTO concerne (id_depense,num_prodt,qte,pu) VALUES(?,?,?,?)";
						 $prepare=$connexion->prepare($requete);
	                     $execute=$prepare->execute(array($dernierid,$num_prodt2,$qte2,$pu2));
						}
						
						if($_POST['num_prodt3']!=""){
						 $requete="INSERT INTO concerne (id_depense,num_prodt,qte,pu) VALUES(?,?,?,?)";
						 $prepare=$connexion->prepare($requete);
	                     $execute=$prepare->execute(array($dernierid,$num_prodt3,$qte3,$pu3));
						}
						
						if($_POST['num_prodt4']!=""){
						 $requete="INSERT INTO concerne (id_depense,num_prodt,qte,pu) VALUES(?,?,?,?)";
						 $prepare=$connexion->prepare($requete);
	                     $execute=$prepare->execute(array($dernierid,$num_prodt4,$qte4,$pu4));
						}
						
						if($_POST['num_prodt5']!=""){
						 $requete="INSERT INTO concerne (id_depense,num_prodt,qte,pu) VALUES(?,?,?,?)";
						 $prepare=$connexion->prepare($requete);
	                     $execute=$prepare->execute(array($dernierid,$num_prodt5,$qte5,$pu5));
						}
						if($reponse==1){
		                  echo"ajout effectue avec succes";
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
				            <select name="num_fourn" required>
			                 <option value=""> Choisir un Fournisseur: </option>
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
			                 <option value=""> Choisir un Membre du Personnel: </option>
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
				     <select name="num_prodt1" required>
			         <option value=""> Choisir un Produit: </option>
					   <?php
					  while($donnee=$prepare->Fetch()){ ?>
						  <option value="<?php echo $donnee['num_prodt']?>"> <?php echo $donnee['designation'];?> </option>
						  <?php } ?>
				     </select> </td><td> Quantité: <input type="number"  min="0"name="qte1"  required/></td><td> Prix Unitaire: <input type="number" min="0" name ="pu1" required/></td>
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
				     </select> </td><td> Quantité: <input type="number" min="0" name="qte2" /></td><td> Prix Unitaire: <input type="number" min="0"  name ="pu2" /></td>
				    </tr>
                    <tr><td> Produit 3:
				     <?php
                     $requet="SELECT * FROM produit ORDER BY designation";
                     $prepare=$connexion->prepare($requet);
                     $reponse=$prepare->execute();
                     ?>
				     <select name="num_prodt3">
			         <option value=""> Choisir un Produit: </option>
					   <?php
					  while($donnee=$prepare->Fetch()){ ?>
						  <option value="<?php echo $donnee['num_prodt']?>"> <?php echo $donnee['designation'];?> </option>
						  <?php } ?>
				     </select> </td><td> Quantité: <input type="number" min="0"  name="qte3" /></td><td> Prix Unitaire: <input type="number" min="0"  name ="pu3" /></td>
				    </tr>
                   <tr><td> Produit 4:
				     <?php
                     $requet="SELECT * FROM produit ORDER BY designation";
                     $prepare=$connexion->prepare($requet);
                     $reponse=$prepare->execute();
                     ?>
				     <select name="num_prodt4">
			         <option value=""> Choisir un Produit: </option>
					   <?php
					  while($donnee=$prepare->Fetch()){ ?>
						  <option value="<?php echo $donnee['num_prodt']?>"> <?php echo $donnee['designation'];?> </option>
						  <?php } ?>
				     </select> </td><td> Quantité: <input type="number" min="0"  name="qte4" /></td><td> Prix Unitaire: <input type="number" min="0"  name ="pu4" /></td>
				    </tr>
                   <tr><td> Produit 5:
				     <?php
                     $requet="SELECT * FROM produit ORDER BY designation";
                     $prepare=$connexion->prepare($requet);
                     $reponse=$prepare->execute();
                     ?>
				     <select name="num_prodt5">
			         <option value=""> Choisir un Produit: </option>
					   <?php
					  while($donnee=$prepare->Fetch()){ ?>
						  <option value="<?php echo $donnee['num_prodt']?>"> <?php echo $donnee['designation'];?> </option>
						  <?php } ?>
				     </select> </td><td> Quantité: <input type="number" min="0"  name="qte5" /></td><td> Prix Unitaire: <input type="number" min="0"  name ="pu5" /></td>
				    </tr>
                </table>
             </fieldset>
              
              <p>
                <input type="submit" value="Valider" > 
                <input type="reset" value="Annuler"/>
                
              </p> 
            </form></td>
  </tr>
</table>

        </body>
    </html>