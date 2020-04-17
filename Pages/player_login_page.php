<?php

session_start();
if (isset($_SESSION['role'])){
    if ($_SESSION['role']== 'admin'){
        $_SESSION['message']='Veuillez vous déconnecter d\'aboord';
        header("Location: admin_home.php");
        exit;
    }else{
        $_SESSION['message']='Veuillez vous déconnecter d\'aboord';
        header("Location: player_home.php");
        exit;
    }

}

$json_data= file_get_contents('../users.json');

$decode_flux= json_decode($json_data, true);

// var_dump($decode_flux[1]['login']);

$error="";
$bool= false;

if (isset($_POST['btn'])){

    $login= $_POST['login'];
    $password= $_POST['pwd'];
   
        foreach($decode_flux as $element){
            if ($login== $element['login'] && $password== $element['password']){
                $_SESSION['prenom']= $element['prenom'];
                $_SESSION['nom']= $element['nom'];
                $_SESSION['avatar']= $element['avatar'];
                if ($element['role'] == "player"){
                    $_SESSION['role']= $element['role'];
                    header("Location: player_home.php");
                    exit;
                }else{
                    $_SESSION['role']= $element['role'];
                    header("Location: admin_home.php");
                    exit;
                }

            }else{
                $error='Login ou Mot de passe incorrecte ';
            }
        }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../Css/player_login_page.css">
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
        if(isset($_SESSION['msg'])) {?>
            <p id="msg" style="color: red"><?=$_SESSION['msg']?></p>

            <?php
            unset($_SESSION['msg']);
        }
        ?>
    </div>
</div>

<div class="form" id="content" >
        <div class="white">
            <div class="header_white">
                <h3>Login Form</h3>

            </div>
            <div class="error-form" id="err"><?= $error?></div>

            <div class="form">
                <form action="" method="post" id="form-connexion">

                    <div class="input-form">
                        <div class="icon-form icon-form-login"></div>
                        <input type="text" class="form-control" error="error-1" name="login" id="" placeholder="Login" autocomplete="off">
                        <div class="error-form" id="error-1"></div>
                    </div>
                    <div class="input-form">
                        <div class="icon-form icon-form-pwd"></div>
                        <input type="password" class="form-control" error="error-2" name="pwd" id="" placeholder="Password">
                        <div class="error-form" id="error-2"></div>
                    </div>
                    <div class="input-form">
                        <button type="submit" class="btn-form" name="btn" id="">Connexion</button>
                        <a href="player_signin_page.php" class="link-form">S'inscrire pour jouer</a>
                    </div>

                </form>
            </div>
            </div>
    </div>

    </body>

<script src="../Js/functions.js">

</script>

    </html>
