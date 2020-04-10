<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="player_login_page.css">
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
    </div>
</div>
<div class="form">
        <div class="white">
            <div class="header_white">
                <h3>Login Form</h3>
            </div>
            <div class="form">
            <form method="post" action="">
                <div class="icone_user">
                    <img src="Images/Icônes/icone-user.png" alt="">
                </div>
                <input class="input" type="text" name="login" id="login" placeholder="Login" autofocus required
                    <?php if (isset($login)){ echo 'value="'.$login.'"';}?>> <br> <br>
                <div class="icone_password">
                    <img src="Images/Icônes/icone-password.png" alt="">
                </div>
                <input class="input" type="password" name="pwd" placeholder="Password" required
                    <?php if (isset($pwd)){ echo 'value="'.$pwd.'"';}?>> <br> <br>
                <div class="bouton">
                    <input class="btn" type="submit" value="Connexion" name="btn">
                    <p><a href="player_signin_page.php">S'inscrire pour jouer?</a></p>
                </div>

            </form>
        </div>
        </div>
</div>

</body>
</html>
