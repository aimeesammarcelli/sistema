<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=i">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/font.css">
    <link rel="icon" type="image/png" href="/image/logo/logo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>inscription systema</title>
    <?php session_start();
    require_once ('../connect.php');
    ?>


<!-- PWA -->

<script defer src="../javas/crypto.js"></script>
  <script defer src="../javas/main.js"></script>
  <link rel="manifest" href="../javas/manifest.json" />
  <meta name="theme-color" content="#008080">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">


  <script>
      if ('serviceWorker' in navigator) {
          // Register a service worker hosted at the root of the
          // site using a more restrictive scope.
          navigator.serviceWorker.register('./sw.js', {scope: './'}).then(function(registration) {
              console.log('Service worker registration succeeded:', registration);
          }, /*catch*/ function(error) {
              console.log('Service worker registration failed:', error);
          });
      } else {
          console.log('Service workers are not supported.');
      }	

  </script>
</head>
<body>
<?php
if(isset($_POST['btsub'])){
    $reque = "INSERT INTO users (prenom,nom, mail,mot_de_passe,id_defi,Estvalid)
    VALUES (:prenom,:nom,:mail,:mot_de_passe,'1','1')";

    $reque1 = $db->prepare($reque);
    $reque1->bindParam(':prenom', $_POST['prenom']);
    $reque1->bindParam(':nom', $_POST['nom']);
    $reque1->bindParam(':mail', $_POST['mail']);
    $reque1->bindParam(':mot_de_passe', $_POST['mdp']);
    $reque1->execute();
    $_SESSION['name'] = $_POST['nom'];
    header('location: ../defis/index.php');
}


?>

<div class="titre-inscription">

<H1>Je crée mon compte !</H1>
<h2>Je rentre mes informations</h2>

</div>

<form method="post" class="form">

  <div class="input-inscription">
    <div class="row">
        <form method="POST" class="col s12">
          <div class="row">
            <div class="input-field col s12">
              <input id="nom" type="text" placeholder="nom" required="required" name="nom" class="validate">
              <label for="email">Nom</label>
            </div>
          </div>
        
      </div>


      <div class="input-inscription">
        <div class="row">
            <form method="POST" class="col s12">
              <div class="row">
                <div class="input-field col s12">
                  <input id="prenom" type="text" placeholder="prenom" required="required" name="prenom" class="validate">
                  <label for="email">Prénom</label>
                </div>
              </div>
            
          </div>
              <div class="input-inscription">
                <div class="row">
                    <form method="POST" class="col s12">
                      <div class="row">
                        <div class="input-field col s12">
                          <input id="mail" type="text" placeholder="Votre mail" required="required" name="mail"  class="validate">
                          <label for="email">E-mail</label>
                        </div>
                      </div>
                    
                  </div>

              <div class="input-inscription">
                <div class="row">
                    <form method="POST" class="col s12">
                      <div class="row">
                        <div class="input-field col s12">
                          <input id="mot_de_passe" type="password" placeholder="Mot de passe" required="required" name="mdp"  class="validate">
                          <label for="email">Mot de passe</label>
                        </div>
                      </div>
                    
                  </div>

<input type="submit"name="btsub" value="créer" class="button-green-c">


</form>

<script>

  $(document).ready(function() {
    M.updateTextFields();
  });
    

  
  /* label color */
  .input-field label {
     color: black;
   }
   /* label focus color */
   .input-field input[type=text]:focus + label {
     color: black;
   }
   /* label underline focus color */
   .input-field input[type=text]:focus {
     border-bottom: 1px solid #000;
     box-shadow: 0 1px 0 0 #000;
   }
   /* valid color */
   .input-field input[type=text].valid {
     border-bottom: 1px solid #000;
     box-shadow: 0 1px 0 0 #000;
   }
   /* invalid color */
   .input-field input[type=text].invalid {
     border-bottom: 1px solid #000;
     box-shadow: 0 1px 0 0 #000;
   }
   /* icon prefix focus color */
   .input-field .prefix.active {
     color: #000;
   }
    </script>
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="/defis-ouvert/main.js"></script>
</body>
</html>