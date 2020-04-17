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
    <link rel="stylesheet" href="../Css/player_home.css">
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<div class="header">
    <div class="logo">
        <img src="../Images/logo-QuizzSA.png" alt="">
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
        <div class="image">

            <img  src="<?=$avatar?>" alt="">

        </div>
        <div><h2>BIENVENUE SUR LA PLATEFORME DE JEU DE QUIZZ <br>
                JOUER ET TESTER VOTRE NIVEAU DE CULTURE GÉNÉRALE</h2>
            <a href="logout_page.php"><button class="logout" type="submit">Déconnexion</button></a>
        </div>
        <h4><?=$_SESSION['prenom']?> <?=$_SESSION['nom']?></h4>
    </div>
    <div class="content">
        <div class="questions">
            <div class="questions_head">

            </div>
            <input type="text" name="nbr_point" value="3 pts" disabled>
        </div>
    </div>

    <script>
        setTimeout(function () {
            document.getElementById('msg').innerHTML= '';
        }, 2000);

    </script>
</body>
</html>
