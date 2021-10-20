<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
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
  	             <td>   Liste des Services </td>
                </tr>
            </table></td>
  </tr>
  <tr>
    <td><?php
  include("connexion.php");
   $requet="SELECT * FROM service ORDER BY id_service ASC";
   $prepare=$connexion->prepare($requet);
   $reponse=$prepare->execute();
?>
    <table border="1">
        <tr><td rowspan="2"> Id Service </td>
	     <td rowspan="2"> Type Service </td>
	     <td rowspan="2"> Prix Service </td>
	     <td rowspan="2"> Prime Service </td>
	     <td colspan="2"> Action </td>
	    </tr>
	    <tr><td> Modifier </td><td> Supprimer </td></tr>
	   <?php
	    while ($donnee=$prepare->Fetch()){ ?>
			<tr><td><?php echo $donnee['id_service'];?></td>
			 <td><?php echo $donnee['type_service'];?></td>
			 <td><?php echo $donnee['prix_service'];?></td>
			 <td><?php echo $donnee['prime_service'];?></td>
			 <td><a href="modifier_service.php? num=<?php echo $donnee['id_service'];?>"> Modifier </a></td>
			 <td><a href="suppression_service.php? num=<?php echo $donnee['id_service'];?>"> Supprimer </a></td>
			</tr>
			<?php 
	    } ?>
	</table></td>
  </tr>
</table>

</body>
</html>
