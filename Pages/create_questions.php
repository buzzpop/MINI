<?php
require_once "function_recup_question.php";
if (isset($_POST['save'])){
    $areaText="";
    $nbrPoint='';
    $responseType="";
    $areaMessage='';
    $nbr='';
    $nombreInput= 0;
    $response=[];
    $validResponse=[];



    if (isset($_POST['areatext']) AND isset($_POST['nbr_points']) AND isset($_POST['response_type'])){
        $nombreInput= $_POST['nombreInput'];
        $areaText = $_POST['areatext'];
        $nbrPoint = $_POST['nbr_points'];
        $responseType = $_POST['response_type'];
        if ($responseType=="texte"){
            $response[]= $_POST['response'];
            $validResponse[]=$_POST['response'];
        }else{
        for ($i=1;$i<=$nombreInput;$i++){

        $response[]= $_POST['response'.$i];
        }
        }
        for ($i=1; $i<= $nombreInput;$i++){
            if (isset($_POST['checkbox'.$i])){
                $validResponse[]= $_POST['response'.$i];
            }elseif (isset($_POST['radio'])){
                if ($_POST['radio']== "response".$i){
                    $validResponse[]= $_POST['response'.$i];
                }
            }
        }

        if (long_chaine($areaText)> 200){
            $areaMessage='une question ne doit pas depasser 200 caracteres';

        }if (!is_chaine_numeric($nbrPoint)){
            $nbr='entrer un nombre';
        }elseif ($nbrPoint <1){
            $nbr='Le Nbre de points d’une question est supérieur ou égale à 1';
        }
        if(long_chaine($areaText) < 200 AND is_chaine_numeric($nbrPoint) AND $nbrPoint >= 1) {
        save_questions_to_json($areaText,$nbrPoint,$responseType,$response, $validResponse);
        $areaText='';
        $nbrPoint='';

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

<h3>PARAMETRER VOTRE QUESTION</h3>
<form action="" method="post" id="create-questions">
<div class="content">
    <div class="area">
        <?php
        if (!empty($areaMessage)){
        ?>
            <span style="color: red" id="area"><?=$areaMessage;?></span>
        <?php
        }
        ?>
        <br>
    <label for="q">Questions</label><br>
    <textarea name="areatext" class="error" error="error-1" cols="50" rows="5" ><?php if (isset($areaText)){ echo $areaText;}?></textarea> <br>
    <div class="error-form" id="error-1"></div>
    </div>
    <div class="select">
            <?php
            if (!empty($nbr)){?>

           <span style="color: red" id="nbr"><?= $nbr;?></span>
        <?php
        }?>
        <br>
    <label for="nbr">Nbre de Points</label>  <br>
    <input type="text"name="nbr_points" value="<?php if (isset($nbrPoint)){ echo $nbrPoint;}?>"  class="error number" error="error-2">  <br>
    <div class="error-form" id="error-2"></div>
    </div>

    <div class="select" id="inputs">
        <div id="row_0">
        <label for="type">Type de réponse</label> <br>
    <select  name="response_type" class="error"  error="error-3" id="texte" id="plus" onchange="responseField()" >
        <option value="" selected>Donnez le type de réponse</option>
        <option value="texte">Texte</option>
        <option value="simple">Choix Simple</option>
        <option value="multiple">Choix Multiple</option>
    </select>
        <button type="button" id="addInput" class="plus" onclick="onAddInputText();"><img src="../Images/Icônes/ic-ajout-re_ponse.png" alt=""></button>
        <div class="error-form" id="error-3"></div>
        </div>
    </div>
    <input type="hidden" name="nombreInput" id="valeur">


    <br><br>
    <div>
        <input class="add" type="submit" value="Enregistrer" name="save">
    </div>
</div>
</form>

<script src="../Js/create_questions.js">



</script>
</body>
</html>