<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../Css/player_signin_page.css">
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
        <div class="left_side">
        <div class="title">
            <h3>S'INSCRIRE</h3>
            <p>Pour tester votre niveau de culture générale</p>
            <hr>
        </div>
            <label for="prenom">Prénom</label> <br>
            <input class="input" type="text" name="prenom" id="prenom" autofocus  >
                <br>
            <label for="nom">Nom</label> <br>

            <input class="input" type="text" name="nom" id="nom" >
                <br>
            <label for="login">Login</label> <br>

            <input class="input" type="text" name="login" id="login"  >
            <br>
            <label for="password">Password</label> <br>

            <input class="input" type="password" name="pwd" id="password"  >
            <br>
            <label for="confirm_password">Confirm Password</label> <br>

            <input class="input" type="password" name="confirm_pwd" id="confirm_password" >
            <br> <br>
            <label class="info">* Seuls les fichiers .jpeg .jpg .png sont autorisés</label> <br><br>
            <label class="label" for="avatar">Avatar</label>

            <input   type="file"  name="avatar" id="avatar" accept=".jpg, .JPG, .jpeg, .png, .PNG"
                    onchange="load_image(this)" >
            <br>
            <br>
            <input class="btn_compte" type="submit" name="btn" value="Créer compte">
        </div>
        <div class="right_side">
           <div class="avatar" >
               <img id="img">
           </div>
        </div>
    </div>
</div>
<script src="../Js/ajax.js">

</script>

</body>
</html>
