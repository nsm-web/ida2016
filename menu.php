  <meta charset="utf_8">
    <link type="text/css" rel="stylesheet" href="style.css"/>
<title>Document sans titre</title>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />

    <ul id="MenuBar1" class="MenuBarHorizontal">
      <li><a href="accueil.php">Accueil</a></li>
      <li><a class="MenuBarItemSubmenu" href="#">Gestion des Rendez-Vous</a>
        <ul>
          <li><a href="#" class="MenuBarItemSubmenu">Creer un Rendez-Vous</a>
            <ul>
              <li><a href="ajout_rdv.php">Enregistrer</a></li>
              <li><a href="liste_rdv_executee.php">Executer</a></li>
              <li><a href="date_recette.php">Recette</a></li>
              
            </ul>
          </li>
          <li><a href="#" class="MenuBarItemSubmenu">Liste des Rendez-Vous</a>
            <ul>
              <li><a href="liste_rdv.php">Liste Rendez-Vous</a></li>
            </ul>
          </li>
        </ul>
      </li>
      <li><a class="MenuBarItemSubmenu" href="#">Enregistrements / Listes</a>
          <ul>
                <li><a class="MenuBarItemSubmenu" href="#">Enregistrement</a>
                    <ul>
                     <li><a href="ajout_client.php">Client</a></li>
                     <li><a href="ajout_service.php">Service</a></li>
                     <li><a href="ajout_fourn.php">Fournisseur</a></li>
                     <li><a href="ajout_person.php">Personnel</a></li>
                     <li><a href="ajout_prodt.php">Produit</a></li>
                     <li><a href="ajout_type_prodt.php">Type Produit</a></li>
					 <li><a href="apprvisionnemer.php">Depense Materiel</a></li>
					 <li><a href="ajout_depense_salaire.php">Depense Salaire</a></li>
					 <li><a href="ajout_depense_facture.php">Depense Facture</a></li>
                    </ul>
                </li>
                <li><a class="MenuBarItemSubmenu" href="#">Liste</a>
                    <ul>
                     <li><a href="liste_client.php">Client</a></li>
                     <li><a href="liste_service.php">Service</a></li>
                     <li><a href="liste_fourn.php">Fournisseur</a></li>
                     <li><a href="liste_person.php">Personnel</a></li>
                     <li><a href="liste_prodt.php">Produit</a></li>
                     <li><a href="liste_type_prodt.php">Type Produit</a></li>
					 <li><a href="liste_depense_materiel.php">Depense Materiel</a></li>
					 <li><a href="liste_depense_salaire.php">Depense Salaire</a></li>
					 <li><a href="liste_depense_facture.php">Depense Facture</a></li>

                    </ul>
                </li>
            </ul>
	    </li>
    </ul>
<script type="text/javascript">
 var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>