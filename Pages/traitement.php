<?php
session_start();
if (isset($_POST['next'])){
    $_SESSION['result']= array();
   if ($_POST['choice']=="texte"){

           if (!empty($_POST['textResponse'])){
               $_SESSION['result'][]= $_POST['textResponse'];
           }
   }
    if ($_POST['choice']=="simple"){

        if (isset($_POST['radio'])){
            $_SESSION['result'][]= $_POST['radio'];
        }
    }

    $index= $_SESSION['page'];
    $nbr_page= $_SESSION['nbr_page'];

   if ($index<$nbr_page){
       $next=($index+1);
       header("Location:player_home.php?page=$next");
   }

}
