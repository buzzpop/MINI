<?php
require_once "recup_avatar_function.php";
function save_data_to_json ($login){
    $json_data= file_get_contents('../users.json');

if ($_GET['section']== "admin"){
    $role= 'admin';
}else{
    $role='player';
}
    $decode_flux= json_decode($json_data, true);
$message='';
foreach ($decode_flux as $value){
    if ($login== $value['login']){
        $message='le login existe deja' ;
        break;
    }else{
        if ($_POST['pwd']!= $_POST['confirm_pwd']){
            $message='Le mot de passe doit etre identique' ;
            break;

        }else{
            $data= array(
                "nom"=> $_POST["nom"],
                "prenom"=>$_POST["prenom"],
                "login"=> $_POST["login"],
                "password"=>$_POST["pwd"],
                "avatar"=>recup_avatar(),
                "role"=>$role

            );
        }
    }
}
if (!empty($message)){
    echo '<span id="msg" style="color: red">'.$message.'</span>';
}
if (!empty($data)){
    $decode_flux[]= $data;
    $decode_flux= json_encode($decode_flux);
    file_put_contents('../users.json', $decode_flux);
    echo '<span id="msg" style="color: green">enregistrement effectués!</span>';

}


}