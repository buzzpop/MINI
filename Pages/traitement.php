<?php
session_start();
if (isset($_POST['next'])){
    $bool= 0;
   $index= $_SESSION['page'];
    $nbr_page= $_SESSION['nbr_page'];
   $i=$index-1;
    $score=intval($_SESSION['shuffle'][$i]['point']);
   if ($_POST['choice']=="texte"){
           $_SESSION['result'][$i]= $_POST['textResponse'];
   }
    if ($_POST['choice']=="simple"){

        if (isset($_POST['radio'])){
                $_SESSION['result'][$i]= $_POST['radio'];
        }

    }else{
        if (isset($_POST['check'])){
            $_SESSION['result'][$i]= $_POST['check'];
        }
    }



   echo 'Jeu Terminé <br><br>';
   echo 'Reponses du joueur: <br><br>';

       print_r($_SESSION['result']);
       echo '<br><br>';
       foreach ($_SESSION['shuffle'][$i]['reponses valides'] as $key){
           if ($_POST['choice']=="multiple"){
               foreach ($_SESSION['result'][$i] as $item){

                   if ($item == $key){
                       $_SESSION['reponses'][$i]= 'true';
                       $bool++;
                   }else{
                       $_SESSION['reponses'][$i]= 'false';
                   }
               }
               if ($bool== count($_SESSION['shuffle'][$i]['reponses valides'])){
                   $_SESSION['score']+=$score;
               }
           }else{
               if ($_SESSION['result'][$i]== $key){
                   $_SESSION['reponses'][$i]= 'true';
                   $_SESSION['score']+=$score;
               }
               else{
                   $_SESSION['reponses'][$i]= 'false';
               }
           }

       }
       echo 'True = reponse valide, false = reponse non valide';
    echo '<br><br>';
       var_dump($_SESSION['reponses']);
    echo '<br><br>';

   echo 'Score Final: '.$_SESSION['score'].' Pts';
    echo '<br><br>';
    if ($index<$nbr_page){
        $next=($index+1);
        header("Location:player_home.php?page=$next");
    }else{
        header("Location:page_final.php");
    }



}



