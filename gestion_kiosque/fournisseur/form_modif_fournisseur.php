<?php include_once 'connexion.php' ; ?>
<!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
 <title>Modifier Fournisseur</title>
 </head>
 <body>
 <h1 style="color:violet; text-align:center;">Modifier Fournisseur</h1>
<fieldset style="background: lightgreen">
<?php
$bdd = connectgestion_kiosque() ;
$query = $bdd->prepare('SELECT * from fournisseur WHERE id_fournisseur = :id');
$query->execute(['id' => $_GET['id_fournisseur']]);
// $query->execute(['id' => 1]);
$conts = $query->fetchAll(); 
// echo '<pre>'; print_r($conts); echo '</pre>';
//var_dump($conts) ;
//$cont = $conts[0] ; 
?>
<form action ="modif_fournisseur.php" method="POST">
<input type="number" id="id" name="id_fournisseur" value =
 "<?php echo ($conts[0]['id_fournisseur']); ?>" hidden /><br/>
 <label for="nom_fournisseur"> Nom fournisseur </label>
 <input type="text" id="nom_fournisseur" name="nom_fournisseur" value =
 "<?php echo ($conts[0]['nom_fournisseur']); ?>"/><br/>
 <label for="num_voie"> Numéro de voie </label>
 <input type="number" id="num_voie" name="num_voie" value =
 "<?php echo ($conts[0]['num_voie']); ?>"/><br/>
 <label for="nom_voie"> Nom voie </label>
 <input type="text" id="nom_voie" name="nom_voie" value =
 "<?php echo ($conts[0]['nom_voie']); ?>"/><br/>
 <label for="code_postal"> Code postal </label>
 <input type="text" id="code_postale" name="code_postal" value =
 "<?php echo ($conts[0]['code_postal']); ?>"/><br/>
 <label for="ville"> Ville </label>
 <input type="text" id="ville" name="ville" value =
 "<?php echo ($conts[0]['ville']); ?>"/><br/>
 <label for="email"> Email </label>
 <input type="text" id="email" name="email" value =
 "<?php echo ($conts[0]['email']); ?>"/>
 <label for="telephone"> Téléphone </label>
 <input type="text" id="telephone" name="telephone" value =
 "<?php echo ($conts[0]['telephone']); ?>"/><br/>
 <label for="pays_fournisseur"> Pays de fournisseur </label>
 <input type="text" id="pays_fournisseur" name="pays_fournisseur" value =
 "<?php echo ($conts[0]['pays_fournisseur']); ?>"/><br/>
 <label for="TVA_fournisseur"> T<label for="pays_fournisseur"> Pays de fournisseur </label>
 <input type="text" id="pays_fournisseur" name="pays_fournisseur" value =
 "<?php echo ($conts[0]['pays_fournisseur']); ?>"/><br/>TVA de fournisseur </label>
 <input type="number" step="0.01" id="TVA_fournisseur" name="TVA_fournisseur" value =
 "<?php echo ($conts[0]['TVA_fournisseur']); ?>"/><br/>
 <button type="submit">Enregistrer les modifications</button>
</form>
<?php $query->closeCursor(); ?>

</body>

</html>

