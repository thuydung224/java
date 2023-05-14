<?php include_once 'connexion.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Form Insert Livraison</title>
</head>

<body>
<h1 style="color:violet; text-align:center;">Créer une livraison</h1>
<fieldset style="background: lightgreen">
  <script>
    var count = 0;

    function ajouter() {
      let form = document.getElementById("form_livraison");
      console.log(form);
      count++;
      const title = document.createElement("h3");
      form.append(title);

      var new_select = document.createElement("select");
      new_select.innerHTML = document.getElementById("template").innerHTML;
      new_select.setAttribute("name", "id_article_" + count);
      form.append(new_select);
      
      var new_label_3 = document.createElement("label");
      new_label_3.setAttribute("for", "quantite_" + count);
      new_label_3.innerHTML = "Quantite";
      var new_input_3 = document.createElement("input");
      new_input_3.setAttribute("type", "number");
      new_input_3.setAttribute("id", "quantite_" + count);
      new_input_3.setAttribute("name", "quantite_" + count);
      form.append(new_label_3);
      form.append(new_input_3);
      // form.append("br");

      const acount = document.getElementById("count");
      acount.setAttribute("value", count);
    }
  </script>
  <form action="insert_livraison.php" method="POST" id="form_livraison">
    <input type="number" id="count" name="count" hidden value="0">

    <label for="id_livraison"> Identifiant Livraison</label>
    <input type="number" id="id_livraison" name="id_livraison" /><br />
    <label for="id_commande"> Identifiant Commande</label>
    <select name="id_commande">
      <?php
      $query = $bdd->prepare('SELECT id_commande, libelle_commande, date_commande from commande');
      $query->execute();

      // $conts = $query->fetchAll(); 
      while ($commande = $query->fetch()) {
        echo " <option value=" . $commande['id_commande'] . ">" . $commande['id_commande'] . " " . $commande['libelle_commande'] . "  " . $commande['date_commande'] . "</option>";
      }
      ?>
    </select>

    <select name="id_article" hidden id="template">
      <?php
      $query = $bdd->prepare('SELECT * from article');
      $query->execute();

      // $conts = $query->fetchAll(); 
      while ($article = $query->fetch()) {
        echo " <option value=" . $article['id_article'] . ">" ."Id : ". $article['id_article']
        . "; Nom : " . $article['nom_article']
        . "; Parution : " . $article['parution']
        . "</option>";
      }
      ?>
    </select>

    <!-- <label for="id_fournisseur"> Idantifiant fournisseur</label>
    <input type="number" id="id_fournisseur" name="id_fournisseur" /><br /> -->
    <br />
    <label for="date"> Date livraison</label>
    <input type="date" id="date_livraison" name="date_livraison" /><br />
   

  <button type="submit">Envoyer livraison</button>

  </form>
  <button name="ajouter" value="Ajouter" onclick="ajouter()">Ajouter article</button>

</body>

</html>