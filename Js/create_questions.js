// effacer un message apres 2 secondes d'affichage

setTimeout(function () {
    document.getElementById('area').innerHTML= '';
    document.getElementById('nbr').innerHTML= '';

}, 5000);


//page creer question
document.getElementById('create-questions').addEventListener('submit',function (e) {
    const text_area =document.getElementsByClassName('error');
    let bool= false;
    for (let area of text_area){
        if(area.hasAttribute("error") ) {
            let divError= area.getAttribute("error");
            if (!area.value) {
                document.getElementById(divError).innerText = 'Ce champs est obligatoire';
                bool = true;
            }
        }
    }
    if (bool){
        e.preventDefault();
    }
});

const  text_area= document.getElementsByClassName("error");
for (let area of text_area){
    area.addEventListener("click", function(e) {
        if (e.target.hasAttribute("error")) {
            let idDivError= e.target.getAttribute("error");
            document.getElementById(idDivError).innerText= '';
        }
    })
}


//
let nbrRow=0;

function onAddInputText(){

    let divInputs= document.getElementById('inputs');
    let select = document.getElementById('texte');
    let newInput= document.createElement('div');
    newInput.setAttribute('id', 'row_'+nbrRow);
    newInput.style.marginTop="10px"
    if (select.options[select.selectedIndex].value==="multiple") {
        newInput.innerHTML = `<label> Text Reponse</label> <br> 
            <input class='newInputForm error'   error="error-${4+nbrRow}" type='text' name='response${nbrRow}'/> 
            <input class='checkbox'  type='checkbox' name='checkbox${nbrRow}' id='case' />
            <button type='button' onclick='onDeleteInput(${nbrRow})'><img src='../Images/Icônes/ic-supprimer.png' alt=''></button>
            <div class='error-form' id='error-${4+nbrRow}'></div>`;
        divInputs.appendChild(newInput);

    }else if(select.options[select.selectedIndex].value==="simple"){
        newInput.innerHTML = `<label> Text Reponse</label> <br> 
            <input class='newInputForm error' type='text' error="error-${4+nbrRow}" name='response${nbrRow}'/> 
            <input class='checkbox'  type='radio' name='radio' value="response${nbrRow}" id='case' />
            <button type='button' onclick='onDeleteInput(${nbrRow})'><img src='../Images/Icônes/ic-supprimer.png' alt=''></button>
            <div class='error-form' id='error-${4+nbrRow}'></div>`;

        divInputs.appendChild(newInput);
    }
let valeur=document.getElementById('valeur');
   valeur.setAttribute("value", `${nbrRow}`);
nbrRow++;

}

function onDeleteInput(n) {
let target = document.getElementById('row_'+n);
target.remove();
}

function responseField(){
    nbrRow++;
    let divInputs= document.getElementById('inputs');
    let select = document.getElementById('texte');
    let inputText= document.createElement('div');
    inputText.setAttribute('id', 'row_'+nbrRow);
    inputText.style.marginTop="10px";

if (select.options[select.selectedIndex].value==="texte"){

    inputText.innerHTML = `<label> Text Reponse</label> <br> 
            <input class='newInputForm error' error='error-4' type='text' name='response'/> 
            <button type='button' onclick='onDeleteInput(${nbrRow})'><img src='../Images/Icônes/ic-supprimer.png' alt=''></button>
            <div class='error-form' id='error-4'></div>`;

        divInputs.appendChild(inputText);

    }

}


