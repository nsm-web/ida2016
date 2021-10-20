<?php
include ('connexion.php');

$ID=$_GET['modf'];
 $req = "SELECT * FROM client WHERE num_clt = ?";
 $prep = $connexion->prepare($req);
 $exe = $prep->execute(array($ID)) or die(print_r($prep->errorInfo()));
 $donnee = $prep->fetch();
?>
<!DOCTYPE.HTML> 
<html> 
<head>
<meta charset="utf-8"/>
<title>Liste Type_produit</title>
</head>
 <body>
 <form action="modCLT.php?id=<?php echo $donnee['num_clt'];?>" method="POST">

	<table>
   <tr><td>N° Client :</td><td> <input type="text" name="num_clt" readonly="readonly" value="<?php echo $donnee['num_clt'];?>"/></td></tr>
   <tr><td>Civilité :</td><td><input type="radio" name="sexe" value="Mr" >Mr <input type="radio" name="sexe" value="Mme">Mme <input type="radio" name="sexe" value="Mlle">Mlle</td></tr>
   <tr><td>Nom :</td><td> <input type="text" name="nom_clt" value="<?php echo $donnee['nom_clt'];?>"/></td></tr>
	<tr><td>Prenom :</td><td> <input type="text" name="prenom_clt" value="<?php echo $donnee['prenom_clt'];?>"/></td></tr>
   <tr><td>Téléphone1 :</td><td> <input type="text" name="tel1_clt" value="<?php echo $donnee['tel1_clt'];?>"/></td></tr>
   <tr><td>Téléphone2 :</td><td> <input type="text" name="tel2_clt" value="<?php echo $donnee['tel2_clt'];?>"/></td></tr>
   <tr><td>E-mail :</td><td> <input type="text" name="email_clt" value="<?php echo $donnee['email_clt'];?>"/></td></tr>
   <tr><td>Metier :</td><td> <input type="text" name="fonct_clt" value="<?php echo $donnee['fonct_clt'];?>"/></td></tr>
   <tr><td>Adresse :</td><td> <input type="text" name="adress_clt" value="<?php echo $donnee['adress_clt'];?>"/></td></tr>
   <tr><td><input type="reset" name="Annuler" value="Annuler"/> 
    <input type="submit" name="Valider" value="Valider" > </td></tr>
   
   </table>
  </form>
 </body>
</html>
<?php
 if(isset($_POST['num_clt']))
	{
		$CE=$_GET['id'];
	
	$sexe=$_POST['sexe'];
	
	$nom_clt=$_POST['nom_clt'];
	
	$prenom_clt=$_POST['prenom_clt'];
	
	$tel1_clt=$_POST['tel1_clt'];
	
	$tel2_clt=$_POST['tel2_clt'];
	
	$email_clt=$_POST['email_clt'];
	
	$fonction=$_POST['fonct_clt'];
	
	$adress_clt=$_POST['adress_clt'];
	
	 $req=$connexion->prepare("UPDATE client SET nom_clt = ?, prenom_clt =?, tel1_clt = ?, tel2_clt =?, adress_clt = ?, civilite = ?, email_clt = ?, fonct_clt = ? WHERE num_clt = '$CE'");
	 $rep = $req->execute(array($nom_clt, $prenom_clt, $tel1_clt, $tel2_clt, $adress_clt, $sexe, $email_clt, $fonction));
	header("location:Liste Client.php");
	}
?>