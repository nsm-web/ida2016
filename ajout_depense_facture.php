<?php
include ("connexion.php");

   if(isset($_POST['dates_depense'])){
	   $societe=$_POST['societe'];
	   $montant=$_POST['montant'];
	   $dates_depense=$_POST['dates_depense'];
	   $num_person=$_POST['num_person'];
	   $commentaire=$_POST['commentaire'];
	   $periode=$_POST['periode'];
	    //$societe=$_POST['societe'];
	   	   //echo  $dates_depense ;

	  
	  if (($montant=="") OR ($commentaire=="")){
		 echo "Remplir correctement tous les champs du formulaire";
	    } 
		else{
		 $requete="INSERT INTO depense (id_depense,id_type_depense,dates_depense,montant,commentaire,periode,caissier,nature) VALUES(?,?,?,?,?,?,?,?)";
	     $prepare=$connexion->prepare($requete);
	     $reponse=$prepare->execute(array(NULL,$societe,$dates_depense,$montant,$commentaire,$periode,$num_person,3));
	     if($reponse==1){echo"ajout effectue avec succes";}
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
  	             <td> Ajouter une Depense Facture </td>
                </tr>
			</table></td>
  </tr>
  <tr>
    <td  valign="top" height="350">    <br>
<br>
<form action="ajout_depense_facture.php" method="POST">
<table border="0">


   <tr><td>Date : </td><td><input type="date" name="dates_depense" required/></td></tr>


 <?php 
	   $requete="SELECT*FROM personnel ORDER BY nom_person ASC";
	   $pre=$connexion->prepare($requete);
	   $exe=$pre->execute();
	   ?>
	   <tr><td>Personnel</td><td><select name="num_person" required><option value="">choisir le personnel</option>
       
        <?php
	   while ($donnee=$pre->Fetch()){
		?>
		<option value="<?php echo $donnee["num_person"]?>" ><?php echo $donnee["nom_person"];?></option>
	   <?php }?>
       </select></td></tr>
</table>
<br>

    <fieldset>
       <legend>Entrer les informations necessaires</legend>
       <table>



	    <?php 
	   $requete="SELECT*FROM type_depense WHERE libelle like 'Facture%' ORDER BY societe ASC";
	   $pre=$connexion->prepare($requete);
	   $exe=$pre->execute();
	   ?>
 <tr><td>Societe :</td><td><select name="societe"><option value="" required>choisir la societe</option>
 <?php
	   while ($donnee=$pre->Fetch()){
		?>
		<option value="<?php echo $donnee["id_type_depense"]?>" ><?php echo $donnee["libelle"];?></option>
	   <?php }?>
       </select></td></tr>
 <tr><td>Montant :</td><td><input type="number" name="montant"  min="0" required/></td></tr>
 <tr><td>Periode :</td><td><input type="date" name="periode" required/></td></tr>
 <tr><td valign="top">Commentaire :</td><td><textarea name="commentaire" rows="5" ></textarea></td></tr>
 
 </table>
 </fieldset>
 <br>
<br>

      <input type="submit" value="Valider"/>  <input type="reset" value="Annuler"/>
  <br>
<br>
    
 
 </form></td>
  </tr>
</table>

 </body>
 </html>