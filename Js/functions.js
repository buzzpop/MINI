// effacer un message apres 2 secondes d'affichage

setTimeout(function () {
    document.getElementById('msg').innerHTML= '';

}, 2000);

// fais la meme chose que la precedente
setTimeout(function () {
    document.getElementById('err').innerHTML= '';
}, 2000);


// gerer les champs non remplis et effacer le message d'erreur une fois on commence à ecrire dans le champs
document.getElementById("form-connexion").addEventListener("submit", function (e) {
    const  inputs= document.getElementsByTagName("input");
    let error = false;
    for (input of inputs){
        if(input.hasAttribute("error")){
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