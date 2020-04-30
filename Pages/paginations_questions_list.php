<?php
function paginate ($tab, $nbr_questions){

    $nb_articles_total = count( $tab);
    $nb_per_page = $nbr_questions;
    $nb_pages = ceil($nb_articles_total / $nb_per_page);
    if (isset($_GET['page'])) {
        $num_page = $_GET['page'];
    }else{
        $num_page=1;
    }
    echo 'Nombre de pages: ' . $nb_pages . '<br>';
    echo 'Page '.$num_page.'/'.$nb_pages. '<br>';
    echo '<hr>';


    $debut = ($num_page - 1) * $nb_per_page;
    $fin = $debut + $nb_per_page - 1;
    for ($i=$debut; $i<=$fin; $i++){
        if (array_key_exists($i, $tab)) {
            echo ($i+1).'.<span style="background-color: rgb(81, 191, 208);color: white"> '
                .$tab[$i]['question'].'</span> <br><br>';
            foreach ($tab[$i]['reponse'] as $key){
                if ($tab[$i]['type de reponse']=='texte'){
                    echo'<input  type="text" name="" value="'.$key.'" disabled>';
                    echo '<br>';
                } elseif  ($tab[$i]['type de reponse']=='simple'){
                    if (in_array($key, $tab[$i]['reponses valides'])) {
                        echo'<input style="background-color: yellow" disabled type="radio" checked name="radio'.$i.'">'.' '.$key;
                        echo '<br>';
                    }else{
                        echo'<input style="background-color: yellow" disabled type="radio" name="radio'.$i.'">'.' '.$key;
                        echo '<br>';
                    }
                }else{
                    if (in_array($key, $tab[$i]['reponses valides'])) {
                        echo '<input style="color: yellow" type="checkbox" disabled checked   name="">' . ' ' . $key;
                        echo '<br>';
                    }else{
                        echo '<input style="color: yellow" type="checkbox" disabled   name="">' . ' ' . $key;
                        echo '<br>';
                    }
                }


            }
            echo '<hr>';

        }

    }

    echo '<div class="div">';
    if ($num_page > 1){
        $precedent= $num_page - 1;
        echo '<a class="pre"  href="admin_home.php?section=questions_list&nbr=&page='.$precedent.'">PREVIOUS</a>';
    }

    if ($num_page != $nb_pages){
        $suivant= $num_page + 1;
        echo '<a class="sui" href="admin_home.php?section=questions_list&page='.$suivant.'">NEXT</a>';
    }

    echo '</div>';
}

