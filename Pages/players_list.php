<?php
$json_data= file_get_contents('../users.json');
$decode_flux= json_decode($json_data, true);
$tab=[];

        foreach ($decode_flux as $value){
            if ($value['role']== "player"){
                $tab[]= array(
                    "nom"=>$value['nom'],
                    "prenom"=>$value['prenom'],
                    "score"=>$value['score']
                );
            }
        }

// tri decroissant de la colonne score
$column= array_column($tab,'score');
array_multisort($column, SORT_DESC, $tab);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../Css/admin_home.css">
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h3>LISTE DES JOUEURS PAR SCORE</h3>
<div class="content">
    <?php
    require_once "pagination_players_list.php";
    pagination($tab);

    ?>




</div>

</body>
</html>
