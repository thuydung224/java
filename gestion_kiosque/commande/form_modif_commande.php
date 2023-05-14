<?php include_once 'connexion.php' ; ?>
<!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
 <title>Modifier Commande</title>
 </head>
 <body>
 <h1 style="color:violet; text-align:center;">Modifier Commande</h1>
<fieldset style="background: lightgreen">
<?php
$bdd = connectgestion_kiosque() ;
$query = $bdd->prepare('SELECT * from commande WHERE id_commande = :id');
$query->execute(['id' => $_GET['id_commande']]);
// $query->execute(['id' => 1]);
$conts = $query->fetchAll(); 
// echo '<pre>'; print_r($conts); echo '</pre>';
//var_dump($conts) ;
//$cont = $conts[0] ; 
?>
<form action ="modif_commande.php" method="POST">
    <input id="remcount" type="number" value="0" hidden>
    <label for="date"> Date commande</label>
    <input type="date" id="date_commande" name="date_commande" 
    value=""<?php echo ($conts[0]['date_commande']); ?>
    /><br />
    <select name="id_fournisseur"
    value = ""<?php echo ($conts[0]['id_fournisseur']); ?>
    >
      <?php
      $query1 = $bdd->prepare('SELECT id_fournisseur, nom_fournisseur from fournisseur');
      $query1->execute();

      // $conts = $query->fetchAll(); 
      while ($fournisseur = $query1->fetch()) {
        echo " <option value=" . $fournisseur['id_fournisseur'] . ">" . $fournisseur['id_fournisseur'] . " " . $fournisseur['nom_fournisseur'] . "</option>";
      }
      ?>
    </select>
<?php
// count article
      $acount = 0;
      $cfetch = $bdd->prepare('SELECT * from quantite_commande where id_commande=:id');
      $cfetch->execute(['id' => $_GET['id_commande']]);
      $afetch = $bdd->prepare('SELECT nom_article, parution from article where id_article=:id');
      while ($article = $cfetch->fetch()) {
        $acount++;
        echo "<p>Id : " . $article['id_article'] . "</p>";
        $afetch->execute(['id' => $article['id_article']]);
        $article_details = $afetch->fetch();
        echo "<p>Nom : " . $article_details['nom_article'] . "</p>";
        echo "<p>Parution : " . $article_details['parution'] . "</p>";
        echo "<label for='quantite_" . $acount . "'>Quantite</label>";
        echo "<input type='number' id='quantite_" . $acount . "' name='quantite_" . $acount 
        . "' value=" . $article['qte_commande']
        . " />";
        echo "<button type='button'>Enlever</button>";
      }
      ?>
 <button type="submit">Enregistrer les modifications</button>
</form>
<?php $query->closeCursor(); ?>

</body>

</html>

