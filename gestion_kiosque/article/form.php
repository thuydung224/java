<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<title>Ajout Article</title>
</head>
<body>
<h1 style="color:violet; text-align:center;">Créer une fiche article</h1>
<form action ="insert_article.php" method="POST">
<fieldset style="background: lightgreen">
<label for="id_article"> Identifiant article</label>
<input type="text" id="id_article" name="id_article"/><br/>
<label for="nom_article"> Nom article</label>
<input type="text" id="nom_article" name="nom_article"/><br/>
<label for="parution">Parution </label>
<input type="date" id="parution" name="parution"/><br/>
<label for="stock"> Stock</label>
<input type="number" id="stock" name="stock"/><br/>
<label for="prix_achat_HT">Prix d'achat</label>
<input type="number" step="0.01" id="prix_achat_HT" name="prix_achat_HT"/><br/>
<label for="prix_vente_HT"> Prix de vente</label>
<input type="number" step="0.01" id="prix_vente_HT" name="prix_vente_HT"/><br/>
<label for="libelle"> Type article</label>
<input type="text" id="libelle" name="libelle"/><br/>
<label for="taux_commission"> Taux de commission</label>
<input type="number" step="0.01" id="taux_commission" name="taux_commission"/><br/>
<label for="tva"> TVA</label>
<input type="number" step="0.01" id="tva" name="tva"/><br/>
<button type="submit">Ajout <article></article></button>
</form>
</body>
</html>