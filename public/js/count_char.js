function count() {
    // Récupération des éléments
    let textarea = document.getElementById("textbox");
    let characterCounter = document.getElementById('count_char');
    // Définition du nombre de caractères maximum
    const maxChars = 250;

    const countChar  = () => {
        // Récupération du nombre de caractères
        let EnterChars = textarea.value.length;
        // Calcul du nombre de caractères restants
        let counter = maxChars - EnterChars;
        // Affichage du nombre de caractères restants
        characterCounter.textContent = counter + "/250 ";
        if (counter < 100) { // S'il reste moins de 100 caractères
            characterCounter.style.color = "red"; // Le texte devient rouge
        } else if (counter < 150) { // S'il reste moins de 150 caractères
            characterCounter.style.color = "orange"; // Le texte devient orange
        } else { // S'il reste plus de 150 caractères
            characterCounter.style.color = "black"; // Le texte redevient noir
        }
    }

    // Détection de l'événement "input" sur le textarea
    textarea.addEventListener("input" , countChar);
}
count();