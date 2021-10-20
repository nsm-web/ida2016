<?php
include("connexion.php");
 if (isset($_POST['id_rdv'])){
	 $id_rdv=$_POST['id_rdv'];
	 $id_service=$_POST['id_service'];
	 $id_servicecache=$_POST['id_servicecache'];
	 $type_payement=$_POST['type_payement'];

 //$num=$_GET['num'];
 
 if($id_service!=$id_servicecache){ 
 
   $requet="SELECT * FROM avoir WHERE id_rdv=? AND id_service=?";
   $prepare=$connexion->prepare($requet);
   $reponse=$prepare->execute(array($id_rdv,$id_service));
   $nb=$prepare->rowCount();
   if($nb!=0){
	   echo " Ce Servive existe d&eacute;j&agrave; pour ce RDV ! Moiffication impossible.";
	   }else{
	 
	 $requet1="UPDATE avoir SET  id_service=? , type_payement=?
	  WHERE id_rdv=? and id_service=?";
	 $prepare1=$connexion->prepare($requet1);
	 $reponse1=$prepare1->execute(array($id_service,$type_payement,$id_rdv,$id_servicecache));
	
	    if($reponse1==true){
			header("location:liste_avoir.php?num=".$id_rdv); 
	    }
	   }
	
	} 

if($id_service==$id_servicecache){ 

 $requet1="UPDATE avoir SET  type_payement=?
	  WHERE id_rdv=? and id_service=?";
	 $prepare1=$connexion->prepare($requet1);
	 $reponse1=$prepare1->execute(array($type_payement,$id_rdv,$id_servicecache));
	
	    if($reponse1==true){
			header("location:liste_avoir.php?num=".$id_rdv); 
	    }
	   }
 }

	
 $num=$_GET['num'];
  $id=$_GET['id'];
   $requet="SELECT * FROM avoir WHERE id_rdv=? AND id_service=?";
   $prepare=$connexion->prepare($requet);
   $reponse=$prepare->execute(array($num,$id));
   $donnees=$prepare->Fetch();
?>
<!DOCTYPE HTML>
	<html>
		<head>
		 <meta charset="utf_8">
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
  	             <td> Modification d'un Service Concernant le Rendez-Vous </td>
                </tr>
            </table></td>
  </tr>
  <tr>
    <td>
			<form method="POST" action="modifier_avoir.php?num=<?php echo $num ;?>">
		        <table border="0">
				 <tr><td colspan="2"> <u> Modifier un Service Concernant le Rendez-Vous </u></td></tr>
				 <tr><td> Numero Rendez-Vous: </td><td> <input type="text" readonly name="id_rdv" value="<?php echo $donnees['id_rdv']; ?>" required/></td></tr>
				 <tr><td> Numero Service: </td><td> <input type="hidden" readonly name="id_servicecache" value="<?php echo $donnees['id_service']; ?>"/>
                 
                 
                 
                  
	    <?php 
	   $requete="SELECT*FROM service ORDER BY type_service ASC";
	   $pre=$connexion->prepare($requete);
	   $exe=$pre->execute();
	   ?>
<select name="id_service" required><option value=""> Choisir Service: </option> 
  
  <?php
	   while ($donnee=$pre->Fetch()){
		?>
		<option value="<?php echo $donnee["id_service"]?>"  <?php echo ($donnees['id_service']==$donnee['id_service'] ? "selected" :"") ?> >
		<?php echo $donnee["type_service"] ."  : Prix: ".$donnee["prix_service"];?></option>
	   <?php }?>
       </select>
                 
                 
                 
                 </td></tr>
				 <!--<tr><td> Prix Service: </td><td> <input name="prix_service" type="text" value="<?php//echo $donnees['prix_service'];?>" readonly/></td></tr>-->
				 <tr><td> Type de Payement: </td><td> <!--<input type="text" name="type_payement" value="<?php//echo $donnees['type_payement']; ?>"/>-->
                 
<select name="type_payement" ><option value="" required>Choisir un mode de paiement </option><option value="Mobile Money" <?php echo ($donnees['type_payement']=="Mobile Money" ? "selected" :"") ?>>Par Mobile Money</option><option value="Par Chèque" <?php  echo ($donnees['type_payement']=="Par Chèque" ? "selected" :"") ?>>Par Ch&egrave;que</option><option value="En Espèce" <?php echo ($donnees['type_payement']=="En Espèce" ? "selected" :"") ?>>En Esp&egrave;ce</option>
  
       </select>
                 
                 
                 </td></tr>
				 <tr><td> 
				     <p>
				       <input type="submit" value="Modifier"/> 
				       <input type="reset" value="Annuler"/>
		          </p></td></tr>
			    </table>
			</form></td>
  </tr>
</table>

		    
	    </body>
	</html>