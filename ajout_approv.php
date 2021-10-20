
<?php include("connexion.php"); ?>
<?php
	if (isset($_POST['id_depense'])){
	 $id_depense=$_POST['id_depense'];
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
			 
			 if (($id_depense=="") OR ($date=="")){
			     echo "Remplir correctement tous les champs du formulaire";
		        }
	    else{
				 if($_POST['num_prodt1']!=""){
				 $requete="INSERT INTO concerne (id_depense,num_prodt,qte,date_achat,pu) VALUES(?,?,?,?,?)";
			     $prepare=$connexion->prepare($requete);
	             $reponse=$prepare->execute(array($id_depense,$num_prodt1,$qte1,$date,$pu1));
			 }
			 if($_POST['num_prodt2']!=""){
				 $requete="INSERT INTO concerne (id_depense,num_prodt,qte,date_achat,pu) VALUES(?,?,?,?,?)";
			     $prepare=$connexion->prepare($requete);
	             $reponse=$prepare->execute(array($id_depense,$num_prodt2,$qte2,$date,$pu2));
			 }
			 if($_POST['num_prodt3']!=""){
				 $requete="INSERT INTO concerne (id_depense,num_prodt,qte,date_achat,pu) VALUES(?,?,?,?,?)";
			     $prepare=$connexion->prepare($requete);
	             $reponse=$prepare->execute(array($id_depense,$num_prodt3,$qte3,$date,$pu3));
			 }
			 if($_POST['num_prodt4']!=""){
				 $requete="INSERT INTO concerne (id_depense,num_prodt,qte,date_achat,pu) VALUES(?,?,?,?,?)";
			     $prepare=$connexion->prepare($requete);
	             $reponse=$prepare->execute(array($id_depense,$num_prodt4,$qte4,$date,$pu4));
			 }
			 if($_POST['num_prodt5']!=""){
				 $requete="INSERT INTO concerne (id_depense,num_prodt,qte,date_achat,pu) VALUES(?,?,?,?,?)";
			     $prepare=$connexion->prepare($requete);
	             $reponse=$prepare->execute(array($id_depense,$num_prodt5,$qte5,$date,$pu5));
			 }
			}
			if ($reponse==1){
		     echo "Succes! Ajoute Effectuer";
		    }
    }
?>
<!DOCTYPE HTML>
	<html>
		<head> 
		 <meta charset="utf-8">
		 <link type="text/css" rel="stylesheet" href="style.css"/>
		</head>
        <body style="background-image: url(images/fond.jpg);" >
        <div style="">
  <table width="1010" border="1"   style="border-collapse:collapse; background-color:#FFF"  align="center" >
    <tr>
      <td>
      <img src="images/baniere.jpg" width="1010" height="225"></td>
    </tr>
    <tr>
      <td>
        <table width="100%" height="33" border="1">
          <tr  style="background-color: #F90">
            <td width="63%" nowrap="nowrap"><?php include('menu.php'); ?> </td>
            <td width="37%"> Ajouter un Approvisionnement </td>
            </tr>
          </table></td>
    </tr>
    <tr>
    <td height="450" valign="top">
      
      
      >
      <form method="POST" action="ajout_approv.php">
        <table border="0">
        <table>
          <tr><td> Numero Depense: </td> 
            <td>
              <?php
                         $requete="SELECT * FROM depense ORDER BY id_depense";
                         $pre=$connexion->prepare($requete);
                         $reponse=$pre->execute();
                         ?>
              <select name="id_depense">
                <option value="liste_des_Depenses"> Choisir la Depense: </option>
                <?php
					          while($donnee=$pre->Fetch()){ ?>
                <option value="<?php echo $donnee['id_depense']?>"> <?php echo $donnee['id_depense'];?> </option>
                <?php } ?>
                </select> 
              </td>
            </tr>
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
                </select> </td><td> Quantité: <input type="text" name="qte1" /></td><td> Prix Unitaire: <input type="text" name ="pu1" /></td>
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
              <select name="num_prodt3">
                <option value=""> Choisir un Produit: </option>
                <?php
					  while($donnee=$prepare->Fetch()){ ?>
                <option value="<?php echo $donnee['num_prodt']?>"> <?php echo $donnee['designation'];?> </option>
                <?php } ?>
                </select> </td><td> Quantité: <input type="text" name="qte3" /></td><td> Prix Unitaire: <input type="text" name ="pu3" /></td>
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
                </select> </td><td> Quantité: <input type="text" name="qte4" /></td><td> Prix Unitaire: <input type="text" name ="pu4" /></td>
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
                </select> </td><td> Quantité: <input type="text" name="qte5" /></td><td> Prix Unitaire: <input type="text" name ="pu5" /></td>
              </tr>
            </table>
        </fieldset>
        <input type="submit" value="Ajouter" /> <input type="reset" value="Annuler"/> 
        </form>
    </td>
    </tr>
  </table>
        </div>

        </body>
    </html>