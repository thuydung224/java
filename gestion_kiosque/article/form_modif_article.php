<?php include_once 'connexion.php' ; ?>
<!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
 <title>Modifier Article</title>
 </head>
 <body>
 <h1 style="color:violet; text-align:center;">Modifier Article</h1>
<fieldset style="background: lightgreen">
<?php
$bdd = connectgestion_kiosque() ;
$query = $bdd->prepare('SELECT * from Article WHERE id_article = :id');
$query->execute(['id' => $_GET['id_article']]);
// $query->execute(['id' => 1]);
$conts = $query->fetchAll(); 
// echo '<pre>'; print_r($conts); echo '</pre>';
//var_dump($conts) ;
//$cont = $conts[0] ; 
?>
<form action ="modif_article.php" method="POST">
<input type="number" id="id" name="id" value =
 "<?php echo ($conts[0]['id_article']); ?>" hidden /><br/>
 <label for="nom_article"> Nom article </label>
 <input type="text" id="nom_article" name="nom_article" value =
 "<?php echo ($conts[0]['nom_article']); ?>"/><br/>
 <label for="parution"> Parution </label>
 <input type="date" id="parution" name="parution" value =
 "<?php echo ($conts[0]['parution']); ?>"/><br/>
 <label for="stock"> Stock </label>
 <input type="number" step="0.01" id="stock" name="stock" value =
 "<?php echo ($conts[0]['stock']); ?>"/><br/>
 <label for="prix_achat_HT"> Prix achat </label>
 <input type="number" step="0.01" id="prix_achat_HT" name="prix_achat_HT" value =
 "<?php echo ($conts[0]['prix_achat_HT']); ?>"/><br/>
 <label for="prix_vente_HT"> Prix vente </label>
 <input type="number" step="0.01" id="prix_vente_HT" name="prix_vente_HT" value =
 "<?php echo ($conts[0]['prix_vente_HT']); ?>"/><br/>
 <label for="libelle"> Libellé </label>
 <input type="text" id="libelle" name="libelle" value =
 "<?php echo ($conts[0]['libelle']); ?>"/>
 <label for="taux_commission"> Taux commission </label>
 <input type="number" step="0.01" id="taux_commission" name="taux_commission" value =
 "<?php echo ($conts[0]['taux_commission']); ?>"/><br/>
 <label for="tva"> TVA </label>
 <input type="number" step="0.01" id="tva" name="tva" value =
 "<?php echo ($conts[0]['tva']); ?>"/><br/>
 <button type="submit">Enregistrer les modifications</button>
</form>
<?php $query->closeCursor(); ?>

</body>

</html>

