<?php
include_once 'connexion.php' ;
$bdd = connectgestion_kiosque() ;
$query = $bdd->prepare('Select * from Fournisseur');
$query->execute();
$conts = $query->fetchAll();
?>
<!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
 <title>Modifier fournisseur</title>
 </head>
 <body>
 <h1 style="color:violet; text-align:center;">Listes des fournisseurs</h1>
<fieldset style="background: lightgreen">
 <form action = "form_insert_fournisseur.php">
 <button type="submit">Nouveau Fournisseur</button>
 </form>
 <?php
foreach ($conts as $cont) {
?>
        <p>
<?php
;
        echo ("Id : " . $cont["id_fournisseur"] . "<br/>") ;
        echo ("Nom Fournisseur : " . $cont["nom_fournisseur"] . "<br/>") ;
        echo ("Num voie : " . $cont["num_voie"] . "<br/>") ;
        echo ("Mom voie: " . $cont["nom_voie"] . "<br/>") ;
        echo ("Code postal: " . $cont["code_postal"] . "<br/>") ;
        echo ("Ville: " . $cont["ville"] . "<br/>") ;
        echo ("Email: " . $cont["email"] . "<br/>") ;
        echo ("Telephone: " . $cont["telephone"] . "<br/>") ;
        echo ("Pays fournisseur: " . $cont["pays_fournisseur"] . "<br/>") ;
        echo ("TVA fournisseur: " . $cont["TVA_fournisseur"] . "<br/>") ;
?>
 <a href = "form_modif_fournisseur.php?id_fournisseur=
<?php echo ($cont['id_fournisseur']) ; ?>" >Modifier </a> -

 <a href = "supp_fournisseur.php?id_fournisseur=
<?php echo ($cont['id_fournisseur']) ; ?>" >Supprimer</a>
 </p>
<?php
}
$query->closeCursor();
?>
 </body>
</html>