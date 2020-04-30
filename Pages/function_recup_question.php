<?php
function save_questions_to_json ($areaText, $nbrPoint, $responseType, $response=[]
    ,$validResponse=[]){
    $json_data= file_get_contents('../questions.json');
    $decode_flux= json_decode($json_data, true);
$response_tab=[];
$valid_response_tab=[];

        $data= array(
            "question"=> $areaText,
            "point"=> $nbrPoint,
            "type de reponse"=> $responseType,
            "reponse"=>$response_tab[]=$response,
            "reponses valides"=>$valid_response_tab[]= $validResponse
        );
    $decode_flux[]= $data;
    $decode_flux= json_encode($decode_flux);
    file_put_contents('../questions.json', $decode_flux);
    echo '<span id="msg" style="color: green">enregistrement effectués!</span>';
}






// RETOURNER LE NOMBRE DE CARACTERES D'UNE CHAINE
function long_chaine ($chaine){
    $c=0;
    while(isset($chaine[$c]) &&$chaine[$c]!= ''){
        $c= $c+1;
    }
    return $c;
}

//VERIFIER SI UNE CHAINE EST NUMERIK
function is_chaine_numeric($chaine){
    for ($i=0;$i<long_chaine($chaine);$i++){
        if (!is_car_numeric($chaine[$i])){
            return false;
        }
    }
    return true;
}

function is_car_numeric ($c){
    if ($c >= '0' &&  $c <= '9'){
        return true;
    }
    return false;
}
