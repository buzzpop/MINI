<?php
session_start();
$avatar= $_SESSION['avatar'];
if (!isset($_SESSION['prenom'])){
    $_SESSION['msg']='Veuillez vous connecter d\'aboord';
    header('Location: player_login_page.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="admin_home.css">
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<div class="header">
    <div class="logo">
        <img src="Images/logo-QuizzSA.png" alt="">
    </div>

    <div class="header_title">
        <h3>Le plaisir de jouer</h3>
        <?php
        if(isset($_SESSION['message'])) {?>
            <p id="msg" style="color: red"><?=$_SESSION['message']?></p>

            <?php
            unset($_SESSION['message']);
             }
            ?>

    </div>
</div>
<div class="background">
    <div class="background_header">
    <div><h2>CRÉER ET PARAMÉRTER VOS QUIZZ</h2>
        <a href="logout_page.php"><button class="logout" type="submit">Déconnexion</button></a>
    </div>
    </div>
<div class="form">
    <div class="white">
        <div class="header_white">
            <div class="round">
            <div class="image">

                 <img  src="<?=$avatar?>" alt="">

            </div>
            </div>
            <div class="prenom_nom"><?=$_SESSION['prenom']?> <br> <span class="nom"><?=$_SESSION['nom']?></span></div>
        </div>
        <ul>
            <a href="#">
            <div class="menu">
                <li>Listes Questions</li>
                <img src="Images/Icônes/ic-liste.png" alt="">
            </div>
            </a>
            <a href="#">
            <div class="menu">
                <li>Créer Admin</li>
                <img src="Images/Icônes/ic-ajout.png" alt="">
            </div>
            </a>
            <a href="#">
            <div class="menu">
                <li>Listes Joueurs</li>
                <img src="Images/Icônes/ic-liste.png" alt="">
            </div>
            </a>
            <a href="#">
            <div class="menu">
                <li>Créer Questions</li>
                <img src="Images/Icônes/ic-ajout-active.png" alt="">
            </div>
            </a>
        </ul>

        </div>

    </div>
</div>
</div>
<script>
    setTimeout(function () {
        document.getElementById('msg').innerHTML= '';
    }, 2000);

</script>
</body>
</html>

