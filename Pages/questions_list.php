<?php

$json_data= file_get_contents('../questions.json');
$decode_flux= json_decode($json_data, true);
$tab_questions=[];
foreach ($decode_flux as $questions){
    $tab_questions[]= $questions;
}

    if (isset($_POST['nb_q'])){

        $nbr=$_POST['nbr-questions'];
        if (empty($_POST['nbr-questions'])){
            echo 'entrer une valeur';
        }elseif ($_POST['nbr-questions']<= 0){
            echo 'entrer une valeur superieure a 0';
        }else{
            $_SESSION['nbr']=$nbr;
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
<form action=""method="post">
<div class="nbr_question">
    <label for="">Nbre de question/Jeu</label>
    <input class="nbr-question_field" value="<?=$_SESSION['nbr']?>"    type="number" name="nbr-questions">
    <input class="ok" type="submit" name="nb_q" value="OK">
</div>
<div class="content">
    <?php
    if (!empty($_SESSION['nbr'])){
        require_once "paginations_questions_list.php";
        paginate($tab_questions, $_SESSION['nbr']);
    }

?>
</div>
</form>
</body>
</html>
