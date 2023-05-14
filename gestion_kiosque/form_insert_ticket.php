<?php include_once 'connexion.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Form Insert Ticket</title>
</head>

<body>
<h1 style="color:violet; text-align:center;">Créer un ticket</h1>
<fieldset style="background: lightgreen">
  <script>
    var count = 0;

    function ajouter() {
      let form = document.getElementById("form_ticket");
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
  <form action="insert_ticket.php" method="POST" id="form_ticket">
    <input type="number" id="count" name="count" hidden value="0">

    <label for="id_ticket"> Identifiant ticket</label>
    <input type="number" id="id_ticket" name="id_ticket" /><br />
    
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

    <br />
    <label for="date"> Date vente</label>
    <input type="date" id="date_vente" name="date_vente" /><br />
    


  <button type="submit">Envoyer ticket</button>

  </form>
  <button name="ajouter" value="Ajouter" onclick="ajouter()">Ajouter article</button>

</body>

</html>