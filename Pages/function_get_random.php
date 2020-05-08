<?php

function getRandomStr ($nbr,$tab) {
    shuffle($tab);
  $chaine=[];
  for ($i=0;$i<$nbr;$i++){

      $chaine[]= $tab[$i];
  }

   return $chaine;

}

/* function getRandomStr ($nbr,$tab) {
    $i=0;
    $keys= array_keys($tab);
    shuffle($keys);
    $random= array();
    foreach ($keys as $key){
        $random[$key]= $tab[$key];
        $i++;
        if ($i==$nbr){
            break;
        }
    }
    return $random;
}*/