document.addEventListener('DOMContentLoaded', menu) ;

function menu() {

    // ** Détection de l'ouverture menu burger ** //
    document.querySelector('#ouverture_menu').addEventListener('click', () => {
        document.querySelector('#menu').classList.add('ouvert')
    })

    // ** Détection de la fermeture menu burger ** //
    document.querySelector('#fermeture_menu').addEventListener('click', () => {
        document.querySelector('#menu').classList.remove('ouvert')
    })


    let btnGaucheDroite = document.querySelector('.config');
    let ouvertureMenu = document.querySelector('#ouverture_menu');
    let fermetureMenu = document.querySelector('#fermeture_menu');



}