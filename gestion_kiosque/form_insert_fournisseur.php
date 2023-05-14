<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<title>Ajout Fournisseur</title>
</head>
<body>
<h1>Ajout Fournisseur</h1>
<form action ="insert_fournisseur.php" method="POST">
<label for="id_fournisseur"> Identifiant fournisseur</label>
<input type="number" id="id_fournisseur" name="id_fournisseur"/><br/>
<label for="nom_fournisseur"> Nom fournisseur</label>
<input type="text" id="nom_fournisseur" name="nom_fournisseur"/><br/>
<label for="num_voie"> Num de voie</label>
<input type="number" id="num_voie" name="num_voie"/><br/>
<label for="nom_voie"> Nom de voie</label>
<input type="text" id="nom_voie" name="nom_voie"/><br/>
<label for="code_postal"> Code postal</label>
<input type="text" id="code_postal" name="code_postal"/><br/>
<label for="ville"> Ville</label>
<input type="text" id="ville" name="ville"/><br/>
<label for="email"> Email</label>
<input type="text" id="email" name="email"/><br/>
<label for="telephone"> Telephone</label>
<input type="text" id="telephone" name="telephone"/><br/>
<label for="pays_fournisseur"> Pays de fournisseur</label>
<input type="text" id="pays_fournisseur" name="pays_fournisseur"/><br/>
<label for="TVA_fournisseur"> TVA fournisseur</label>
<input type="number" step="0.01" id="TVA_fournisseur" name="TVA_fournisseur"/><br/>
<button type="submit">Ajout <fournisseur></fournisseur></button>
</form>
</body>
</html>