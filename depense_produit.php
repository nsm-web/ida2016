<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Depense produit</title>
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
  	             <td> Achat produits </td>
                </tr>
            </table></td>
  </tr>
  <tr>
    <td>
    	<table>
<tr><td>Date : </td><td> <input type="text" name = "date" /></td></tr>
<tr>
<td>Personnel :</td>
	<td>
	  <select name="num_person" >
		<option value="1">Selectionnez Personnel</option>
		<?php
	while($donnee=$pre->fetch())
		{
		?>
	<option value="ad= <?php echo $donnee['num_person']; ?>"><?php echo $donnee['nom_person']; ?></option>
		<?php } ?>
	  </select>
      </td></tr>
      <tr>
<td>Type dépense :</td>
	<td>
	  <select name="type_depense" >
		<option value="1">Selectionnez type dépense</option>
		<?php
	while($donnee=$pre->fetch())
		{
		?>
	<option value="ad= <?php echo $donnee['id_type_depense']; ?>"><?php echo $donnee['libelle']; ?></option>
		<?php } ?>
	  </select>
      </td></tr>
      </table>
      <fieldset>
  <legend>Info dépense</legend>
  <table>
  <tr><td>Produit 1 : <select name="num_prdt" >
		<option value="1">Selectionnez produit</option>
		<?php
	while($donne=$prepa->fetch())
		{
		?>
	<option value="ad= <?php echo $donne['num_prdt']; ?>"><?php echo $donne['nom_prdt']; ?></option>
		<?php } ?>
	  </select></td></tr>
  <tr><td>Produit 2 : <select name="num_prdt" >
		<option value="1">Selectionnez produit</option>
		<?php
	while($don=$prepa->fetch())
		{
		?>
	<option value="ad= <?php echo $don['num_prdt']; ?>"><?php echo $don['nom_prdt']; ?></option>
		<?php } ?>
	  </select></td></tr>
  <tr><td>Produit 3 : <select name="num_prdt" >
		<option value="1">Selectionnez produit</option>
		<?php
	while($dnne=$prepa->fetch())
		{
		?>
	<option value="ad= <?php echo $dnne['num_prdt']; ?>"><?php echo $dnne['nom_prdt']; ?></option>
		<?php } ?>
	  </select></td></tr>
  <tr><td>Produit 4 : <select name="num_prdt" >
		<option value="1">Selectionnez produit</option>
		<?php
	while($dn=$prepa->fetch())
		{
		?>
	<option value="ad= <?php echo $dn['num_prdt']; ?>"><?php echo $dn['nom_prdt']; ?></option>
		<?php } ?>
	  </select></td></tr>
  <tr><td>Produit 5 : <select name="num_prdt" >
		<option value="1">Selectionnez produit</option>
		<?php
	while($dne=$prepa->fetch())
		{
		?>
	<option value="ad= <?php echo $dne['num_prdt']; ?>"><?php echo $dne['nom_prdt']; ?></option>
		<?php } ?>
	  </select></td></tr>
  </table>
  </fieldset>
     <input type="reset" name="Annuler" value="Annuler"/> 
    <input type="submit" name="Valider" value="Valider" ></td>
  </tr>
</table>

</body>
</html>