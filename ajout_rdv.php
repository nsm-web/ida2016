<?php include("connexion.php");?>
<?php
   if(isset($_POST['num_clt'])){
	   $date_rdv=$_POST['date_rdv'];
	   $num_clt=$_POST['num_clt'];
	   $num_person=$_POST['num_person'];
	   $date_exe=$_POST['date_exe'];
	   $type_payement=$_POST['type_payement'];
	   $caissiere=$_POST['caissiere'];
	   $id_service1=$_POST['id_service1'];
	   $id_service2=$_POST['id_service2'];
	   $id_service3=$_POST['id_service3'];
	   $id_service4=$_POST['id_service4'];
	   $id_service5=$_POST['id_service5'];
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
	   

 if ( ($num_person=="") OR ($num_clt=="") OR ($date_rdv=="") OR ($caissiere=="") OR ($date_exe=="")){
			     echo "Remplir correctement tous les champs du formulaire";
		        }else{
$msg="";
$msg2="";

	   if ($id_service1!=""){
	   if (($id_service1==$id_service2) OR ($id_service1==$id_service3) OR ($id_service1==$id_service4) OR ($id_service1==$id_service5)){
		   $msg= ' Choisir des services diffirents svp';
		  
		   }
	   }
		   	 if ($id_service2!=""){   
	    if ( ($id_service2==$id_service3) OR ($id_service2==$id_service4) OR ($id_service2==$id_service5)){
		   $msg=' Choisir des services diffirents svp';
		   

		   }}
	      
		   if ($id_service3!=""){
		   if ( ($id_service3==$id_service4) OR ($id_service3==$id_service5)){
		   $msg= ' Choisir des services diffirents svp';
		  
		   }
		   }
		   
		    if ($id_service4!=""){
	    if (($id_service4==$id_service5)){
		   $msg= ' Choisir des services diffirents svp';
		   

		   }
		   }
		    if ($num_prodt1!=""){
		   if(($num_prodt1==$num_prodt2) OR ($num_prodt1==$num_prodt3) OR ($num_prodt1==$num_prodt4) OR ($num_prodt1==$num_prodt5)){
		  $msg2= ' Choisir des produits diffirents svp';
		   
		   }}
		 if ($num_prodt2!=""){   	   
	    if ( ($num_prodt2==$num_prodt3) OR ($num_prodt2==$num_prodt4) OR ($num_prodt2==$num_prodt5)){
		   $msg2= ' Choisir des produits diffirents svp';
		  

		   }
		 }
	       if ($num_prodt3!=""){
		   if ( ($num_prodt3==$num_prodt4) OR ($num_prodt3==$num_prodt5)){
		  $msg2= ' Choisir des produits diffirents svp';
		   
		   }}
		   
		   if ($num_prodt4!=""){	   
	    if (($num_prodt4==$num_prodt5)){
		  $msg2= ' Choisir des produits diffirents svp';
		  

		   
		  }}
	   
	   
	  
				
	            
					try{
					 
					 if (($msg!="")or($msg2!="")){
						 echo $msg."<br>".$msg2;
						 
					 }else{
					 
				     $requete="INSERT INTO rendez_vous (id_rdv, date_rdv, num_clt, num_person, date_exe, caissiere) VALUES(?,?,?,?,?,?)";
	                 $prepare=$connexion->prepare($requete);
 	                 $reponse=$prepare->execute(array(null,$date_rdv,$num_clt,$num_person,$date_exe,$caissiere));
			         $dernierid=$connexion->lastInsertid();
					 
			         if($_POST['id_service1']!=""){
						 
			         $requete="INSERT INTO avoir (id_rdv,id_service,type_payement) VALUES(?,?,?)";
	                 $prepare=$connexion->prepare($requete);
	                 $execute=$prepare->execute(array($dernierid,$id_service1,$type_payement));
			          }
					  
					  if($_POST['id_service2']!=""){
				     
			 
			         $requete="INSERT INTO avoir (id_rdv,id_service,type_payement) VALUES(?,?,?)";
	                 $prepare=$connexion->prepare($requete);
	                 $execute=$prepare->execute(array($dernierid,$id_service2,$type_payement));
			          }
					  
					  if($_POST['id_service3']!=""){
				     
			 
			         $requete="INSERT INTO avoir (id_rdv,id_service,type_payement) VALUES(?,?,?)";
	                 $prepare=$connexion->prepare($requete);
	                 $execute=$prepare->execute(array($dernierid,$id_service3,$type_payement));
			          }
					  
					  if($_POST['id_service4']!=""){
				     
					 
			         $requete="INSERT INTO avoir (id_rdv,id_service,type_payement) VALUES(?,?,?)";
	                 $prepare=$connexion->prepare($requete);
	                 $execute=$prepare->execute(array($dernierid,$id_service4,$type_payement));
			          }
					  
					  if($_POST['id_service5']!=""){
				     
			 
			         $requete="INSERT INTO avoir (id_rdv,id_service,type_payement) VALUES(?,?,?)";
	                 $prepare=$connexion->prepare($requete);
	                 $execute=$prepare->execute(array($dernierid,$id_service5,$type_payement));
					 }
			          
					    if($_POST['num_prodt1']!=""){
						 $requete="INSERT INTO achete (id_rdv,num_prodt,qte,pu) VALUES(?,?,?,?)";
						 $prepare=$connexion->prepare($requete);
	                     $execute=$prepare->execute(array($dernierid,$num_prodt1,$qte1,$pu1));
						}
						
						if($_POST['num_prodt2']!=""){
						 $requete="INSERT INTO achete (id_rdv,num_prodt,qte,pu) VALUES(?,?,?,?)";
						 $prepare=$connexion->prepare($requete);
	                     $execute=$prepare->execute(array($dernierid,$num_prodt2,$qte2,$pu2));
						}
						
						if($_POST['num_prodt3']!=""){
						 $requete="INSERT INTO achete (id_rdv,num_prodt,qte,pu) VALUES(?,?,?,?)";
						 $prepare=$connexion->prepare($requete);
	                     $execute=$prepare->execute(array($dernierid,$num_prodt3,$qte3,$pu3));
						}
						
						if($_POST['num_prodt4']!=""){
						 $requete="INSERT INTO achete (id_rdv,num_prodt,qte,pu) VALUES(?,?,?,?)";
						 $prepare=$connexion->prepare($requete);
	                     $execute=$prepare->execute(array($dernierid,$num_prodt4,$qte4,$pu4));
						}
						
						if($_POST['num_prodt5']!=""){
						 $requete="INSERT INTO achete (id_rdv,num_prodt,qte,pu) VALUES(?,?,?,?)";
						 $prepare=$connexion->prepare($requete);
	                     $execute=$prepare->execute(array($dernierid,$num_prodt5,$qte5,$pu5));
						}
						if($reponse==1){
		                  echo"ajout effectue avec succes";
						}
					 }
					}catch(PDOException $e){
				     echo $e->getMessage();
				    }
		/*else{
			 

	      try{
			for ($j=1; $j<=5; $j++){
				echo $j;
				 $service=$_POST['service'.$j];
		         $qte=$_POST['qte'.$j];
	             $pu=$_POST['pu'.$j];
		         $requete="INSERT INTO avoir (id_rdv,id_service,prix_service,comptant) VALUES(?,?,?,?)";
		         $prepare=$connexion->prepare($requete);
		         $execute=$prepare->execute(null,$dernier, $service.$i,$prix_service,$comptant);
				 
		        for ($i=0; $i<=5; $i++){
				 $num_prodt=$_POST['num_prodt'.$j];
		         $qte=$_POST['qte'.$j];
	             $pu=$_POST['pu'.$j];
		         $requete="INSERT INTO achete (id_rdv,num_prodt,qte,pu) VALUES(?,?,?)";
		         $prepare=$connexion->prepare($requete);
		         $execute=$prepare->execute(null,$dernier,$num_prodt.$i,$qte.$i,$pu.$i);
	             
			    }
			    }
			}catch(PDOException $e){
				 echo $e->getMessage();
				}
        }*/
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
  	             <td> Ajouter un Rendez-Vous </td>
                </tr>
            </table></td>
  </tr>
  <tr>
    <td>  
<form action="ajout_rdv.php" method="POST">
<table border="0">
 <tr><td>Date du Rendez-Vous:</td><td><input type="date" name="date_rdv" required/></td></tr>
 <?php 
	   $requete="SELECT*FROM client ORDER BY nom_clt ASC";
	   $pre=$connexion->prepare($requete);
	   $exe=$pre->execute();
	   ?>
 <tr><td> Client: </td><td><select name="num_clt"><option value=""> Choisir le Client: </option>
 <?php
	   while ($donnee=$pre->Fetch()){
		?>
		<option value="<?php echo $donnee["num_clt"]?>" ><?php echo $donnee["nom_clt"];?></option>
	   <?php }?>
       </select></td></tr>
	   
	    <?php 
	   $requete="SELECT*FROM personnel ORDER BY nom_person ASC";
	   $pre=$connexion->prepare($requete);
	   $exe=$pre->execute();
	   ?>
	   
 <tr><td> Personnel: </td><td><select name="num_person"><option value=""> Choisir le Personnel</option>
 <?php
	   while ($donnee=$pre->Fetch()){
		?>
		<option value="<?php echo $donnee["num_person"]?>" ><?php echo $donnee["nom_person"];?></option>
	   <?php }?>
       </select></td></tr>
	   
<tr><td>Date d'Execution:</td><td><input type="date" name="date_exe" required/></td></tr>

 <?php
	   $requete="SELECT*FROM personnel ORDER BY nom_person ASC";
	   $pre=$connexion->prepare($requete);
	   $exe=$pre->execute();
	   ?>

	   <tr><td> Caissière: </td><td><select name="caissiere"><option value=""> Choisir la Caissière: </option> 
  <?php
	   while ($donnee=$pre->Fetch()){
		?>
		<option value="<?php echo $donnee["num_person"]?>" ><?php echo $donnee["nom_person"];?></option>
	   <?php }?>
       </select></td></tr>
	   
 </table>
 <fieldset>
  <legend>Les Differents Services:</legend>
  <table>
       
	    <?php 
	   $requete="SELECT*FROM service ORDER BY type_service ASC";
	   $pre=$connexion->prepare($requete);
	   $exe=$pre->execute();
	   ?>
  <tr>
  <td> Service 1: </td><td><select name="id_service1"><option value=""> Choisir Service1: </option> 
  
  <?php
	   while ($donnee=$pre->Fetch()){
		?>
		<option value="<?php echo $donnee["id_service"]?>" >
		<?php echo $donnee["type_service"] ."  : Prix: ".$donnee["prix_service"];?></option>
	   <?php }?>
       </select>
    </tr>
	   
	   
	    <?php 
	   $requete="SELECT*FROM service ORDER BY type_service ASC";
	   $pre=$connexion->prepare($requete);
	   $exe=$pre->execute();
	   ?>
  <tr>
  <td> Service 2: </td><td><select name="id_service2"><option value=""> Choisir Service2: </option> 
  
  <?php
	   while ($donnee=$pre->Fetch()){
		?>
		<option value="<?php echo $donnee["id_service"]?>" >
		<?php echo $donnee["type_service"] ."  : Prix: ".$donnee["prix_service"];?></option>
	   <?php }?>
       </select>
    </tr>
	    <?php 
	   $requete="SELECT*FROM service ORDER BY type_service ASC";
	   $pre=$connexion->prepare($requete);
	   $exe=$pre->execute();
	   ?>
 
  <td> Service 3: </td><td><select name="id_service3"><option value=""> Choisir Service3: </option> 
  
  <?php
	   while ($donnee=$pre->Fetch()){
		?>
		<option value="<?php echo $donnee["id_service"]?>" >
		<?php echo $donnee["type_service"] ."  : Prix: ".$donnee["prix_service"];?></option>
	   <?php }?>
       </select>
    </tr>
	   
	   
	    <?php 
	   $requete="SELECT*FROM service ORDER BY type_service ASC";
	   $pre=$connexion->prepare($requete);
	   $exe=$pre->execute();
	   ?>
	   
  <tr><td> Service 4: </td><td><select name="id_service4"><option value=""> Choisir Service4: </option> 
  
   <?php
	   while ($donnee=$pre->Fetch()){
		?>
		<option value="<?php echo $donnee["id_service"]?>" > 
		<?php echo $donnee["type_service"] ."  : Prix: ".$donnee["prix_service"];?></option>
	   <?php }?>
       </select></td> 
    </tr>
	   
	      <?php 
	   $requete="SELECT*FROM service ORDER BY type_service ASC";
	   $pre=$connexion->prepare($requete);
	   $exe=$pre->execute();
	   ?>
	   
  <tr><td> Service 5: </td><td><select name="id_service5"><option value=""> Choisir Service5: </option> 
   <?php
	   while ($donnee=$pre->Fetch()){
		?>
		<option value="<?php echo $donnee["id_service"]?>" >
		<?php echo $donnee["type_service"] ."   :Prix: ".$donnee["prix_service"];?></option>
	   <?php }?>
       </select></td></select>
	   </tr>
	   
   
  <tr><td> Type Payement: </td><td><select name="type_payement"><option value="">Choisir un mode de paiement </option><option value="Mobile Money">Par Mobile Money</option><option value="Par Chèque">Par Chèque</option><option value="En Espèce">En Espèce</option>
  
       </select></td></tr> 
        
		
		<?php 
	   $requete="SELECT*FROM produit ORDER BY designation ASC";
	   $pre=$connexion->prepare($requete);
	   $exe=$pre->execute();
	   ?>
	   <tr><td> Produit 1 :</td><td><select name="num_prodt1"><option value=""> Choisir le Produit: </option>
       
        <?php
	   while ($donnee=$pre->Fetch()){
		?>
		<option value="<?php echo $donnee["num_prodt"]?>" ><?php echo $donnee["designation"];?></option>
	   <?php }?>
       </select></td><td> Quantité 1: </td><td><input type="number" min="0"  name="qte1"/></td><td> Prix Unitaire: </td><td><input type="number" min="0"  name="pu1"/></td></tr>
         <?php 
	   $requete="SELECT*FROM produit ORDER BY designation ASC";
	   $pre=$connexion->prepare($requete);
	   $exe=$pre->execute();
	   ?>
	   <tr><td> Produit 2: </td><td><select name="num_prodt2"><option value=""> Choisir le Produit: </option>
       
        <?php
	   while ($donnee=$pre->Fetch()){
		?>
		<option value="<?php echo $donnee["num_prodt"]?>" ><?php echo $donnee["designation"];?></option>
	   <?php }?>
       </select></td><td> Quantité 2: </td><td><input type="number" min="0"  name="qte2"/></td><td> Prix Unitaire: </td><td><input type="number" min="0"  name="pu2"/></td></tr>
         <?php 
	   $requete="SELECT*FROM produit ORDER BY designation ASC";
	   $pre=$connexion->prepare($requete);
	   $exe=$pre->execute();
	   ?>
	   <tr><td> Produit 3: </td><td><select name="num_prodt3"><option value=""> Choisir le Produit: </option>
       
        <?php
	   while ($donnee=$pre->Fetch()){
		?>
		<option value="<?php echo $donnee["num_prodt"]?>" ><?php echo $donnee["designation"];?></option>
	   <?php }?>
       </select></td><td> Quantité 3: </td><td><input type="number" min="0"  name="qte3"/></td><td> Prix Unitaire: </td><td><input type="number" min="0"  name="pu3"/></td></tr>
       
       
         <?php 
	   $requete="SELECT*FROM produit ORDER BY designation ASC";
	   $pre=$connexion->prepare($requete);
	   $exe=$pre->execute();
	   ?>
	   <tr><td> Produit 4: </td><td><select name="num_prodt4"><option value=""> Choisir le Produit: </option>
       
        <?php
	   while ($donnee=$pre->Fetch()){
		?>
		<option value="<?php echo $donnee["num_prodt"]?>" ><?php echo $donnee["designation"];?></option>
	   <?php }?>
       </select></td><td> Quantité 4: </td><td><input type="number" min="0"  name="qte4"/></td><td> Prix Unitaire: </td><td><input type="number" min="0"  name="pu4"/></td></tr>
         <?php 
	   $requete="SELECT*FROM produit ORDER BY designation ASC";
	   $pre=$connexion->prepare($requete);
	   $exe=$pre->execute();
	   ?>
	   <tr><td> Produit 5: </td><td><select name="num_prodt5"><option value=""> Choisir le Produit: </option>
       
        <?php
	   while ($donnee=$pre->Fetch()){
		?>
		<option value="<?php echo $donnee["num_prodt"]?>" ><?php echo $donnee["designation"];?></option>
	   <?php }?>
       </select></td><td> Quantité 5: </td><td><input type="number" min="0"  name="qte5"/></td><td> Prix Unitaire: </td><td><input type="number" min="0"  name="pu5"/></td></tr> 
  </table>
  </fieldset>
  <input type="submit" value="Valider" /> <input type="reset" value="Annuler" />
</form></td>
  </tr>
</table>

</body>
</html>