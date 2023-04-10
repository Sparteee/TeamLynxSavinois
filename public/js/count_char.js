document.addEventListener('DOMContentLoaded', count) ;


function count() {
    let textarea = document.getElementById("textbox");
    let characterCounter = document.getElementById('count_char');
    const maxChars = 250;

    const countChar  = () =>{
        let EnterChars = textarea.value.length;
        let counter = maxChars - EnterChars;
        characterCounter.textContent = counter + "/250 ";
        if (counter < 100) {
            characterCounter.style.color = "red";
        } else if (counter < 150) {
            characterCounter.style.color = "orange";
        } else {
            characterCounter.style.color = "black";
        }
    }

    textarea.addEventListener("input" , countChar);


}