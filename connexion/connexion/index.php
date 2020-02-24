<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="icon" type="image/png" href="/image/logo/logo.png" />
    <title>Connexion</title>

    <!-- PWA -->

  <script defer src="../..javas/crypto.js"></script>
  <script defer src="../../javas/main.js"></script>
  <link rel="manifest" href="../../javas/manifest.json" />
  <meta name="theme-color" content="#008080">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">


  <script>
      if ('serviceWorker' in navigator) {
          // Register a service worker hosted at the root of the
          // site using a more restrictive scope.
          navigator.serviceWorker.register('../../sw.js', {scope: './'}).then(function(registration) {
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
  session_start();
  require_once ('../../connect.php');

  if(isset($_POST['bt-sub'])){
    $reque = "SELECT * FROM users";

    $reque1 = $db->prepare($reque);
    $reque1->execute();
    while ($resul = $reque1->fetch()) {
      if($_POST['email']== $resul['mail']){
        if($_POST['pwd']== $resul['mot_de_passe']){
          $_SESSION['name'] = $resul['prenom'];
          $_SESSION['id_def'] = $resul['id_defi'];
        
          header('Location: ../../defis/index.php');
        }else{
          $result="mdp ou mail mauvais";
        }

      }else{
        $result="mdp ou mail mauvais";
      }


    }
     
  }


 
  ?>
    
    <div class="image-inscirption">

        <h1>
            Connectez vous 
            <br> sur Sistema
        </h1>
        
    </div>

    <div class="texte-inscription">

        <h2>Je me connecte !</h2>

<div class="input-inscription">
    <div class="row">
        <form method="POST" class="col s12">
          <div class="row">
            <div class="input-field col s12">
              <input id="email" name="email" type="email" class="validate">
              <label for="email">Email</label>
            </div>
          </div>
        
      </div>

      <div class="mdp">
        <label for="pass">Password (8 characters minimum):</label>
        <input type="password" name="pwd" id="pass" name="password"
                required>
    </div>
      <input type="submit" name="bt-sub" value="connexion" class="button-green-c">
      </form>
      <a href="../../inscription/index.php" class="button-green-f"> Je crée mon compte</a>

</div>

    </div>


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