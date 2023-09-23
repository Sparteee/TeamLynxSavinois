function principale(){
    let cpt = 1;
     setInterval(function(){
        document.getElementById('radio' + cpt).checked = true;
        cpt++;
        if(cpt > 4){
                cpt = 1;
            }
        }, 6000);


    let rad1 = document.getElementById('radio1')
    rad1.addEventListener('click' , () =>{
        cpt = 1;
    })
    let rad2 = document.getElementById('radio2')
    rad2.addEventListener('click' , () =>{
        cpt = 2;
    })
    let rad3 = document.getElementById('radio3')
    rad3.addEventListener('click' , () =>{
        cpt = 3;
    })
    let rad4 = document.getElementById('radio4')
    rad4.addEventListener('click' , () =>{
        cpt = 4;
    })
}

principale();