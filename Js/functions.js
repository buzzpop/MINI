
// effacer un message apres 2 secondes d'affichage

setTimeout(function () {
    document.getElementById('msg').innerHTML= '';

}, 2000);

// fais la meme chose que la precedente
setTimeout(function () {
    document.getElementById('err').innerHTML= '';
}, 2000);

function top_score () {
  let  tp= document.getElementById('top_players');

        tp.style.display="block";
        tp.style.backgroundColor="yellow";
        document.getElementById('tp').style.color="yellow";
       if(document.getElementById('best-score').style.display==="block") {
           document.getElementById('best-score').style.display="none";
           document.getElementById('best_score').style.color="";
       }
}
function best_score () {
    let  b_score= document.getElementById('best-score');

    b_score.style.display="block";
    b_score.style.backgroundColor="yellow";
    document.getElementById('best_score').style.color="yellow";
    if(document.getElementById('top_players').style.display==="block") {
        document.getElementById('top_players').style.display="none";
        document.getElementById('tp').style.color="";
    }


}



// gerer les champs non remplis et effacer le message d'erreur une fois on commence à ecrire dans le champs
document.getElementById("form-connexion").addEventListener("submit", function (e) {
    const  inputs= document.getElementsByTagName("input");

    let error = false;
    for (input of inputs){
        if(input.hasAttribute("error") ){
            let idDivError= input.getAttribute("error");
            if (!input.value){
                document.getElementById(idDivError).innerText= 'Ce champs est obligatoire';
                error = true;
            }
        }
    }
    if (error){
        e.preventDefault();
    }

    return false;
})

const  inputs= document.getElementsByTagName("input");
for (input of inputs){
    input.addEventListener("keyup", function(e) {
        if (e.target.hasAttribute("error")) {
            let idDivError= e.target.getAttribute("error");
            document.getElementById(idDivError).innerText= '';
        }
    })
}

/* recuperer l'image avatar et le charger dans la section avatar */
function load_image(avatar) {
    let image= document.getElementById('img');
    image.src=window.URL.createObjectURL(avatar.files[0]);
}






