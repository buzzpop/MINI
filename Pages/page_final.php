<?php
session_start();
$avatar= $_SESSION['avatar'];
if (isset($_POST['replay'])){
    unset($_SESSION['result']);
    unset($_SESSION['start']);
    unset($_SESSION['score']);
    header('Location:player_home.php');
}
if (isset($_POST['logout'])){

    header('Location:logout_page.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Css/page_final.css">
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<div class="header">
    <div class="logo">
        <img src="../Images/logo-QuizzSA.png" alt="">
    </div>

    <div class="header_title">
     <h3>Partie Terminée!</h3>
    </div>
</div>
<div class="left">
    <div class="round">
        <div class="image">

            <img  src="<?=$avatar?>" alt="">

        </div>
    </div>
    <div class="prenom_nom"><?=$_SESSION['prenom'].' '.$_SESSION['nom']?>  </div>
    <div class="score">
        <h3>Bravo!</h3>
        <p>Votre Nouveau score: <span><?=$_SESSION['score']?> Pts</span></p>
    </div>
    <div class="bottom">
        <form method="post">
            <button class="bouton g" type="submit" name="replay">REPLAY <i class="fa fa-reply" ></i> </button>
            <button class="bouton d" type="submit" name="logout">LOG OUT <i class="fa fa-sign-out" aria-hidden="true"></i></button>

            </form>

    </div>
</div>
