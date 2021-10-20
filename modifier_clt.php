<?php
include("connexion.php");
 if (isset($_POST['num_clt'])){
	 $num=$_POST['num_clt'];
	 $nom=$_POST['nom_clt'];
	 $prenom=$_POST['prenom_clt'];
	 $tel1=$_POST['tel1_clt'];
	 $tel2=$_POST['tel2_clt'];
	 $adress=$_POST['adress_clt'];
	 $email=$_POST['email_clt'];
	 $fct=$_POST['fct_clt'];
	 $civilite=$_POST['civilite_clt'];
	 $requet1="UPDATE client SET nom_clt=? , prenom_clt=? , tel1_clt=? , tel2_clt=? , adress_clt=? , email_clt=? , fct_clt=? , civilite_clt=?  WHERE num_clt=?";
	 $prepare1=$connexion->prepare($requet1);
	 $reponse1=$prepare1->execute(array($nom,$prenom,$tel1,$tel2,$adress,$email,$fct,$civilite, $num));
	  echo $reponse1;
	    if($reponse1==true){
			header("location:liste_client.php");
	    }
    }
 $num=$_GET['num'];
   $requet="SELECT * FROM client WHERE num_clt=?";
   $prepare=$connexion->prepare($requet);
   $reponse=$prepare->execute(array($num));
   $donnees=$prepare->Fetch();
?>
<!DOCTYPE HTML>
	<html>
		<head>
		 <meta charset="utf_8">
		  <link type="text/css" rel="stylesheet" href="style.css"/>
	     <title> </title>
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
  	             <td> Modification d'un Client </td>
                </tr>
            </table></td>
  </tr>
  <tr>
    <td>
		    <form method="POST" action="modifier_clt.php? num=<?php echo $num;?>">
				<table border="0">
				    <tr><td colspan="2"> <u> Modifier un Client </u></td></tr>
				    <tr><td> Civilite: </td><td>
	<label> <input name="civilite_clt" type="radio" value="Mr" <?php echo ($donnees['civilite_clt']=="Mr"?"checked":"") ?>/> Mr
				     <label> <input name="civilite_clt" type="radio" value="Mme"  <?php echo ($donnees['civilite_clt']=="Mme"?"checked":"") ?>/> Mme
		             <label> <input name="civilite_clt" type="radio" value="Mlle" <?php echo ($donnees['civilite_clt']=="Mlle"?"checked":"") ?>/> Mlle </td>
				    </tr>
			     <tr><td> Numero Client: </td><td> <input type="text" readonly name="num_clt" value="<?php echo $donnees['num_clt']; ?>"/></td></tr>
			     <tr><td> Nom Client: </td><td> <input type="text" name="nom_clt" value="<?php echo $donnees['nom_clt']; ?>"/></td></tr>
				 <tr><td> Prenoms Client: </td><td> <input type="text" name="prenom_clt" value="<?php echo $donnees['prenom_clt']; ?>"/></td></tr>
				 <tr><td> Tel1 Client: </td><td> <input type="text" name="tel1_clt" value="<?php echo $donnees['tel1_clt']; ?>"/></td></tr>
				 <tr><td> Tel2 Client: </td><td> <input type="text" name="tel2_clt" value="<?php echo $donnees['tel2_clt']; ?>"/></td></tr>
				 <tr><td> Adresse Client: </td><td> <input type="text" name="adress_clt" value="<?php echo $donnees['adress_clt']; ?>"/></td></tr>
				 <tr><td> E-mail Client: </td><td> <input type="text" name="email_clt" value="<?php echo $donnees['email_clt']; ?>"/></td></tr>
				 <tr><td> Fonction Client: </td><td> <input type="text" name="fct_clt" value="<?php echo $donnees['fct_clt']; ?>"/></td></tr>
				 <tr><td> <input type="submit" value="Modifier"/> <input type="reset" value="Annuler"/> </td></tr>
			    </table>
			</form></td>
  </tr>
</table>
    
    
		    
		</body>
	</html>