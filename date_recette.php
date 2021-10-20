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
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
  
  
  

<form action="" method="post" name="form" id="form" >

Période: 

<label for="from">Du :</label>
<input type="text" id="from" name="from" value="<?php echo(isset($_POST['from'])? $_POST['from']:"") ?>"> &nbsp;


<label for="to">Au :</label>
<input type="text" id="to" name="to" value="<?php echo(isset($_POST['to'])? $_POST['to']:"") ?>"> &nbsp;

<input name="valider" type="submit" value="Afficher" />


 </form>

    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><?php
include("connexion.php");

 if(isset($_POST['valider'])){
	  
	  $de=$_POST['from'];
	  $a=$_POST['to'];
	  
	  
	  
	  
$requet="SELECT * FROM rendez_vous WHERE etat_rdv='1' AND date_exe BETWEEN ? AND ? ORDER BY id_rdv ASC";
   $prepare=$connexion->prepare($requet);
   $reponse=$prepare->execute(array($de, $a));
?>
    <table border="1">
        <tr><td rowspan="2"> Numero Rendez-Vous </td>
		 <td rowspan="2"> Date Rendez-Vous </td>
		 <td rowspan="2"> Numero Client </td>
	     <td rowspan="2"> Numero Personnel </td>
	     <td rowspan="2"> Date Execution </td>
	     <td rowspan="2"> Caissiere </td>
	     <td colspan="3"> Action </td>
	    </tr>
	    <tr>
	      <td> Montant Services</td>
	      <td> Montant Produits</td>
	      <td> Total RDV</td></tr>
		<?php
		$total1=0;
		 $tservice=0;
		  $tproduit=0;
		  $total=0;
	    while ($donnee=$prepare->Fetch()){ ?>
			<tr><td><?php echo $donnee['id_rdv'];?></td>
			 <td><?php echo $donnee['date_rdv'];?></td>
			 <td><?php echo $donnee['num_clt'];?></td>
			 <td><?php echo $donnee['num_person'];?></td>
			 <td><?php echo $donnee['date_exe'];?></td>
			 <td><?php echo $donnee['caissiere'];?></td>
			 <td>
     <?php   $id_rdv=$donnee['id_rdv'];     
             
   
  $requetE="SELECT SUM(service.prix_service)as total FROM service, avoir WHERE service.id_service=avoir.id_service AND id_rdv=?";
   $prepare1=$connexion->prepare($requetE);
   $reponse=$prepare1->execute(array($id_rdv));
   $reponse=$prepare1->Fetch()
  
   ?>
             <?php  echo $reponse['total'];
			 $tservice=$reponse['total'];
			 ?>
             </td>
			 <td>
             
             
             
              <?php   $id_rdv=$donnee['id_rdv'];     
             
   
  $requetP="SELECT SUM((pu*qte))as total FROM achete WHERE  id_rdv=?";
   $prepare2=$connexion->prepare($requetP);
   $reponse2=$prepare2->execute(array($id_rdv));
   $reponse2=$prepare2->Fetch()
  
   ?>
             <?php  echo $reponse2['total'];
			  $tproduit=$reponse2['total'];
			 ?>
             
             
             </td>
			 <td><?php echo $tproduit+$tservice;
			 $total1=$tproduit+$tservice;
			 $total=$total+$total1
			 
			 ?></td>
		    </tr>
			<?php 
	    }
		}else{ ?>
        <table border="1">
        <tr><td rowspan="2"> Numero Rendez-Vous </td>
		 <td rowspan="2"> Date Rendez-Vous </td>
		 <td rowspan="2"> Numero Client </td>
	     <td rowspan="2"> Numero Personnel </td>
	     <td rowspan="2"> Date Execution </td>
	     <td rowspan="2"> Caissiere </td>
	     <td colspan="3"> Action </td>
	    </tr>
	    <tr>
	      <td> Services</td>
	      <td> Produits</td><td> Supprimer </td></tr>
           
			<tr><td></td>
			 <td></td>
			 <td></td>
			 <td></td>
			 <td></td>
			 <td></td>
			 <td></td>
			 <td></td>
			 <td>&nbsp;</td>
		    </tr>
        <?php }?>
        
	</table>
   
 <br />
<br />
<table width="1000" border="0" style=" background-color:#999; height:40px">
  <tr>
    <td>Recette de la periode: </td>
    <td style="color:#F00; font-size:18px;font-weight:bold"><?php echo (isset($total)?$total:""); ?> &nbsp; FCFA</td>
  </tr>
</table>
  
</table>

</body>
</html> 
