<?php 
 include("connexion.php");
?>
<?php
   if(isset($_POST['date_depense'])){
	   $id_type_depense=$_POST['id_type_depense'];
	   $dates_depense=$_POST['date_depense'];
	   $montant=$_POST['montant'];
	   $commentaire=$_POST['commentaire'];
	   $periode=$_POST['periode'];
	   $caissier=$_POST['caissier'];
	   $receveur=$_POST['receveur'];
	    if (($periode=="") OR ($commentaire=="")){
		 echo "Remplir correctement tous les champs du formulaire";
	    } 
		else{
	     $requete="INSERT INTO depense(id_depense,id_type_depense,dates_depense,caissier,receveur,montant,commentaire,periode,nature ) VALUES(?,?,?,?,?,?,?,?,?)";
	     $prepare=$connexion->prepare($requete);
 	     $reponse=$prepare->execute(array(NULL,$id_type_depense ,$dates_depense,$caissier, $receveur,$montant, $commentaire, $periode,2));
	     if($reponse==1){
		   echo"ajout effectue avec succes";}
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
  	             <td> Ajouter une Depense </td>
                </tr>
			</table></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td>
      <form action="ajout_depense_salaire.php" method="POST">
          <table>
                <tr><td>Date :<input type="date" name="date_depense" required/></td></tr>
                
                
                <?php 
	   $requete="SELECT*FROM personnel ORDER BY nom_person ASC";
	   $pre=$connexion->prepare($requete);
	   $exe=$pre->execute();
	   ?>
 <tr><td>Caissier :<select name="caissier" required ><option value="">choisir le caissier</option> 
  <?php
	   while ($donnee=$pre->Fetch()){
		?>
		<option value="<?php echo $donnee["num_person"]?>" ><?php echo $donnee["nom_person"];?></option>
	   <?php }?>
       </select></td></tr>
                
                
                
                 <?php 
	   $requete="SELECT*FROM type_depense WHERE libelle = 'Salaire' ";
	   $prep=$connexion->prepare($requete);
	   $reponse=$prep->execute();
	   ?>
	   <tr><td>Type Depense : <select name="id_type_depense" required><option value="">type depense</option>
       
         <?php
	   while ($donnee=$prep->Fetch()){
		?>
		<option value="<?php echo $donnee["id_type_depense"]?>"><?php echo $donnee["libelle"];?></option>
	   <?php }?>
       </select></td></tr>
                
                
                
                
           </table>
                 <fieldset>
                     <legend>Renseignement</legend>
                       <table>
                               
                               
                                <?php 
	   $requete="SELECT*FROM personnel ORDER BY nom_person ASC";
	   $pre=$connexion->prepare($requete);
	   $exe=$pre->execute();
	   ?>
 <tr>
   <td>Salarié :</td><td><select name="receveur" required><option value="">choisir du receveur</option> 
  <?php
	   while ($donnee=$pre->Fetch()){
		?>
		<option value="<?php echo $donnee["num_person"]?>" ><?php echo $donnee["nom_person"];?></option>
	   <?php }?>
       </select></td></tr>
                               
                               
                               
                               
                               <tr><td>Montant :</td><td><input type="number" name="montant" min="0" required/></td></tr>
                               <tr><td>Periode :</td><td><input type="date" name="periode" required/></td></tr>
                               <tr><td>Commentaire :</td><td><textarea name="commentaire" rows="5"></textarea></td></tr>
                        </table>
                  </fieldset>
                  <p>
                    <input type="submit" value="Valider" /> <input type="reset" value="Annuler"/>
                    
                  </p>
                  
      </form>
            </td>
  </tr>
</table>
</td>
  </tr>
</table>

   
</body>
</html>