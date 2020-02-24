<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="icon" type="image/png" href="/image/logo/logo.png" />
    <title>Document</title>

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
<?php
session_start();
$heure = date("H:i");
$date = date("d-m-y");
require_once '../connect.php';
if(isset($_POST['sub1'])){
    $requete = "UPDATE users
    SET Estvalid = '0',datedef ="."'". $date."'"."
    WHERE prenom ="."'".$_SESSION['name']."' ";
    $reque1 = $db->prepare($requete);
    $reque1->execute();
    
}

// TEST DEFI VALIDE ET CHANGEMENT
$reque = "SELECT * FROM users WHERE prenom ="."'".$_SESSION['name']."'";
$reque = $db->prepare($reque);
$reque->execute();
while ($rez = $reque->fetch()) {
    
  if(($rez['Estvalid']== 0) && ($rez['datedef'])!= ($date)){
      
      $nbdef = $rez['id_defi'] +1;
      $requete = "UPDATE users
      SET Estvalid = '1', id_defi= ".$nbdef."
      WHERE prenom ="."'".$_SESSION['name']."' ";
      $reque1 = $db->prepare($requete);
      $reque1->execute();

    }
  }


?>
<body class="body-b">
     <?php
if (isset($_SESSION['name'])) {
    $name = $_SESSION['name'];
} else {
    header('Location: ../connexion/connexion/index.php');
}
$re = "SELECT * FROM users WHERE prenom ="."'".$_SESSION['name']."'";
$re = $db->prepare($re);
$re->execute();
while ($rez = $re->fetch()) {
    $_SESSION['id_def'] = $rez['id_defi'];
    $reque = "SELECT * FROM defis WHERE id_defi =".$_SESSION['id_def'];
}
    
    $reque1 = $db->prepare($reque);
    $reque1->execute();
    while ($resul = $reque1->fetch()) {
        ?>


    <div class="image">
        <img src="../image/large/<?php echo $resul['image']; ?>">
    </div>

    <div class="on-image">

        <a href="../defis/index.php" class="btn" id="sidebar-menu-close">
            <span class="cross cross-one"></span>
            <span class="cross cross-two"></span>
        </a>

        <div class="date-full">
            <p id="date"> date aujourd'hui </p>
            <p id="mois"> mois</p>
        </div>



        <p class="p"> 
            

            <?php
            $reque = "SELECT * FROM users WHERE prenom ="."'".$_SESSION['name']."'";
            $reque = $db->prepare($reque);
            $reque->execute();
            while ($rez = $reque->fetch()) {
            
                if($rez['Estvalid'] == 0){
                   echo 'Prochain défi à minuit';
                }else{ echo $resul['titre'];}
             ?> 
             </p>

<?php } }?>
    </div>

    <div class="texte">
        <h1>Pourquoi réaliser ce defis?</h1>
        
        
        <p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.
            Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.
            Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.
            Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.
        </p>

        <div class="cta">
    <form method="POST">
        <?php


$reque = "SELECT * FROM users WHERE prenom ="."'".$_SESSION['name']."'";
$reque = $db->prepare($reque);
$reque->execute();
while ($rez = $reque->fetch()) {?>


            <input type="submit" href="#" <?php if($rez['Estvalid'] == 0){
                echo 'disabled="disabled"';
            } ?> class="button-green" name="sub1" value="J'ai réussi"></input>
            <input type="submit" <?php if($rez['Estvalid'] == 0){
                echo 'disabled="disabled"';
            } ?> href="#" name="sub1" class="button-red" value="Plus tard"></input>
<?php } ?>
</form>
        </div>
    </div>
    <script src="main.js"></script>
    <script src="/js/accueil.js"></script>
</body>
</html>