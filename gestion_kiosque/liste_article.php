<?php
include_once 'connexion.php' ;
$bdd = connectgestion_kiosque() ;
$query = $bdd->prepare('Select * from Article');
$query->execute();
$conts = $query->fetchAll();
echo json_encode($conts);
?>
<!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
 <title>modifier article</title>
 </head>
 <body>
 <h1>Liste des articles</h1>
 <form action = "form.php">
 <button type="submit">Nouveau article</button>
 </form>
 <?php
foreach ($conts as $cont) {
?>
        <p>
<?php
;
        echo ("id : " . $cont["id_article"] . "<br/>") ;
        echo ("Nom_Article : " . $cont["nom_article"] . "<br/>") ;
        echo ("Parution : " . $cont["parution"] . "<br/>") ;
        echo ("Stock: " . $cont["stock"] . "<br/>") ;
        echo ("Prix_achat_HT: " . $cont["prix_achat_HT"] . "<br/>") ;
        echo ("Prix_vente_HT: " . $cont["prix_vente_HT"] . "<br/>") ;
        echo ("Type article: " . $cont["libelle"] . "<br/>") ;
        echo ("Taux_commission: " . $cont["taux_commission"] . "<br/>") ;
        echo ("TVA: " . $cont["tva"] . "<br/>") ;
?>
 <a href = "form_modif_article.php?id_article=
<?php echo ($cont['id_article']) ; ?>" >Modifier </a> -

 <a href = "supp_article.php?id_article=
<?php echo ($cont['id_article']) ; ?>" >Supprimer</a>
 </p>
<?php
}
$query->closeCursor();
?>
 </body>
</html>