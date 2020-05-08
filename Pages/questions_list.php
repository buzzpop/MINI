<?php
$msg='';
$json_data= file_get_contents('../questions.json');
$decode_flux= json_decode($json_data, true);
$tab_questions=[];
foreach ($decode_flux as $questions){
    $tab_questions[]= $questions;
}

    if (isset($_POST['nb_q'])){

        $nbr=$_POST['nbr-questions'];
        if (!is_numeric($nbr)){
            $msg= 'entrer un nombre';
        }elseif ($nbr< 1){
            $msg= 'un nombre >= 5 svp!';
        }else{
            $json_nbr_q= file_get_contents('../nbr.json');
            $dec= json_decode($json_nbr_q,true);
            $tab= array(
                    "nbrq"=> $nbr
            );

            $dec=$tab;
            $dec=json_encode($dec);
            file_put_contents('../nbr.json', $dec);
        }

    }
$json_nbr_q= file_get_contents('../nbr.json');
$dec= json_decode($json_nbr_q,true);
$nbrq=$dec['nbrq'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../Css/admin_home.css">
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action=""method="post" id="form-connexion">
<div class="nbr_question">
    <div class="div_msg_error">
        <span style="color: red" id="msg"><?=$msg?></span>
    </div>
    <div class="div_nbr_qst">
    <label for="">Nbre de question/Jeu</label>
    <input class="nbr-question_field" error="error-1" type="text" name="nbr-questions" value="<?=$nbrq?>">
    <input class="ok" type="submit" name="nb_q" value="OK">
        <div class="error-form" id="error-1"></div>
    </div>
</div>
<div class="content">
    <?php
    require_once "paginations_questions_list.php";
        paginate($tab_questions);


?>
</div>
</form>
<script src="../Js/functions.js">

</script>
</body>
</html>
