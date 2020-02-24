<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="icon" type="image/png" href="/image/logo/logo.png" />

 <!-- PWA -->

 <script defer src="../javas/main.js"></script>
        <link rel="manifest" href="../javas/manifest.json" />
        <meta name="theme-color" content="#008080">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">


        <script>
            if ('serviceWorker' in navigator) {
                // Register a service worker hosted at the root of the
                // site using a more restrictive scope.
                navigator.serviceWorker.register('../sw.js', {scope: './'}).then(function(registration) {
                    console.log('Service worker registration succeeded:', registration);
                }, /*catch*/ function(error) {
                    console.log('Service worker registration failed:', error);
                });
            } else {
                console.log('Service workers are not supported.');
            }	

        </script>

    <?php
session_start();
require_once ('../connect.php');
?>
    <title>Accueil</title>
</head>
<body>
    <?php
if (isset($_SESSION['name'])) {
    $name = $_SESSION['name'];
} else {
    header('Location: ../connexion/connexion/index.php');
}

?>

    <header>

        <div class="contain-header">
        <div class="date-full">
            <p id="date"> date aujourd'hui </p>
            <p id="mois"> mois</p>
        </div>

        <div class="aujourdhui">
            <p>
                Aujourd'hui
            </p>
        </div>

        <div class="perso">

        </div>

        <div class="bonjour">
            <p>Bonjour&nbsp; </p>
            <p class="prenom"> <?php echo $name ?></p>
            <p>, c’est l’heure de ton défi du jour !</p>
        </div>
    </div>

    </header>

    <div class="contain-defis">

        <!-- defis -->
        <?php
$reque = "SELECT * FROM defis WHERE id_defi =".$_SESSION['id_def'];

$reque1 = $db->prepare($reque);
$reque1->execute();
while ($resul = $reque1->fetch()) {



?>
        <a href="../defis-ouvert/index.php" style="background-image:url('../image/large/<?php echo $resul['image']; ?>')" class="defis">

            <div class="date-full">
                <p id="date"> date aujourd'hui </p>
                <p id="mois"> mois</p>
            </div>



            <div class="defis-name">
                <p><?php echo $resul['titre']; ?></p>
            </div>

            <div class="description-defis">
                <p><?php echo $resul['description']; ?></p>
            </div>

        </a>
<?php }?>
        <!-- faq -->

        <a href="/faq/index.html" class="defis faq-img">

            <div class="date-full">
                <p id="date"> date aujourd'hui </p>
                <p id="mois"> mois</p>
            </div>

            <div class="defis-name">
                <p>FAQ</p>
            </div>

            <div class="description-defis">
                <p>Des questions? On a la reponse!</p>
            </div>

        </a>

        <!-- a propos -->

        <a href="/a-propos/index.html" class="defis apropos-img">

            <div class="date-full">
                <p id="date"> date aujourd'hui </p>
                <p id="mois"> mois</p>
            </div>

            <div class="defis-name">
                <p>A propos</p>
            </div>

            <div class="description-defis">
                <p>Découvrez qui nous sommes</p>
            </div>

        </a>


    </div>

    <script src="../js/accueil.js"></script>
</body>
</html>