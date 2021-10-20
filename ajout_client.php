
<?php include("connexion.php"); ?>
<?php
    if (isset($_POST['nom_clt'])){
	 $nom=$_POST['nom_clt'];
	 $prenom=$_POST['prenom_clt'];
	 $tel1=$_POST['tel1_clt'];
	 $tel2=$_POST['tel2_clt'];
	 $adress=$_POST['adress_clt'];
	 $email=$_POST['email_clt'];
	 $fct=$_POST['fct_clt'];
	 $civilite_clt=$_POST['civilite_clt'];
	 /*$connexion=new PDO("mysql:host=localhost;dbname=bd_salon_coif","root","");*/
	  if (($nom=="") OR ($prenom=="") OR ($tel1=="") OR ($email=="") OR ($adress=="") OR ($fct=="") OR ($civilite_clt=="")){
		 echo "Remplir correctement tous les champs du formulaire";
	    } 
		else{
	        $requete="INSERT INTO client(nom_clt,prenom_clt,tel1_clt,tel2_clt,adress_clt,email_clt,fct_clt,civilite_clt) VALUES(?,?,?,?,?,?,?,?)";
	        $prepare=$connexion->prepare($requete);
	        $reponse=$prepare->execute(array($nom,$prenom,$tel1,$tel2,$adress,$email,$fct,$civilite_clt));
	        if ($reponse==1){
		     echo "Client Ajouté avec Succes!";
	        }
	    } 
	}
?>
<!DOCTYPE HTML>
	<html>
		<head> 
		 <meta charset="utf-8">
		  <link type="text/css" rel="stylesheet" href="style.css"/>
	     <title> Formulaire </title>
		</head>
		<body  style="background-image: url(images/fond.jpg);" >
        <div style="">
  <table width="1010" border="1"   style="border-collapse:collapse; background-color:#FFF"  align="center" >
  <tr>
    <td><img src="images/baniere.jpg" width="1010" height="225"></td>
  </tr>
  <tr>
    <td> <table width="100%" height="33" border="1">
	 	        <tr style="background-color: #F90">
  	             <td  > <?php include('menu.php'); ?> </td>
  	             <td> Ajouter un Client </td>
                </tr>
            </table></td>
  </tr>
  <tr>
    <td height="450" valign="top">
    
    <br>
<br>

		   
		    <form method="POST" action="ajout_client.php">
	   <table border="0">
				 
				     <tr>
                     <td> Civilite: </td> <td>
				   <label><input name="civilite_clt" type="radio" value="Mr" checked/> Mr
				   <label> <input name="civilite_clt" type="radio" value="Mme"/> Mme
		           <label> <input name="civilite_clt" type="radio" value="Mlle"/> Mlle
                      </td>
				      </tr>
			     <tr><td> Nom Client: </td><td><input name="nom_clt" type="text" required/> </td></tr>
				 <tr><td> Prenoms Client: </td><td><input name="prenom_clt" type="text" required/> </td></tr>
				 <tr><td> Tel1 Client: </td><td><input name="tel1_clt" type="text" required/> </td></tr>
				 <tr><td> Tel2 Client: </td><td><input name="tel2_clt" type="text" required/> </td></tr>
				 <tr><td> Adresse Client: </td><td><input name="adress_clt" type="text" required/> </td></tr>
				 <tr><td> E-mail Client: </td><td><input name="email_clt" type="text" required/> </td></tr>
				 <tr><td> Fonction Client: </td><td><input name="fct_clt" type="text" required/> </td></tr>
				 <tr><td> <input type="submit" value="Ajouter"/> <input type="reset" value="Annuler"/> </td></tr>
			    </table>
			</form>
    </td>
  </tr>
</table>

		</body>
	</html>