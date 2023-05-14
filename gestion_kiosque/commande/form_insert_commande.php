<?php include_once 'connexion.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Form Insert Commande</title>
</head>

<body>
<h1 style="color:violet; text-align:center;">Créer une commande</h1>
<fieldset style="background: lightgreen">
  <script>
    var count = 0;

    function ajouter() {
      let form = document.getElementById("form_commande");
      console.log(form);
      count++;
      const title = document.createElement("h3");
      form.append(title);

      var new_select = document.createElement("select");
      new_select.innerHTML = document.getElementById("template").innerHTML;
      new_select.setAttribute("name", "id_article_" + count);
      form.append(new_select);
      // title.innerHTML = "Article numero " + count;
      // var new_label = document.createElement("label");
      // new_label.setAttribute("for", "id_article_" + count);
      // new_label.innerHTML = "ID Article";
      // var new_input = document.createElement("input");
      // new_input.setAttribute("type", "number");
      // new_input.setAttribute("id", "id_article_" + count);
      // new_input.setAttribute("name", "id_article_" + count);
      // form.append(new_label);
      // form.append(new_input);

      // var new_label_1 = document.createElement("label");
      // new_label_1.setAttribute("for", "nom_" + count);
      // new_label_1.innerHTML = "Nom";
      // var new_input_1 = document.createElement("input");
      // new_input_1.setAttribute("type", "text");
      // new_input_1.setAttribute("id", "nom_" + count);
      // new_input_1.setAttribute("name", "nom_" + count);
      // form.append(new_label_1);
      // form.append(new_input_1);

      // var new_label_2 = document.createElement("label");
      // new_label_2.setAttribute("for", "parution_" + count);
      // new_label_2.innerHTML = "Parution";
      // var new_input_2 = document.createElement("input");
      // new_input_2.setAttribute("type", "text");
      // new_input_2.setAttribute("id", "parution_" + count);
      // new_input_2.setAttribute("name", "parution_" + count);
      // form.append(new_label_2);
      // form.append(new_input_2);

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
  <form action="insert_commande.php" method="POST" id="form_commande">
    <input type="number" id="count" name="count" hidden value="0">

    <label for="id_commande"> Identifiant commande</label>
    <input type="number" id="id_commande" name="id_commande" /><br />
    <label for="id_fournisseur"> Fournisseur</label>
    <select name="id_fournisseur">
      <?php
      $query = $bdd->prepare('SELECT id_fournisseur, nom_fournisseur from fournisseur');
      $query->execute();

      // $conts = $query->fetchAll(); 
      while ($fournisseur = $query->fetch()) {
        echo " <option value=" . $fournisseur['id_fournisseur'] . ">" . $fournisseur['id_fournisseur'] . " " . $fournisseur['nom_fournisseur'] . "</option>";
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
    <label for="date"> Date commande</label>
    <input type="date" id="date_commande" name="date_commande" /><br />
    <label for="libelle_commande"> Libelle commande</label>
    <input type="text" id="libelle_comamnde" name="libelle_commande" /><br />



  <button type="submit">Envoyer commande</button>

  </form>
  <button name="ajouter" value="Ajouter" onclick="ajouter()">Ajouter article</button>

</body>

</html>