<?php include("connexion.php"); ?>
<?php
    if (isset($_POST['nom_person'])){
	 $nom=$_POST['nom_person'];
	 $prenom=$_POST['prenom_person'];
	 $tel1=$_POST['tel1_person'];
	 $tel2=$_POST['tel2_person'];
	 $adress=$_POST['adress_person'];
	 $salaire=$_POST['salaire_person'];
	 $civilite_person=$_POST['civilite_person'];
	 //$connexion=new PDO("mysql:host=localhost;dbname=bd_salon_coif","root","");
	 if (($nom=="") OR ($prenom=="") OR ($tel1=="")  OR ($adress=="") OR ($salaire=="") OR ($civilite_person=="")){
		 echo "Remplir orrectement tous les champs du formulaire";
	 } else{
	 $requete="INSERT INTO personnel(nom_person,prenom_person,tel1_person,tel2_person,adress_person,salaire_person,civilite_person) VALUES(?,?,?,?,?,?,?)";
	 $prepare=$connexion->prepare($requete);
	 $reponse=$prepare->execute(array($nom,$prenom,$tel1,$tel2,$adress,$salaire,$civilite_person));
	    if ($reponse==1){
		 echo "Succes! Personnel Ajouter";
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
  	             <td> Creer un Personnel </td>
                </tr>
            </table></td>
  </tr>
  <tr>
    <td>
			<form method="POST" action="ajout_person.php">
		        <table border="0">
				 <tr><td colspan="2"> <u> Ajouter un Menbre du Personnel </u></td></tr>
			        <tr><td> Civilite: </td><td>
			         <label> <input name="civilite_person" type="radio" value="Mr" checked/> Mr
				     <label> <input name="civilite_person" type="radio" value="Mme"/> Mme
				     <label> <input name="civilite_person" type="radio" value="Mme"/> Mlle</td>
				    </tr>
				    <tr><td> Nom Personnel: </td><td><input name="nom_person" type="text" required/> </td></tr>
				    <tr><td> Prenoms Personnel: </td><td><input name="prenom_person" type="text"/> </td></tr>
			        <tr><td> Tel1 Personnel: </td><td><input name="tel2_person" type="text" required/> </td></tr>
				    <tr><td> Tel2 Personnel: </td><td><input name="tel1_person" type="text"/> </td></tr>
				    <tr><td> Adresse Personnel: </td><td><input name="adress_person" type="text" required/> </td></tr>
				    <tr><td> Salaire Personnel: </td><td><input name="salaire_person" type="text" required/> </td></tr>
				    <tr><td> <input type="submit" value="Valider"/> <input type="reset" value="Annuler"/> </td></tr>
			    </table>
			</form></td>
  </tr>
</table>

	    </body>
	</html>