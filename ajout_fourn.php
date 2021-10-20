<?php include("connexion.php"); ?>
<?php
    if (isset($_POST['nom_fourn'])){
	 $nom=$_POST['nom_fourn'];
	 $prenom=$_POST['prenom_fourn'];
	 $tel1=$_POST['tel1_fourn'];
	 $tel2=$_POST['tel2_fourn'];
	 $email=$_POST['email_fourn'];
	 $adress=$_POST['adress_fourn'];
	 //$connexion=new PDO("mysql:host=localhost;dbname=bd_salon_coif","root","");
	 if (($nom=="") OR ($prenom=="") OR ($tel1=="") OR ($email=="") OR ($adress=="")){
		 echo "Remplir orrectement tous les champs du formulaire";
	 } else{
	 $requete="INSERT INTO fournisseur(nom_fourn,prenom_fourn,tel1_fourn,tel2_fourn,email_fourn,adress_fourn) VALUES(?,?,?,?,?,?)";
	 $prepare=$connexion->prepare($requete);
	 $reponse=$prepare->execute(array($nom,$prenom,$tel1,$tel2,$email,$adress));
	    if ($reponse==1){
		 echo "Succes! Fournisseur Ajouter";
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
  	             <td> Creer un Fournisseur </td>
                </tr>
            </table></td>
  </tr>
  <tr>
    <td> 
			<form method="POST" action="ajout_fourn.php">
		        <table border="0">
			     <tr><td colspan="2"> <u> Ajouter un Fournisseur </u></td></tr>
				  <tr><td> Nom Fournisseur: </td><td><input name="nom_fourn" type="text" required/> </td></tr>
				  <tr><td> Prenoms Fournisseur: </td><td><input name="prenom_fourn" type="text"/> </td></tr>
			      <tr><td> Tel1 Fournisseur: </td><td><input name="tel1_fourn" type="text" required/> </td></tr>
				  <tr><td> Tel2 Fournisseur: </td><td><input name="tel2_fourn" type="text"/> </td></tr>
				  <tr><td> E-mail Fournisseur: </label></td><td><input name="email_fourn" type="text"/> </td></tr>
			      <tr><td> Adresse Fournisseur: </label></td><td><textarea name="adress_fourn" rows="5" required="required"></textarea></td></tr>
				  <tr><td> <input type="submit" value="Valider"/> <input type="reset" value="Annuler"/> </td></tr>
			    </table>
			</form></td>
  </tr>
</table>

	    </body>
	</html>