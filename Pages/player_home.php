<?php
session_start();

if (empty($_SESSION['start'])){
    $_SESSION['start']=1;
}
$avatar= $_SESSION['avatar'];
if (!isset($_SESSION['prenom'])){
    $_SESSION['msg']='Veuillez vous connecter d\'aboord';
    header('Location: index.php');
    exit;
}

$json_data= file_get_contents('../users.json');
$decode_flux= json_decode($json_data, true);

$players=[];
$best_score=0;

foreach ($decode_flux as $value) {
    if ($value['role']== "player") {
        $players[] = $value;

    }
    }
$column= array_column($players,'score');
array_multisort($column, SORT_DESC, $players);


foreach ($players as $item){
    if ($_SESSION['prenom']== $item['prenom']){
        $best_score= $item['score'];
    }
}

//
$json_nbr_q= file_get_contents('../nbr.json');
$dec= json_decode($json_nbr_q,true);
$nbr=$dec['nbrq'];

//
$tab_questions=[];
$json_data= file_get_contents('../questions.json');
$decode_flux= json_decode($json_data, true);

foreach ($decode_flux as $questions){
    $tab_questions[]= $questions;

}

//get random
require_once "function_get_random.php";

if ($_SESSION['start']==1){
  $_SESSION['shuffle']= getRandomStr($nbr, $tab_questions);
    $_SESSION['start']=2;
}

$score=0;
$nb_articles_total = count( $_SESSION['shuffle']);
$nb_per_page = 1;
$nb_pages = ceil($nb_articles_total / $nb_per_page);
if (isset($_GET['page'])) {
    $num_page = $_GET['page'];
}else{
    $num_page=1;
}
$_SESSION['page']=$num_page;
$_SESSION['nbr_page']=$nb_pages;

$debut = ($num_page - 1) * $nb_per_page;
$fin = $debut + $nb_per_page - 1;

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
    <form action="traitement.php" method="post">

        <div class="questions">

            <div class="questions_head">

                <?php

                echo '<div style="padding-top: 20px">';
                echo '<h3>';
               echo 'Question '.$num_page.'/'.$nb_pages. ':<br>';
                for ($i=$debut; $i<=$fin; $i++) {
                    if (array_key_exists($i, $_SESSION['shuffle'])) {
                        echo $_SESSION['shuffle'][$i]['question'];
                        $score= $_SESSION['shuffle'][$i]['point'];
                    }
                }
                echo '</h3>';
                echo '</div>';
                ?>
            </div>
            <div class="points"> <input  type="text" name="nbr_point" value="<?=$score?> pts" disabled></div>

            <div class="display_questions">
                <?php

                for ($i=$debut; $i<=$fin; $i++){
                    if (array_key_exists($i, $_SESSION['shuffle'])) {
                        foreach ($_SESSION['shuffle'][$i]['reponse'] as $key){
                            if ($_SESSION['shuffle'][$i]['type de reponse']=='texte'){

                                if (isset($_SESSION['result'][$i])){

                                    echo'<input  type="text" name="textResponse" value="'.$_SESSION['result'][$i].'" />';
                                    echo '<br>';

                                }else{

                                    echo'<input  type="text" name="textResponse"  />';
                                    echo '<br>';
                                }

                            } elseif  ($_SESSION['shuffle'][$i]['type de reponse']=='simple'){
                                            if (isset($_SESSION['result'][$i])){
                                                if($_SESSION['result'][$i]==$key){
                                                    echo'<input type="radio"  value="'.$key.'" name="radio" checked>'.' '.$key;
                                                    echo '<br>';
                                                }else{
                                                    echo'<input type="radio"  value="'.$key.'" name="radio">'.' '.$key;
                                                    echo '<br>';
                                                }
                                            }else{
                                                echo'<input type="radio"  value="'.$key.'" name="radio">'.' '.$key;
                                                echo '<br>';
                                            }

                            }else{
                                 if (isset($_SESSION['result'][$i])) {
                                     if (in_array($key,$_SESSION['result'][$i])) {
                                             echo '<input  type="checkbox" checked name="check[]" value="'.$key.'" />'.' '.$key;
                                             echo '<br>';

                                         }else{
                                             echo '<input  type="checkbox"  name="check[]" value="'.$key.'" />'.' '.$key;
                                             echo '<br>';
                                         }

                                 }else{
                                    if (isset($key)){
                                        echo '<input  type="checkbox" name="check[]" value="'.$key.'" />'.' '.$key;
                                        echo '<br>';
                                    }

                                 }

                            }

                        }
                        if ($_SESSION['shuffle'][$i]['type de reponse']=='texte'){
                            echo '<input type="hidden" name="choice" value="texte">';
                        }elseif ($_SESSION['shuffle'][$i]['type de reponse']=='simple'){
                            echo '<input type="hidden" name="choice" value="simple">';
                        }else{
                            echo '<input type="hidden" name="choice" value="multiple">';
                        }
                    }
                }



                echo '<div class="div">';
                if ($num_page > 1){
                    $precedent= $num_page - 1;
                    echo '<button type="submit" name="pre" class="sui gauche">PREVIOUS</button>';
                }

                if ($num_page < $nb_pages){
                    $suivant= $num_page + 1;

                    echo '<button type="submit" name="next" class="sui droite">NEXT</button>';
                }if ($num_page == $nb_pages){
                    echo '<button type="submit" name="next" class="sui droite">FINISH</button>';
                }

                echo '</div>';
                ?>

            </div>


        </div>
</form>
        <div class="scores">

            <ul>
                <a href="#" id="tp" onclick="top_score();"><li class="tp_s">Top Scores</li></a>
                <a href="#" id="best_score" onclick="best_score()"><li>Mon Meilleur Score</li></a>
            </ul>

                <div id="top_players">
                <table >
                    <tr>
                        <th>Noms</th>
                        <th>Score</th>
                    </tr>
                      <?php

                      for ($i=0; $i <5; $i++){
                          if (array_key_exists($i,$players)){
                          echo '<td>'.$players[$i]['prenom'].' '.$players[$i]['nom'].'</td>';
                          echo '<td>'.$players[$i]['score'].'</td>';
                          echo '</tr>';
                          }
                      }
                      ?>
                </table>
                </div>
                <div id="best-score">
                    <?php
                    echo '</span>Meilleure Score: '.$best_score.' Pts</span>';
                    ?>
                </div>

        </div>

    <script src="../Js/functions.js">

    </script>
</body>
</html>

<?php

