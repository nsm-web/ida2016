<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="jquery-1.12.4.js"></script>
  <script src="jquery-ui.js"></script>
  
  <!--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>-->
  
 <script>

 $( function() {
    var dateFormat = "yy-mm-dd",
      from = $( "#from" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 1,
		  dateFormat: "yy-mm-dd"
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 1,
		dateFormat: "yy-mm-dd"
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }
  } );
  </script>
<body  style="background-image: url(images/fond.jpg);" >
      
  <table width="1010" border="1"   style="border-collapse:collapse; background-color:#FFF"  align="center" >
  <tr>
    <td><img src="images/baniere.jpg" width="1010" height="225"></td>
  </tr>
  <tr>
    <td> <table width="100%" height="33" border="1">
	 	        <tr  style="background-color: #F90">
  	             <td> <?php include('menu.php'); ?> </td>
  	             <td>  Liste des Rendez-Vous </td>
                </tr>
            </table></td>
  </tr>
  <tr>
    <td>
	
	    <br />

	<form action="" method="post" name="form" id="form"><table width="108" border="0">
      <tr>
    <td colspan="5">Rechercher un RDV :</td>
   
  </tr>
  <tr>
    <td nowrap="nowrap">Periode du :</td>
    <td><input name="from" type="text" id="from" value="<?php echo(isset($_POST['from'])? $_POST['from']:"") ?>"></td>
    <td nowrap="nowrap">Au :</td>
    <td><label for="au"></label>
      <input type="text" name="to" id="to"  value="<?php echo(isset($_POST['to'])? $_POST['to']:"") ?>"/></td>
    <td><input name="rechercher" type="submit" value="Rechercher"></td>
  </tr>
</table></form><br />
	
	
	
	<?php
include("connexion.php");
 
 if(isset($_POST['to'])){  
 
 //echo $_POST['form'];
 $from=$_POST['from'];
 $to=$_POST['to'];
 
   $requet="SELECT * FROM rendez_vous WHERE etat_rdv='0' AND date_rdv BETWEEN ? AND ? ORDER BY id_rdv ASC";
   $prepare=$connexion->prepare($requet);
   $reponse=$prepare->execute(array($from, $to));
  
 }else{
   $requet="SELECT * FROM rendez_vous WHERE etat_rdv='0' ORDER BY id_rdv ASC";
   $prepare=$connexion->prepare($requet);
   $reponse=$prepare->execute();
 }
 
?>

    <table border="1">
        <tr><td rowspan="2"> Numero Rendez-Vous </td>
		 <td rowspan="2"> Date Rendez-Vous </td>
		 <td rowspan="2"> Numero Client </td>
	     <td rowspan="2"> Numero Personnel </td>
	     <td rowspan="2"> Date Execution </td>
	     <td rowspan="2"> Caissiere </td>
	     <td colspan="4"> Action </td>
	    </tr>
	    <tr>
	      <td> Services</td>
	      <td> Produits</td><td> Modifier </td><td> Supprimer </td></tr>
		<?php
	    while ($donnee=$prepare->Fetch()){ ?>
			<tr><td><?php echo $donnee['id_rdv'];?></td>
			 <td><?php echo $donnee['date_rdv'];?></td>
			 <td><?php echo $donnee['num_clt'];?></td>
			 <td><?php //echo $donnee['num_person'];?>
             
             <?php 
             
	   $requete="SELECT*FROM personnel WHERE  num_person=? ";
	   $pre=$connexion->prepare($requete);
	   $exe=$pre->execute(array($donnee['num_person']));
	    $donnee5=$pre->Fetch();
		echo $donnee5['nom_person']."  ".$donnee5['prenom_person'];
		?>
             
             </td>
			 <td><?php echo $donnee['date_exe'];?></td>
			 <td><?php //echo $donnee['caissiere'];?>
              <?php 
             
	   $requete="SELECT*FROM personnel WHERE  num_person=? ";
	   $pre=$connexion->prepare($requete);
	   $exe=$pre->execute(array($donnee['caissiere']));
	    $donnee5=$pre->Fetch();
		echo $donnee5['nom_person']."  ".$donnee5['prenom_person'];
		?>
             
             </td>
			 <td><a href="liste_avoir.php?num=<?php echo $donnee['id_rdv'];?>"> Detail Services~RDV </a></td>
			 <td><a href="liste_achete.php?num=<?php echo $donnee['id_rdv'];?>"> Detail Produits~RDV </a></td>
			 <td><a href="modifier_rdv.php?num=<?php echo $donnee['id_rdv'];?>"> Modifier </a></td>
			 <td><a href="suppression_rdv.php?num=<?php echo $donnee['id_rdv'];?>"> Supprimer </a></td>
			</tr>
			<?php 
	    } ?>
	</table></td>
  </tr>
</table>

</body>
</html> 
