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
 <title>Modifier l'information</title>
 </head>
 <body>
 <h1>Gestion des fournisseurs</h1>
 <form action = "form_insert_fournisseur.php">
 <button type="submit">Nouveau fournisseur</button>
 </form>
 <?php
foreach ($conts as $cont) {
?>
        <p>
<?php
;
        echo ("Id : " . $cont["id_fournisseur"] . "<br/>") ;
        echo ("Nom_Fournisseur : " . $cont["nom_fournisseur"] . "<br/>") ;
        echo ("Num de voie : " . $cont["num_voie"] . "<br/>") ;
        echo ("Nom de voie: " . $cont["nom_voie"] . "<br/>") ;
        echo ("Code postal: " . $cont["code_postale"] . "<br/>") ;
        echo ("Ville: " . $cont["ville"] . "<br/>") ;
        echo ("Email: " . $cont["email"] . "<br/>") ;
        echo ("Tel: " . $cont["telephone"] . "<br/>") ;
        echo ("Pays de fournisseur: " . $cont["pays_fournisseur"] . "<br/>") ;
        echo ("TVA fournisseur: " . $cont["TVA_fournisseur"] . "<br/>") ;
?>
 <a href = "form_modif_fournisseur.php?id_fournisseur=
<?php echo ($cont['id_fournisseur']) ; ?>" >Modifier </a> -

 <a href = "supp_fournisseur.php?id_artcile=
<?php echo ($cont['id_fournisseur']) ; ?>" >Supprimer</a>
 </p>
<?php
}
$query->closeCursor();
?>
 </body>
</html>