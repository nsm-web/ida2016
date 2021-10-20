<?php 

if(isset($_POST['login'])&&($_POST['login']!="")){

if(($_POST['login']=="NSM")&&($_POST['motpass']=="046966")){
	
	header('location:accueil.php');
	
}else{
	$msg=" Login et / ou Mot de passe inorrecte !";
	
}

}
if(isset($_POST['login'])&&($_POST['login']="")){
	
	$msg=" Remplir correctement les champs svp !";
	
}
?>



<!DOCTYPE HTML>
	<html>
		<head>
		 <meta charset="utf_8">
		 <link type="text/css" rel="stylesheet" href="style.css"/>
 <!-- Important Owl stylesheet -->
    <link rel="stylesheet" href="owl-carousel/owl.carousel.css">
     
    <!-- Default Theme -->
    <link rel="stylesheet" href="owl-carousel/owl.theme.css">
		</head>
		<body style="background-image: url(images/fond.jpg)">
            
        <table BORDER width="1010" height="355" align="center" style="background-color:#FFF; border-collapse:collapse">
           <tr><td><img src="images/baniere.jpg"  /> 
                </td>
          </tr>
             <tr>
               <td height="314">
       <table width="100%" height="33" border="1" style="border-collapse:collapse">
	 	     <tr>
  	         <td>
             <form name="form1" method="post" action=""> <table width="1007" border="0" style="background-color:#FBFBFB">
  <tr>
    <td align="right">&nbsp;</td>
    <td><h2 style=" color:#036">Identifiez-vous !</h2></td>
    <td colspan="3" align="left" style="color:#900; font-size:18px"><?php echo (isset($msg)?$msg:"") ?>&nbsp;</td>
    </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td width="97" align="right" bgcolor="#FBFBFB"><strong>Login</strong> :</td>
    <td width="255"><label for="login"></label>
      <input name="login" type="text" id="login" size="50" placeholder="Login ici"></td>
    <td width="295" align="right"><strong>Mot de passe :</strong></td>
    <td width="345" align="left"><label for="motpass"></label>
      <input name="motpass" type="password" id="motpass" size="25" placeholder="Mot de passe ici"></td>
    <td width="345" align="left"><input type="submit" name="connexion" id="connexion" value="  Connexion  "></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
             </table>
  	           
               </form>
             </td>
             </tr>
             </table>
                <table BORDER=0 CELLSPACING=0  width="100%" > 
                    <tr><td ><br>

                   <?php include('scrol.php'); ?>
    <br>
<br>
<span style="font-size:22px; color:#F00; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif ; text-decoration:underline">Un espace et des &eacute;quipements Moderne</span>
                    
                    </td></tr>
                      <tr> <td height="300" bgcolor="" valign="top">
                      <table width="1008" border="1" height="200" style="border:1px dotted #999999; border-collapse:collapse; background-color:#dedede">
  <tr>
    <td><img src="images/equipe_1.jpg" width="267" height="189"></td>
    <td><img src="images/interieur_1.jpg" width="259" height="194"></td>
    <td><img src="images/outils_1.jpg" width="259" height="194"></td>
    <td><img src="images/pedicure.jpg" width="193" height="193"></td>
  </tr>
</table>
<br><br><br><br>

<table width="1008" border="1" height="25" style="border:1px solid #999999; border-collapse:collapse">
  <tr>
    <td>Copyright &copy; 2016 - Tout droit r&eacute;serv&eacute; - <a href="#">Extetic-Salon</a></td>
  </tr>
</table></td></tr>
</table>  
        </table> </td>
            </tr>
             <table>
             
             
             <script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
<script>window.jQuery || document.write('<script src="layout/scripts/jquery-latest.min.js"><\/script>\
<script src="layout/scripts/jquery-ui.min.js"><\/script>')</script>
<script>jQuery(document).ready(function($){ $('img').removeAttr('width height'); });</script>
<script src="layout/scripts/jquery-mobilemenu.min.js"></script>
<script src="layout/scripts/custom.js"></script>

<script src="assets/js/jquery-1.9.1.min.js"></script>
    <script src="owl-carousel/owl.carousel.min.js"></script>
 <script>

    $(document).ready(function($) {
    /* slides*/
	  $("#owl-example").owlCarousel({
	autoPlay : 5000,
	stopOnHover : false,
	// Responsive 
    responsive: true,
    responsiveRefreshRate :150,
    responsiveBaseWidth: window,
 
    // CSS Styles
    baseClass : "owl-carousel",
    theme : "owl-theme",
 
    //Lazy load
    lazyLoad : false,
    lazyFollow : true,
    lazyEffect : "fade",   
	dragBeforeAnimFinish : true,
    mouseDrag : true,
    touchDrag : true
    })
   
    } );


    $("body").data("page", "frontpage");

</script>
</script>

<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>



<script type="text/javascript" src="layout/scripts/solidshow/jquery.min.js"></script>
<script type="text/javascript" src="layout/scripts/solidshow/jquery.nivo.slider.pack.js"></script>




<!--[if lt IE 8]>
<style type="text/css" media="screen">.nivo-controlNav a{float:left;}</style>
<![endif]-->
<script src="layout/scripts/jquery.flexslider-min.js">
</script>
    </body>
	</html>