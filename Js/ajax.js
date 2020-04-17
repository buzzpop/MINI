
function loadfile(file){
let xhr=  new XMLHttpRequest();

xhr.open('GET', file)
    xhr.addEventListener('readystatechange', function(){
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {

            document.getElementById('content').innerHTML = xhr.responseText;
        }
    });
    xhr.send(null);
}

(function load(){

    if (document.getElementById('list')){
        document.getElementById('list').addEventListener('click', function () {
            loadfile('questions_list.php');

        });
    }
     if (document.getElementById('create_admin')){
        document.getElementById('create_admin').addEventListener('click', function () {
            loadfile('create_admin.php');

        });
    }
    if (document.getElementById('list_joueur')){
        document.getElementById('list_joueur').addEventListener('click', function () {
            loadfile('players_list.php');

        });
    }
    if (document.getElementById('create_questions')){
        document.getElementById('create_questions').addEventListener('click', function () {
            loadfile('create_questions.php');

        });
    }

})();
/* recuperer l'image avatar et le charger dans la section avatar */
function load_image(avatar) {
    let image= document.getElementById('img');
    image.src=window.URL.createObjectURL(avatar.files[0]);
}




