<?php

$json_data= file_get_contents('../users.json');

$decode_flux= json_decode($json_data, true);

if (isset($_GET['section'])){
    if ($_GET['section']== "players_list"){
        foreach ($decode_flux as $value){
            if ($value['role']== "player"){
                $tab[]= array(
                    "nom"=>$value['nom'],
                    "prenom"=>$value['prenom'],
                    "score"=>$value['score']
                );
            }
        }
    }
}

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
    <table >
        <tr>
            <th>Prenom</th>
            <th>Nom</th>
            <th>Score</th>
        </tr>
        <?php

        foreach ($tab as $item){
            echo'<tr>';
                echo '<td>'.$item['prenom'].'</td>';
                echo '<td>'.$item['nom'].'</td>';
                echo '<td>'.$item['score'].'</td>';
            echo '</tr>';
        }

        ?>

    </table>
</div>

</body>
</html>
